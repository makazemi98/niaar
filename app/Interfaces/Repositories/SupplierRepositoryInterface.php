<?php

namespace App\Interfaces\Repositories;

use App\Models\Supplier;

interface SupplierRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Store new supplier
     *
     * @param array $supplierData
     * @return Supplier
     */
    public function storeSupplier(array $supplierData);

    /**
     * Update the specified supplier.
     *
     * @param Supplier $supplier
     * @param array $supplierData
     * @return mixed
     */
    public function updateSupplier(Supplier $supplier, array $supplierData);

}
