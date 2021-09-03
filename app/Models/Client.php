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
        'birth_date'
    ];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
