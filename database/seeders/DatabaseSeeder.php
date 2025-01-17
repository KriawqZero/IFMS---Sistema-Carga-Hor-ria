<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Certificado;
use App\Models\Professor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Professor::create([
            'nome' => 'Marcilio Prof',
            'senha' => Hash::make('123456'),
            'cargo' => 'professor',
        ]);

        Professor::create([
            'nome' => 'Marcilio Coord',
            'senha' => Hash::make('123456'),
            'cargo' => 'coordenador',
        ]);

        Professor::create([
            'nome' => 'Marcilio Adm',
            'senha' => Hash::make('123456'),
            'cargo' => 'admin',
        ]);

        /*Professor::factory(3)->create();*/

        Turma::factory(5)->create();

        Aluno::create([
            'cpf' => '000.000.000-00',
            'data_nascimento' => '2006-09-01',
            'turma_id' => Turma::inRandomOrder()->first()->id,
        ]);

        Aluno::factory(10)->create();

        Certificado::factory(100)->create();
    }
}
