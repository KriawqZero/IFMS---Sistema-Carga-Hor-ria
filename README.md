## FIGMA Protótipo
https://www.figma.com/design/meaMHV4yA26OY9ZkBSnKh0/Sistema-De-Gerenciamento-de-Certificados?node-id=0-1&t=9yd6ztj1M56PQQqC-1

# IFMS-Sistema_CargaHoraria

## Tema
Desenvolvimento de um software WEB para gerenciamento de carga horária de atividades diversificadas realizadas pelos alunos dos cursos técnicos do Campus Corumbá.

## Justificativa
O envio obrigatório das cargas horárias atualmente apresenta dificuldades logísticas e organizacionais que não favorecem o acompanhamento do aluno sobre seu quantitativo de horas entregue, além de sobrecarregar o professor responsável por validar as atividades diversificadas. Nesse contexto, desenvolver um sistema de gerenciamento de carga horária de atividades diversificadas pode melhorar a qualidade da tramitação desses certificados internamente, facilitando a comunicação, validação e acompanhamento do processo pelos envolvidos.

## Problema
Os alunos do IFMS devem acumular Atividades Diversificadas dentro do período de realização do curso, atividades que geram certificados. É necessário cumprir o mínimo de carga horária de 125 horas, conforme previsto nos Projetos Pedagógicos dos Cursos (PPC) técnicos. Atualmente, não há um sistema eficiente para facilitar o envio e validação de certificados, além de permitir verificar o número de horas a serem cumpridas pelo estudante.

## Objetivo Geral
Desenvolver um Sistema WEB de Gerenciamento de carga horária de atividades diversificadas para os cursos técnicos do Campus Corumbá.

## Objetivos Específicos
1. Realizar uma pesquisa bibliográfica sobre os conceitos relacionados com a utilização de atividades diversificadas na vivência acadêmica dos alunos.
2. Identificar os requisitos necessários para a elaboração da documentação do software de gerenciamento de cálculo de horas complementares.
3. Desenvolver um sistema WEB para gerenciamento de carga horária e certificados das atividades diversificadas dos alunos do curso técnico em informática.

## Metodologia
O desenvolvimento do sistema será estruturado em etapas que incluem levantamento de requisitos por meio de reuniões com servidores e professores do Campus Corumbá, seguido pela análise de uma API existente para acesso a dados dos alunos. Serão criados protótipos no Figma para planejar o layout e os fluxos de interação, garantindo uma interface intuitiva. O back-end será implementado com Laravel 11, e o front-end usará Tailwind e Bootstrap, com MariaDB como banco de dados. Uma API de teste em C# será desenvolvida para evitar dependência da rede local do campus. Por fim, apresentações práticas serão realizadas para capacitar servidores e alunos no uso do sistema.

O desenvolvimento do sistema será realizado com base em etapas bem definidas:
1. Reunião com servidores e professores para levantar informações sobre as necessidades e requisitos do sistema, além de identificar os principais casos de uso e fluxos de trabalho.
2. Definição de como o sistema realizará a requisição de dados dos alunos, utilizando uma API já existente no campus.
3. Projeto dos aspectos estruturais do sistema, incluindo fluxos de interação e layout, com protótipos visuais no Figma.
4. Desenvolvimento de uma API de teste em C# para simular o comportamento da API oficial.
5. Implementação do front-end utilizando os protótipos criados no Figma.
6. Implementação da estrutura principal da aplicação com Laravel 11 para o back-end, Tailwind e Bootstrap para o design responsivo, e MariaDB como banco de dados.
7. Integração inicial com a API de teste, permitindo ajustes antes da conexão com a API oficial.
8. Realização de apresentações para servidores e alunos para demonstrar as funcionalidades do sistema e capacitá-los no uso da solução.

## Estrutura do Projeto
- **Backend:** Laravel 11
- **Frontend:** Tailwind, Bootstrap
- **Banco de Dados:** MariaDB
- **Prototipagem:** Figma
 
### Ambiente de desenvolvimento:
- **API de Teste:** C#
- **Backend:** Docker, Docker-compose

## Como configurar e rodar o projeto

### Pré-requisitos
- PHP 8.x
- Composer
- Node.js
- MariaDB

### Passos para Configuração
1. Clone o repositório:
    ```bash
    git clone https://github.com/KriawqZero/IFMS-Sistema_CargaHoraria.git
    cd IFMS-Sistema_CargaHoraria
    ```

2. Instale as dependências do Laravel:
    ```bash
    composer install
    ```

3. Configure o arquivo `.env` com suas credenciais de banco de dados.

4. Execute as migrações do banco de dados:
    ```bash
    php artisan migrate
    ```

5. Inicie o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```

## Utilizando Docker

### Inicializando o Container Docker

Para facilitar o processo de configuração e execução do projeto, você pode utilizar Docker. Siga os passos abaixo para inicializar os containers Docker:

1. Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

2. Crie e configure o arquivo `.env` com suas credenciais de banco de dados, se ainda não o fez.

3. Suba os containers definidos no arquivo `docker-compose.yml`:
    ```bash
    docker-compose up -d
    ```

4. Verifique os containers em execução:
    ```bash
    docker-compose ps
    ```

5. Acesse o banco de dados MariaDB:
    ```bash
    docker exec -it mariadb_local bash
    mysql -u root -p
    ```

6. Para parar os containers:
    ```bash
    docker-compose stop
    ```

7. Para remover os containers e volumes associados:
    ```bash
    docker-compose down -v
    ```

8. Para visualizar os logs de um serviço específico, por exemplo, do phpMyAdmin:
    ```bash
    docker-compose logs phpmyadmin
    ```

9. Para reconstruir as imagens após alterações no `docker-compose.yml`:
    ```bash
    docker-compose build
    ```

### Contribuição
Para contribuir com o projeto, faça um fork do repositório, crie uma nova branch com suas alterações e envie um pull request.

## Licença
Este projeto não possui uma licença definida.
