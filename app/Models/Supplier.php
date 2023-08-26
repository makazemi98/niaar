<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, HasCreator;

    protected $fillable = [
        'company',
        'email',
        'phone',
        'mobile',
        'website',
        'country',
        'created_by'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Supplier supported brands
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function supplyingBrands()
    {
        return $this->belongsToMany(Brand::class);
    }

    /**
     * Supplier supported product categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'supplier_product_categories');
    }

    /**
     * Supplier customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany(
            User::class,
            'customer_supplier',
            'supplier_id',
            'client_id'
        );
    }

    /**
     * Supplier in charge person
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personsInCharge()
    {
        return $this->belongsToMany(
            User::class,
            'supplier_person_in_charge',
            'supplier_id',
            'in_charge_id'
        );
    }
}
