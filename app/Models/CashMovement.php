<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashMovement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cash_movements';

    protected $fillable = [
        'type_movement',
        'description',
        'gross_value',
        'settled',
        'due_date',
        'clearing_date',
        'situation',
        'note',
        'order_id',
        'cashier_id',
        'user_id',
        'chart_accounts_id',
    ];

    protected $casts = [
        'due_date' => 'date:Y-m-d',
        'clearing_date' => 'date:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function formPaymentCashMovements(){
        return $this->belongsToMany(FormPayment::class, 'form_payment_cash_movements','cash_movement_id', 'form_payment_id');
    }

    public function chartAccount(){
        return $this->belongsTo(ChartAccount::class, 'chart_accounts_id', 'id');
    }
}
