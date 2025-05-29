<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Cadeira;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriaTest extends TestCase
{
  //  use RefreshDatabase;

    /** @test */
    public function cria_uma_categoria_com_sucesso()
    {
        $categoria = Categoria::create([
            'nome' => 'Cadeiras de Escritório',
        ]);

        $this->assertDatabaseHas('categorias', [
            'nome' => 'Cadeiras de Escritório',
        ]);
    }

    /** @test */
    public function retorna_cadeiras_relacionadas()
    {
        $categoria = Categoria::create(['nome' => 'Gamer']);

        $categoria->cadeiras()->create([
            'nome' => 'Cadeira Gamer XT',
            'preco' => 899.90,
            'id_material' => 1,
            'img' => 'gamer.jpg',
            'descricao' => 'Cadeira Gamer Profissional',
        ]);

        $this->assertCount(1, $categoria->cadeiras);
        $this->assertEquals('Cadeira Gamer XT', $categoria->cadeiras->first()->nome);
    }
}
