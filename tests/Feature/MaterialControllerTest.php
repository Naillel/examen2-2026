<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente(): void
    {
        $categoria = Categoria::create(['nombre' => 'Papelería']);

        $payload = [
            'unidadMedida' => 'Caja',
            'descripcion'  => 'Papel bond tamaño carta',
            'ubicacion'    => 'Estante A-1',
            'idCategoria'  => $categoria->idCategoria,
        ];

        $response = $this->postJson('/api/materiales', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'descripcion'  => 'Papel bond tamaño carta',
                     'unidadMedida' => 'Caja',
                     'ubicacion'    => 'Estante A-1',
                 ]);

        $this->assertDatabaseHas('materiales', [
            'descripcion' => 'Papel bond tamaño carta',
        ]);
    }
}