<?php

use Tests\TestCase;
use App\Models\Cadastro;
use Illuminate\Support\Facades\DB;

class CadastroTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Força o uso da conexão padrão do .env (ex: cardfort)
        DB::setDefaultConnection('mysql');
    }

    public function test_exemplo()
    {
        $cadastro = Cadastro::create([
            'nome' => 'Teste',
            'sobrenome' => 'Exemplo',
            'email' => 'teste@example.com',
            'usuario' => 'testeusuario',
            'senha' => '123456',
            'foto' => 'foto.jpg',
        ]);

        $this->assertDatabaseHas('cadastro', [
            'usuario' => 'testeusuario',
        ]);
    }
}
