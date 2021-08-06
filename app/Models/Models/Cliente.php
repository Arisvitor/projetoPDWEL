<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class \Cliente extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'endereco',
        'email',
        'telefone',
        ];
}
