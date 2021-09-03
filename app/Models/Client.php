<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'person_type',
        'cpf',
        'corporate_reason',
        'fantasy_name',
        'cnpj',
        'sex',
        'birth_date',
        'note'
    ];

    public function address(){
        return $this->hasMany(Address::class, 'client_id', 'id');
    }

    public function contact(){
        return $this->hasMany(Contact::class, 'client_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
