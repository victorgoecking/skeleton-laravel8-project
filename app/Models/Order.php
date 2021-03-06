<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'budget',
        'total_products',
        'total_services',
        'total',
        'cash_discount',
        'percentage_discount',
        'cost_freight',
        'delivery_address_id',
        'order_date',
        'delivery_forecast',
        'validity',
        'note',
        'internal_note',
        'situation_id',
        'user_id',
        'salesman',
        'client_id',
    ];

    protected $casts = [
        'order_date' => 'date:Y-m-d',
        'delivery_forecast' => 'date:Y-m-d',
        'validity' => 'date:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function situation(){
        return $this->belongsTo(Situation::class, 'situation_id', 'id');
    }

    public function ordersProducts(){
        return $this->belongsToMany(Product::class, 'orders_products','order_id', 'product_id');
    }
    public function ordersServices(){
        return $this->belongsToMany(Service::class, 'orders_services','order_id', 'service_id');
    }
}
