<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Situation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'situation_id', 'id');
    }
}
