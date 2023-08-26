<?php

namespace App\Interfaces\Repositories;

use App\Models\Shipping;

interface ShippingRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Store a new shipping resource
     *
     * @param array $shippingData
     * @return \Exception|Shipping
     */
    public function storeShipping(array $shippingData): \Exception|Shipping;

    /**
     * Store a new shipping resource
     *
     * @param Shipping $shipping
     * @param array $shippingData
     * @return \Exception|Shipping
     */
    public function updateShipping(Shipping $shipping, array $shippingData): \Exception|Shipping;
}
