<?php

namespace App\Interfaces\Repositories;

interface PaymentRepositoryInterface extends BaseRepositoryInterface
{
    public function setFilters(array $filters);

    public function setTabName(string $name);

    public function getMeta();

    public function getTabData();

    public function getProfit();

    public function getUserByMeta(string $meta);
}
