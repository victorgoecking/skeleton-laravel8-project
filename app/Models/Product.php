<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'product_cost_value',
        'profit_percentage',
        'sales_value_product_used',
        'weight',
        'width',
        'height',
        'length',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
