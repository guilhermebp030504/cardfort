<?php

namespace Database\Factories;

use App\Models\Cadastro;
use Illuminate\Database\Eloquent\Factories\Factory;

class CadastroFactory extends Factory
{
    protected $model = Cadastro::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->firstName(),
            'sobrenome' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'usuario' => $this->faker->unique()->userName(),
            'senha' => 'senha123', // simulação simples para teste
            'foto' => 'foto.jpg',
        ];
    }
}
