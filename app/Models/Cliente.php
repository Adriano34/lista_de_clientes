<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=[
    "nome","rg", "email", "telefone", "endereco", "foto"
    ];
}
