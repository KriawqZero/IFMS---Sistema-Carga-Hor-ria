@extends('_layouts.master')

@section('body')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Validar Certificados</h1>

    <!-- Filtro por Turmas -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Filtrar Certificados</h2>
        <form>
            <div class="mb-4">
                <label for="turma" class="block text-sm font-medium text-gray-700">Selecione a Turma</label>
                <select id="turma" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="">Todos os Alunos</option>
                    <option value="turma_a">Turma A</option>
                    <option value="turma_b">Turma B</option>
                    <option value="turma_c">Turma C</option>
                </select>
            </div>
            <button type="button" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Filtrar</button>
        </form>
    </div>

    <!-- Certificados Enviados -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Certificados Enviados</h2>

        <!-- Caso não haja certificados -->
        <p class="text-sm text-gray-500" id="no-certificates" style="display: none;">Nenhum certificado enviado para validação.</p>

        <!-- Tabela de Certificados -->
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 px-4 py-2">Aluno</th>
                    <th class="border-b border-gray-300 px-4 py-2">Turma</th>
                    <th class="border-b border-gray-300 px-4 py-2">Arquivo</th>
                    <th class="border-b border-gray-300 px-4 py-2">Observações</th>
                    <th class="border-b border-gray-300 px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dados simulados -->
                <tr>
                    <td class="border-b border-gray-200 px-4 py-2">João Silva</td>
                    <td class="border-b border-gray-200 px-4 py-2">Turma A</td>
                    <td class="border-b border-gray-200 px-4 py-2"><a href="#" class="text-green-600 hover:underline" target="_blank">Visualizar</a></td>
                    <td class="border-b border-gray-200 px-4 py-2">Curso de Extensão</td>
                    <td class="border-b border-gray-200 px-4 py-2 space-y-2">
                        <!-- Marcar como Visto fora do modal -->
                        <div class="inline-flex items-center">
                            <label class="flex items-center cursor-pointer relative" for="check-joao">
                                <input type="checkbox" checked class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-joao" />
                                <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                            <span class="ml-2 text-sm">Marcar como Visto</span>
                        </div>

                        <!-- Ícone para abrir o modal -->
                        <button onclick="openModal('modal-joao')" class="text-gray-600 hover:text-gray-900">⬇️</button>
                    </td>
                </tr>
                <tr>
                    <td class="border-b border-gray-200 px-4 py-2">Maria Oliveira</td>
                    <td class="border-b border-gray-200 px-4 py-2">Turma B</td>
                    <td class="border-b border-gray-200 px-4 py-2"><a href="#" class="text-green-600 hover:underline" target="_blank">Visualizar</a></td>
                    <td class="border-b border-gray-200 px-4 py-2">Evento Científico</td>
                    <td class="border-b border-gray-200 px-4 py-2 space-y-2">
                        <!-- Marcar como Visto fora do modal -->
                        <div class="inline-flex items-center">
                            <label class="flex items-center cursor-pointer relative" for="check-maria">
                                <input type="checkbox" checked class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-maria" />
                                <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                            <span class="ml-2 text-sm">Marcar como Visto</span>
                        </div>

                        <!-- Ícone para abrir o modal -->
                        <button onclick="openModal('modal-maria')" class="text-gray-600 hover:text-gray-900">⬇️</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal (para João) -->
<div id="modal-joao" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-96 relative">
        <button class="absolute top-2 right-2" onclick="closeModal('modal-joao')">X</button>
        <h2 class="text-lg font-semibold mb-4">Ações para João Silva</h2>

        <div class="space-y-4">
            <!-- Opções de Aprovação/Rejeição -->
            <div class="flex gap-2">
                <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 w-full">Aprovar</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 w-full">Rejeitar</button>
            </div>

            <!-- Alterar Tipo -->
            <div>
                <label for="tipo-certificado-joao" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select id="tipo-certificado-joao" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="participacao">Participação</option>
                    <option value="carga_horaria">Carga Horária</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <!-- Carga Horária -->
            <div class="mt-4">
                <label for="carga-horaria-joao" class="block text-sm font-medium text-gray-700">Quantidade de Carga Horária</label>
                <input type="number" id="carga-horaria-joao" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Horas" />
            </div>
        </div>
    </div>
</div>

<!-- Modal (para Maria) -->
<div id="modal-maria" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-96 relative">
        <button class="absolute top-2 right-2" onclick="closeModal('modal-maria')">X</button>
        <h2 class="text-lg font-semibold mb-4">Ações para Rato Oliveira</h2>

        <div class="space-y-4">
            <!-- Opções de Aprovação/Rejeição -->
            <div class="flex gap-2">
                <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 w-full">Aprovar</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 w-full">Rejeitar</button>
            </div>

            <!-- Alterar Tipo -->
            <div>
                <label for="tipo-certificado-maria" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select id="tipo-certificado-maria" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="participacao">Participação</option>
                    <option value="carga_horaria">Carga Horária</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <!-- Carga Horária -->
            <div class="mt-4">
                <label for="carga-horaria-maria" class="block text-sm font-medium text-gray-700">Quantidade de Carga Horária</label>
                <input type="number" id="carga-horaria-maria" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Horas" />
            </div>
        </div>
    </div>
</div>

<!-- Script para abrir e fechar modais -->
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
@endsection
