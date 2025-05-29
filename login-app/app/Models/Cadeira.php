<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    use HasFactory;

    protected $table = 'cadeiras';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'nome',
        'preco',
        'id_material',
        'id_categoria',
        'img',
        'descricao',
    ];
    public $timestamps = false;
    protected $casts = [
        'preco' => 'decimal:2',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'codigo');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material', 'codigo');
    }

    public function getImgUrlAttribute()
    {
        return $this->img ? asset('img/' . $this->img) : null;
    }

    public function getPrecoFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }

    public function getNomeResumoAttribute()
    {
        return strlen($this->nome) >= 50 ? substr($this->nome, 0, 50) . '...' : $this->nome;
    }
}
