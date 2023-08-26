<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SupplierRepositoryInterface;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface
{
    protected $supplier;

    public function __construct()
    {
        parent::__construct(Supplier::class);
    }

    /**
     * Get supplier filtered and paginated list
     *
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function list(array $filters)
    {
        $suppliers = $this->model
            ->with([
                'supplyingBrands',
                'productCategories',
                'personsInCharge',
                'customers',
            ])
            ->when(isset($filters['supplying_brands']), function ($query) use($filters) {
                $query->whereHas('supplyingBrands', function ($q) use($filters) {
                    $q->where('name', 'like', "%{$filters['supplying_brands']}%");
                });
            })
            ->when(isset($filters['product_categories']), function ($query) use($filters) {
                $query->whereHas('productCategories', function ($q) use($filters) {
                    $q->where('title', 'like', "%{$filters['product_categories']}%");
                });
            })
            ->when(
                isset($filters['from_created_at']) && !isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereDate('created_at', '>=', $filters['from_created_at']);
                }
            )
            ->when(
                !isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereDate('created_at', '<=', $filters['to_created_at']);
                }
            )
            ->when(
                isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereBetween(
                        'created_at',
                        [
                            $filters['from_created_at'],
                            $filters['to_created_at']
                        ]
                    );
                }
            )
            ->orderBy('id', $filters['order'] ?? 'desc');

        if (isset($filters['per_page'])) {
            $result = $suppliers->paginate($filters['per_page']);
        } else {
            $result = $suppliers->get();
        }

        return $result;
    }

    /**
     * Store new supplier
     *
     * @param array $supplierData
     * @return Supplier|\Exception
     */
    public function storeSupplier(array $supplierData)
    {
        DB::beginTransaction();

        try {
            $this->supplier = $this->store([
                'company' => $supplierData['company'],
                'email' => $supplierData['email'],
                'phone' => $supplierData['phone'],
                'mobile' => $supplierData['mobile'],
                'website' => $supplierData['website'],
                'country' => $supplierData['country'],
                'created_by' => Auth::id(),
            ]);

            if (isset($supplierData['persons_in_charge'])) {
                $this->supplier->personsInCharge()->attach($supplierData['persons_in_charge']);
            }

            $this->supplier->customers()->attach($supplierData['customers_id']);

            $this->storeBrand($supplierData['supplying_brands']);

            $this->storeProductCategories($supplierData['product_categories']);

            DB::commit();

            $this->supplier->load(['supplyingBrands', 'productCategories', 'customers', 'personsInCharge']);

            return $this->supplier;
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }
    }

    /**
     * Update the specified supplier.
     *
     * @param array $supplierData
     * @return Supplier|\Exception
     */
    public function updateSupplier($supplier, array $supplierData)
    {
        DB::beginTransaction();

        try {
            $this->supplier = $supplier;
            $this->supplier->update([
                'company' => $supplierData['company'],
                'email' => $supplierData['email'],
                'phone' => $supplierData['phone'],
                'mobile' => $supplierData['mobile'],
                'website' => $supplierData['website'],
                'country' => $supplierData['country'],
                'created_by' => Auth::id(),
            ]);

            if (isset($supplierData['persons_in_charge'])) {
                $this->supplier->personsInCharge()->sync($supplierData['persons_in_charge']);
            }

            $this->supplier->customers()->sync($supplierData['customers_id']);

            $this->storeBrand($supplierData['supplying_brands'], 'sync');

            $this->storeProductCategories($supplierData['product_categories'], 'sync');

            DB::commit();

            $this->supplier->load(['supplyingBrands', 'productCategories', 'customers', 'personsInCharge']);

            return $this->supplier;
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }
    }

    protected function storeBrand($brands, $action = 'attach')
    {
        $brandIds = [];

        foreach ($brands as $brand) {
            $brand = Brand::firstOrCreate(
                ['name' => $brand],
                ['created_by' => Auth::id()]
            );

            $brandIds[] = $brand->id;
        }

        $this->supplier->supplyingBrands()->{$action}($brandIds);
    }

    protected function storeProductCategories($categories, $action = 'attach')
    {
        $categoryIds = [];

        foreach ($categories as $category) {
            $category = ProductCategory::firstOrCreate(
                ['title' => $category],
                ['created_by' => Auth::id()]
            );

            $categoryIds[] = $category->id;
        }

        $this->supplier->productCategories()->{$action}($categoryIds);
    }

}
