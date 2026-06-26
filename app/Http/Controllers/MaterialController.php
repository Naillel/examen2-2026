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
    public function update(Request $request, int $id): JsonResponse
{
    $material = Material::findOrFail($id);

    $validated = $request->validate([
        'unidadMedida' => 'sometimes|string|max:255',
        'descripcion'  => 'sometimes|string|max:255',
        'ubicacion'    => 'sometimes|string|max:255',
        'idCategoria'  => 'sometimes|integer|exists:categorias,idCategoria',
    ]);

    $material->update($validated);
    $material->load('categoria');

    return response()->json($material, 200);
}
    // index()  → Miembro 3

    public function index(): JsonResponse
{
    $materiales = Material::with('categoria')->get();
    return response()->json($materiales, 200);
}
}