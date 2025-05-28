<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cadeira;
use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CadeiraTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cria_uma_cadeira_com_sucesso()
    {
        $categoria = Categoria::create(['nome' => 'Escritório']);
        $material = Material::create(['nome' => 'Madeira']);

        $cadeira = Cadeira::create([
            'nome' => 'Cadeira Giratória',
            'preco' => 499.90,
            'id_material' => $material->codigo,
            'id_categoria' => $categoria->codigo,
            'img' => 'cadeira.jpg',
            'descricao' => 'Cadeira confortável',
        ]);

        $this->assertDatabaseHas('cadeiras', [
            'nome' => 'Cadeira Giratória',
        ]);
    }

    /** @test */
    public function retorna_valores_formatados_corretamente()
    {
        $cadeira = new Cadeira([
            'nome' => str_repeat('a', 55),
            'preco' => 1234.5,
            'img' => 'foto.jpg',
        ]);

        $this->assertEquals('R$ 1.234,50', $cadeira->preco_formatado);
        $this->assertEquals(asset('img/foto.jpg'), $cadeira->img_url);
        $this->assertTrue(str_ends_with($cadeira->nome_resumo, '...'));
        $this->assertEquals(53, strlen($cadeira->nome_resumo)); // 50 + 3 pontos
    }
}
