<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion'  => 'required|string|max:255',
            'ubicacion'    => 'required|string|max:255',
            'idCategoria'  => 'required|integer|exists:categorias,idCategoria',
        ]);

        $material = Material::create($validated);
        $material->load('categoria');

        return response()->json($material, 201);
    }

    // update() → Miembro 2
    // index()  → Miembro 3
}