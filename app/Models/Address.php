<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'addresses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cep',
        'public_place',
        'number',
        'district',
        'city_id',
        'complement',
        'note',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
