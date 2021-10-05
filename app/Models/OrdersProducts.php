<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_description_order',
        'quantity',
        'meter',
        'order_product_subtotal',
        'discount_product',
        'product_cost_value_when_order_placed',
        'sales_value_product_used_order',
        'order_id',
        'product_id',
    ];
}
