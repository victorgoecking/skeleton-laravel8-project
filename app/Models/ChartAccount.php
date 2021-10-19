<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chart_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'description',
    ];

    public function cashMovements(){
        return $this->hasMany(CashMovement::class, 'chart_account_id', 'id');
    }
}
