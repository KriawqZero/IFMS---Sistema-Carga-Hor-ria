<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Professor;   
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller {
    public function showLoginForm() {
        return view('professor/login', [
            'titulo' => 'Login Servidor',
        ]);
    }

    public function listarAlunos(Request $request) {
        $professor = auth('professor')->user();
        
        // Recupera todas as turmas associadas ao professor e os alunos relacionados
        $turmas = $professor->turmas;
        $alunos = $turmas->pluck('alunos')->flatten();
        
        // Recupera todas as turmas associadas ao professor e os alunos relacionados.
        //$alunos = $professor->turmas()->with('alunos')->get()->pluck('alunos')->flatten();
    
        // Se houver um filtro de turma
        if ($request->has('turma') && $request->turma != 'todas') {
            $turmaSelecionada = $request->turma;
            $alunos = $alunos->filter(function($aluno) use ($turmaSelecionada) {
                return $aluno->turma->codigo == $turmaSelecionada;
            });
        }
    
        return view('professor/alunos', [
            'titulo' => 'Alunos',
            'professor' => $professor,
            'alunos' => $alunos,
            'turmas' => $turmas,
        ]);
    }
    
    public function dashboard() {
        $professor = auth('professor')->user();

        return view('professor/index', [
            'titulo' => 'Servidor',
            'professor' => $professor,
        ]);
    }

    public function validarCertificados() {
        $professor = auth('professor')->user();

        return view('professor/validar_certificados', [
            'titulo' => "Validar Certificados",
            'professor' => $professor,
        ]);
    }

    public function processLogin(Request $request) {
        auth('aluno')->logout();
    
        // Valida os campos de entrada.
        $credentials = $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string',
        ]);
    
        // Dividir o login em partes para correspondência.
        $loginParts = explode('.', strtolower($request->login));
        if (count($loginParts) !== 2) {
            return redirect()->route('professor.login')
                ->withErrors(['login' => 'Formato de login inválido. Use {nome}.{sobrenome}.']);
        }
    
        [$nome, $sobrenome] = $loginParts;
    
        // Buscar o professor pelas colunas `nome` e `sobrenome`.
        $professor = Professor::whereRaw('LOWER(nome) = ?', [$nome])
            ->whereRaw('LOWER(sobrenome) = ?', [$sobrenome])
            ->first();
    
        if (!$professor || !Hash::check($request->senha, $professor->senha)) {
            return redirect()->route('professor.login')
                ->withErrors(['login' => 'Credenciais inválidas.']);
        }
    
        // Autenticar o professor.
        auth('professor')->login($professor);
    
        // Redirecionar para o dashboard em caso de sucesso.
        return redirect()->route('professor.dashboard');
    }
    
}
