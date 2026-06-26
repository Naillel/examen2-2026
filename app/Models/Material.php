<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'codigo', 'codigo');
    }
}