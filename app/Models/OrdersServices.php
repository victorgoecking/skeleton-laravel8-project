<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersServices extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_description_order',
        'service_cost_value_when_order_placed',
        'sales_value_service_used_order',
        'discount_service',
        'order_service_subtotal',
        'service_id',
        'order_id',
    ];

}
