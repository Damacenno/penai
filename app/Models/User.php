<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'penai_users'; // se sua tabela for diferente do padrão

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
