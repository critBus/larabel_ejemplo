<?php

namespace Tests\Unit;

use App\Models\Persona;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonaControllerTest extends TestCase
{
    use RefreshDatabase; // Para usar migraciones y limpiar la base de datos entre pruebas

    /** @test */
    public function it_can_list_personas()
    {
        $persona = Persona::factory()->create(); // Crea una persona usando una fábrica

        $response = $this->get('/api/personas'); // Cambia esta ruta según tu configuración

        $response->assertStatus(200);
        $response->assertJson([$persona->toArray()]); // Verifica que la respuesta contenga la persona creada
    }

    /** @test */
    public function it_can_store_a_persona()
    {
        $data = [
            'nombre' => 'Juan',
            'apellidos' => 'Pérez',
            'edad' => 30,
            'sexo' => 'Masculino',
            'correo' => 'juan.perez@example.com',
            'nacionalidad' => 'Cubana',
        ];

        $response = $this->post('/api/personas', $data); // Cambia esta ruta según tu configuración

        $response->assertStatus(201);
        $this->assertDatabaseHas('personas', $data); // Verifica que la persona se haya guardado en la base de datos
    }

    /** @test */
    public function it_can_show_a_persona()
    {
        $persona = Persona::factory()->create(); // Crea una persona usando una fábrica

        $response = $this->get('/api/personas/' . $persona->id); // Cambia esta ruta según tu configuración

        $response->assertStatus(200);
        $response->assertJson($persona->toArray()); // Verifica que la respuesta contenga la persona correcta
    }

    /** @test */
    public function it_can_update_a_persona()
    {
        $persona = Persona::factory()->create(); // Crea una persona usando una fábrica

        $data = [
            'nombre' => 'Carlos',
            'apellidos' => 'Gómez',
            'edad' => 35,
            'sexo' => 'Masculino',
            'correo' => 'carlos.gomez@example.com',
            'nacionalidad' => 'Cubana',
        ];

        $response = $this->put('/api/personas/' . $persona->id, $data); // Cambia esta ruta según tu configuración

        $response->assertStatus(200);
        $this->assertDatabaseHas('personas', $data); // Verifica que los datos se hayan actualizado
    }

    /** @test */
    public function it_can_delete_a_persona()
    {
        $persona = Persona::factory()->create(); // Crea una persona usando una fábrica

        $response = $this->delete('/api/personas/' . $persona->id); // Cambia esta ruta según tu configuración

        $response->assertStatus(204);
        $this->assertDatabaseMissing('personas', ['id' => $persona->id]); // Verifica que la persona se haya eliminado
    }
}