<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $table = 'requisiciones';
    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado',
        'idUsuario',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function items()
    {
        return $this->hasMany(ItemRequisicion::class, 'idRequisicion', 'idRequisicion');
    }

    public function requisicionPadre()
    {
        return $this->belongsTo(Requisicion::class, 'idRequisicionPadre', 'idRequisicion');
    }
}