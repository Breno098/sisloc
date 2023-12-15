# Tool rental

MVP para loja de aluguel de ferramentas e equipamentos.

### 📋 Pré-requisitos

Para execução do projeto, é necessário que na máquina haja:
    - PHP (versão minina 8.1)
    - Composer 
    - Node (versão minima 16.17.1) 
    - NPM (versão mínima 8.15.0)

```
Dar exemplos
```

### 🔧 Instalação

Clone o repositório

    git clone https://github.com/Breno098/sisloc

Navegue até a pasta do projeto:

    cd .\sisloc

## Configurando API

Navegue até a raiz da API:
 
    cd api/

Faça a instalação das dependencias PHP com o comando: 

    composer install

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env

    cp .env.example .env

Gerar uma nova chave de aplicativo

    php artisan key:generate

Execute as migrações do banco de dados (defina a conexão do banco de dados em .env antes de migrar)

    php artisan migrate

Inicie o servidor de desenvolvimento local

    php artisan serve

Caso não haja alterações no projeto, será inicializado na porta 8000 (exemplo em localhost: http://localhost:8000/)

### Variáveis de ambiente

- `.env` - As variáveis ​​de ambiente podem ser definidas neste arquivo

### Populando banco de dados

Crie um banco de dados e adicione as informações no arquivo de variáveis de ambiente (.env).

    DB_DATABASE=NOME_DO_BANCO_DE_DADOS
    DB_USERNAME=USUARIO
    DB_PASSWORD=SENHA

Para testes, preencha os dados das tabelas de clients, items, addresses e demais tabelas do aplicativo. Execute o comando:

    php artisan db:seed

## Confirando Front-End

Navegue até a raiz do projeto:
 
    cd web/

Faça a instalação das dependencias PHP com o comando: 

    npm install

Construa e execute o projeto com o comando

    npm run build 
    // ou
    npm run dev

Caso não haja alterações no projeto, será inicializado na porta 3000 (exemplo em localhost: http://localhost:3000/)

## 🛠️ Construído com

* [PHP](https://vuejs.org/)
* [Laravel](https://laravel.com/)
* [Node](https://nodejs.org/en)
* [Vue](https://vuejs.org/)
* [Quasar](https://quasar.dev/)

## 📌 Versão

Nós usamos [GitHub](https://github.com/) para controle de versão.

## ✒️ Autores

* **Breno Souza** - *Trabalho Inicial* - [Breno](https://github.com/Breno098)

---
⌨️ com ❤️ por [Breno](https://github.com/Breno098)