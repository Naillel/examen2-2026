<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto',
        'idUnidad',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function materialUnidades()
    {
        return $this->belongsToMany(
            MaterialUnidad::class,
            'material_unidad_presupuesto',
            'codigoPresupuesto',
            'idMaterialUnidad'
        );
    }
}