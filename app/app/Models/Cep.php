<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    protected $table = 'cep';
    protected $fillable =[
        'postalcode',
        'rua',
        'bairro',
        'cidade',
        'uf'
    ];
}