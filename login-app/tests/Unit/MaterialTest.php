<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Material;
use App\Models\Cadeira;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaterialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cria_um_material_com_sucesso()
    {
        $material = Material::create(['nome' => 'Couro']);

        $this->assertDatabaseHas('material', [
            'nome' => 'Couro',
        ]);
    }

    /** @test */
    public function retorna_cadeiras_relacionadas_ao_material()
    {
        $material = Material::create(['nome' => 'Tecido']);

        $material->cadeiras()->create([
            'nome' => 'Cadeira Tecido Macio',
            'preco' => 599.99,
            'id_categoria' => 1,
            'img' => 'tecido.jpg',
            'descricao' => 'Confortável para uso prolongado',
        ]);

        $this->assertCount(1, $material->cadeiras);
        $this->assertEquals('Cadeira Tecido Macio', $material->cadeiras->first()->nome);
    }
}
