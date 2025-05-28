<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cadastro extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'cadastro';

    protected $primaryKey = 'codigo';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'usuario',
        'senha',
        'foto',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
    ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getAuthIdentifierName()
    {
        return 'usuario';
    }

    public function validateCredentials($password)
    {
        return $this->senha === $password;
    }
}
