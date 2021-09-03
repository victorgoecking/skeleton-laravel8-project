<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'phone',
        'cell_phone',
        'whatsapp',
        'note'
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
