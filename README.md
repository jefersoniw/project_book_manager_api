<h3 align="center">
  <p> API REST - CONSULTA DE LIVROS </p>
</h3>
<h1>
  <img src="./public/swagger_img.png" />
  <p> Documentação Swagger | Endpoints </p>
</h1>

## 📖 Sobre o projeto

-   Criando uma **api rest** para gerenciamento de livros.

-   Aplicação simples **(CRUD)** para aprendizado sobre o desenvolvimento orientado a testes (TDD) com Laravel.

## 🔨 Tecnologias utilizadas

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)
-   [Composer](https://getcomposer.org/)
-   [MySql](https://dev.mysql.com/doc/)
-   [Docker](https://www.docker.com/)
-   [Nginx](https://nginx.org/en/)
-   [Swagger](https://swagger.io/docs/)

## ♻️ Como executar o projeto

### Pré-requisitos:

-   Docker Desktop
-   Git

```bash
  # Clonar repositório
  $ git clone https://github.com/jefersoniw/project-api-tdd.git
```

```bash
  # Entrar na pasta do projeto
  $ cd project-api-tdd
```

```bash
  # copiar o env example para a nova configuração do env
  $ cp .env.example .env
```

```bash
  # copiar e ajustar as configurações de environment
  DB_CONNECTION=mysql
  DB_HOST=db_api_tdd
  DB_PORT=3306
  DB_DATABASE=db_api_tdd
  DB_USERNAME=root
  DB_PASSWORD=password

  REDIS_HOST=redis_api_tdd
  REDIS_PASSWORD=null
  REDIS_PORT=6379
```

```bash
  # Cria e inicia os containers docker
  $ docker compose up -d
```

```bash
  # No docker, acessa o container do php para instalação das dependencias.
  $ docker compose exec app_api_tdd bash
```

```bash
  # Instalando dependências
  $ composer install
```

```bash
  # Gerando uma nova chave no seu arquivo .env
  $ php artisan key:generate
```

```bash
  $ php artisan optimize
```

```bash
  # Publicando todo o schema de dados no banco de dados | Criação das tabelas no banco.
  $ php artisan migrate
```

```bash
  # Executa os testes criados na aplicação.
  $ php artisan test
```

## 🛎️ License

[![NPM](https://img.shields.io/badge/license-MIT-green)](https://github.com/jefersoniw/atendimento_nodejs/blob/main/LICENSE)

## 🤓 Autor

### Jeferson Chagas Silva

### https://www.linkedin.com/in/jefersoniw/
