<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Material;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
       // Crear una categoría para el material
       $categoria = Categoria::create(['nombre' => 'Categoria de prueba']);

       // Datos del nuevo material (sin 'descripcion')
       $data = [
           'nombre' => 'Material de prueba',
           'categoria_id' => $categoria->id,
       ];

       // Realizar la petición para insertar el material
       $response = $this->postJson('/materiales', $data);

       // Verificar la respuesta
       $response->assertStatus(201)
                ->assertJson([
                    'message' => 'Material creado exitosamente',
                    'material' => [
                        'nombre' => 'Material de prueba',
                        // Asegúrate de que 'descripcion' no esté presente en la respuesta
                        'categoria_id' => $categoria->id,
                    ],
                ]);

       // Verificar que el material se haya insertado en la base de datos
       $this->assertDatabaseHas('materiales', [
           'nombre' => 'Material de prueba',
           'categoria_id' => $categoria->id,
       ]);
    }
}