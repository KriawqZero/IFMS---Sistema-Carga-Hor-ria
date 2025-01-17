<?php
namespace Database\Factories;

use App\Models\Turma;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurmaFactory extends Factory {
    protected $model = Turma::class;

    public function definition() {
        $turnos = ['10', '20', '30']; // manhã, tarde, noite
        $cursos = ['2', '7']; // informática e metalurgia
        $sala = str_pad($this->faker->numberBetween(1, 50), 2, '0', STR_PAD_LEFT); // Sala de 1 até 99

        $turno = $this->faker->randomElement($turnos);
        $curso = $this->faker->randomElement($cursos);

        $tecnico = $curso == '2' ? 'Informática' : 'Metalurgia'; // Técnico em Informática ou Técnico em Metalurgia

        $professor_id = Professor::where('cargo', 'professor')->inRandomOrder()->first()->id; // Seleciona um professor aleatório
        return [
            'codigo' => $turno . $curso . $sala, // Gera o código da turma
            'curso' => $tecnico,
            'professor_id' => $professor_id, // Seleciona um professor aleatório
        ];
    }
}

