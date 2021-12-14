<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPaymentCashMovements extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'form_payment_cash_movements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'paid',
        'note',
        'cash_movement_id',
        'form_payment_id'
    ];

    public function formPayments(){
        return $this->belongsTo(FormPayment::class, 'form_payment_id', 'id');
    }

    public function cashMovement(){
        return $this->belongsTo(CashMovement::class, 'cash_movement_id','id');
    }
}
