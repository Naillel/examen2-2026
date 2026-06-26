<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
 protected $table = 'unidades';
    protected $primaryKey = 'idUnidad';

    protected $fillable = [
        'nombre',
    ];

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'idUnidad', 'idUnidad');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idUnidad', 'idUnidad');
    }
}
