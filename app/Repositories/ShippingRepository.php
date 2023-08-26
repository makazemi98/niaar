<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ShippingRepositoryInterface;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ShippingRepository extends BaseRepository implements ShippingRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Shipping::class);
    }

    public function list(array $filters)
    {
        return $this->model
            ->with('statuses')
            ->when(isset($filters['status']), function ($query) use($filters) {
                $query->currentStatus($filters['status']);
            })
            ->when(isset($filters['captain_info']), function ($query) use($filters) {
                $query->where('captain_info', 'like', "%{$filters['captain_info']}%");
            })
            ->when(isset($filters['agent_name']), function ($query) use($filters) {
                $query->where('agent_name', 'like', "%{$filters['agent_name']}%");
            })
            ->when(isset($filters['agent_no']), function ($query) use($filters) {
                $query->where('agent_no', 'like', "%{$filters['agent_no']}%");
            })
            ->withCount('boxes')
            ->paginate();
    }

    protected function uploadDoc($shipping, $doc)
    {
        $path = Storage::disk('shipping')
            ->putFileAs(
                '/',
                $doc,
                $shipping->id . '/' . $doc->getClientOriginalName()
            );

        $shipping->addMediaFromDisk($path, 'shipping')->toMediaCollection('delivery_docs');
    }

    /**
     * Store a new shipping resource
     *
     * @param array $shippingData
     * @return \Exception|Shipping
     */
    public function storeShipping(array $shippingData):\Exception|Shipping
    {
        DB::beginTransaction();

        try {
            $shipping = $this->store([
                'captain_info' => $shippingData['captain_info'],
                'agent_name' => $shippingData['agent_name'],
                'agent_no' => $shippingData['agent_no'],
                'sign' => $shippingData['sign'],
                'handed_over_date' => $shippingData['handed_over_date'],
                'created_by' => Auth::id()
            ]);

            $shipping->setStatus($shippingData['status']);

            if (isset($shippingData['delivery_doc'])) {
                $this->uploadDoc($shipping, $shippingData['delivery_doc']);
            }

        } catch (\Exception $exception) {
            Log::channel('shipping')
                ->error($exception);

            DB::rollBack();

            return $exception;
        }

        DB::commit();

        return $shipping;
    }

    /**
     * Store a new shipping resource
     *
     * @param Shipping $shipping
     * @param array $shippingData
     * @return \Exception|Shipping
     */
    public function updateShipping(Shipping $shipping, array $shippingData): \Exception|Shipping
    {
        DB::beginTransaction();

        try {
            $shipping->update([
                'captain_info' => $shippingData['captain_info'],
                'agent_name' => $shippingData['agent_name'],
                'agent_no' => $shippingData['agent_no'],
                'sign' => $shippingData['sign'],
                'handed_over_date' => $shippingData['handed_over_date'],
            ]);

            $shipping->setStatus($shippingData['status']);

            if (isset($shippingData['delivery_doc'])) {
                $this->uploadDoc($shipping, $shippingData['delivery_doc']);
            }

            $shipping->load('boxes')
                ->loadCount('boxes as total_boxes')
                ->loadSum('boxes as total_volume', 'volume');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('shipping')
                ->error($exception);
            return $exception;
        }

        DB::commit();

        return $shipping;
    }
}
