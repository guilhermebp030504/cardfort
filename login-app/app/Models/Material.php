<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';
    protected $primaryKey = 'codigo';

    protected $fillable = ['nome'];
    public $timestamps = false;
    public function cadeiras()
    {
        return $this->hasMany(Cadeira::class, 'id_material', 'codigo');
    }
}
