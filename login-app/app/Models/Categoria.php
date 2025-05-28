<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'codigo';

    protected $fillable = ['nome'];

    public function cadeiras()
    {
        return $this->hasMany(Cadeira::class, 'id_categoria', 'codigo');
    }
}
