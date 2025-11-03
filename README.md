##  Open Shelf: Sua Biblioteca Digital.

O **Open Shelf** é um projeto de biblioteca digital desenvolvido para a disciplina de Web-Servidor. Esta versão foi refatorada com o objetivo de demonstrar a implementação de funcionalidades de *backend* utilizando PHP 8+ em arquitetura Orientada a Objetos.

O sistema utiliza **PDO** para conexão com banco de dados MySQL, **Composer** para gerenciamento de autoloading (PSR-4) e um padrão MVC simplificado (Front Controller) para roteamento.

-----

## Funcionalidades Principais do Sistema

O sistema apresenta uma tela inicial que dá acesso às seguintes funcionalidades:

| Opção | Descrição |
| :--- | :--- |
| **Home** | Direciona o usuário para a página inicial. |
| **Catalogue** | Permite a consulta ao acervo de livros já cadastrados. |
| **Lending Book** | Direciona para a funcionalidade de emprestar um livro do acervo (requer login). |
| **For Author** | Espaço para autores independentes publicarem seus livros no acervo. |
| **Sign In** | Página para o cadastro de novos usuários na biblioteca digital. |
| **Login** | Destinado a usuários já cadastrados entrarem em suas devidas contas e consultarem seus livros emprestados. |
| **My Profile** | (Logado) Permite ao usuário ver seus dados, gerenciar seus livros emprestados e editar/deletar sua conta. |
| **Admin** | (Logado como Admin) Painel de gerenciamento para visualizar, editar e deletar usuários. |

-----

##  Instalação e Execução (Windows)

Para rodar o projeto Open Shelf localmente, siga os passos para instalar o PHP, Composer e o Git.

### 1\. Instalação e Configuração do PHP

1.  Acesse o link oficial do PHP: **[https://windows.php.net/download](https://windows.php.net/download)** e baixe o arquivo **`.ZIP`** do PHP 8+.
2.  Após o download, descompacte a pasta ZIP em um local de sua preferência (ex: `C:\php`).
3.  Adicione o diretório `C:\php` às suas **"variáveis de ambiente"** (variável "Path").
4.  (Opcional, mas recomendado) Instale um pacote como o XAMPP, que já inclui PHP e MySQL pré-configurados.

### 2\. Instalação do Git Bash

1.  Acesse o site oficial do Git em **[https://git-scm.com](https://git-scm.com)**.
2.  Baixe e instale o Git para Windows.

### 3\. Instalação do Composer

1.  Acesse o site oficial: **[https://getcomposer.org/download/](https://getcomposer.org/download/)**.
2.  Baixe e execute o `Composer-Setup.exe`. Ele encontrará automaticamente sua instalação do PHP (do Passo 1).

### 4\. Clonando e Configurando o Repositório

1.  Escolha um diretório (ex: `C:\xampp\htdocs\`) e abra o **Git Bash Here**.
2.  Clone o repositório:
    ```bash
    git clone [https://github.com/amand4morais/OpenShelf](https://github.com/amand4morais/OpenShelf)
    ```
3.  Navegue até o diretório do projeto:
    ```bash
    cd OpenShelf
    ```
4.  **Instale as dependências (Autoload):**
    Este comando irá ler o arquivo `composer.json` e gerar a pasta `vendor/` com o `autoload.php`.
    ```bash
    composer install
    ```
5.  **Configuração do Banco de Dados:**
    * Inicie seu servidor MySQL (ex: pelo painel do XAMPP).
    * Use o phpMyAdmin (ou outro cliente) e crie um banco de dados chamado `openshelf`.
    * Importe o arquivo `scriptDataBase.sql` para dentro do banco `openshelf`.
    * Abra o arquivo `db.openshelf.php` e edite as variáveis `$host`, `$dbname`, `$username` e `$password` com suas credenciais.

6.  **Execute o Servidor:**
    * No terminal, na raiz do projeto, execute o servidor embutido do PHP:
    ```bash
    php -S localhost:8080
    ```
    Isso iniciará o servidor.
7.  Abra um navegador e cole a seguinte URL:
    ```
    http://localhost:8080
    ```

O sistema deve estar funcionando normalmente.

-----

##  Status e Melhorias Futuras

Este projeto foi desenvolvido com a intenção de ganho de nota parcial para a matéria de Web-Servidor. Com a refatoração, os seguintes pontos foram tratados:

* **Inclusão de mensagens de *feedback*** (sucesso/erro) em todas as páginas.
* A funcionalidade de **"New Arrivals"** na `main-page` foi **completada** e está funcional, buscando dados do banco.
* **Bugs Críticos Corrigidos:** A lógica que armazenava dados de usuários e empréstimos em `$_SESSION` foi removida e substituída por interações corretas com o banco de dados.
* **Melhoria Futura:** Tratamento de erros mais específicos (ex: validação de formato de CPF, força de senha).

-----

##  Desenvolvedores

| Participante | Responsabilidade |
| :--- | :--- |
| **Amanda Morais Ribeiro** | Responsável pelo *front-end*, suporte em HTML e suporte em *backend*. |
| **José Ernesto Marra Filho** | Responsável pelos CRUDs, correção de *bugs* e suporte em *backend*. |
| **Lucas Monteiro Ribas** | Responsável pela definição de roteadores, correção de *bugs* e suporte em *backend*. |

-----

## Open Shelf: Your Digital Library

The **Open Shelf** is a simple digital library project developed for a Web Server university course. This version was refactored to demonstrate the implementation of basic backend functionalities using PHP 8+ in an Object-Oriented (OO) architecture.

The system uses **PDO** for the MySQL database connection, **Composer** for PSR-4 autoloading, and a simplified Front Controller pattern for routing.

-----

## Core System Features

The system presents an initial screen that provides access to the following functionalities:

| Option | Description |
| :--- | :--- |
| **Home** | Directs the user back to the initial homepage from any part of the system. |
| **Catalogue** | Allows browsing our collection of registered books. |
| **Lending Book** | Directs to the functionality for borrowing a book from our collection (login required). |
| **For Author** | A dedicated space for independent authors to publish their books in our collection. |
| **Sign In** | Reserved for registering a new user in our digital library. |
| **Login** | Intended for already registered users to access their accounts and view their borrowed books. |
| **My Profile** | (Logged in) Allows users to view their data, manage borrowed books, and edit/delete their account. |
| **Admin** | (Logged in as Admin) Management dashboard to view, edit, and delete users. |

-----

## Installation and Execution Guide (Windows)

To run the Open Shelf project locally, follow the steps to install PHP, Composer, and Git.

### 1\. PHP Installation and Configuration

1.  Access the official PHP download link: **[https://windows.php.net/download](https://windows.php.net/download)** and download the **`.ZIP`** file for PHP 8+.
2.  After downloading, unzip the folder to a location of your choice (e.g., `C:\php`).
3.  Add the `C:\php` directory to your **"environment variables"** ("Path").
4.  (Optional, but recommended) Install a package like XAMPP, which includes PHP and MySQL pre-configured.

### 2\. Git Bash Installation

1.  Access the official Git website at **[https://git-scm.com](https://git-scm.com)**.
2.  Download and install Git for Windows.

### 3\. Composer Installation

1.  Access the official website: **[https://getcomposer.org/download/](https://getcomposer.org/download/)**.
2.  Download and run `Composer-Setup.exe`. It will automatically find your PHP installation (from Step 1).

### 4\. Cloning and Running the Repository

1.  Choose a directory (e.g., `C:\xampp\htdocs\`) and select **"Open Git Bash Here"**.
2.  Clone the repository:
    ```bash
    git clone [https://github.com/amand4morais/OpenShelf](https://github.com/amand4morais/OpenShelf)
    ```
3.  Navigate to the project directory:
    ```bash
    cd OpenShelf
    ```
4.  **Install Dependencies (Autoload):**
    This command reads `composer.json` and generates the `vendor/` folder with `autoload.php`.
    ```bash
    composer install
    ```
5.  **Database Configuration:**
    * Start your MySQL server (e.g., via XAMPP Control Panel).
    * Using phpMyAdmin (or another client), create a database named `openshelf`.
    * Import `scriptDataBase.sql` into the `openshelf` database.
    * Open `db.openshelf.php` and edit `$host`, `$dbname`, `$username`, and `$password` with your credentials.

6.  **Execute the Server:**
    * In your terminal, from the project root, run the PHP built-in server:
    ```bash
    php -S localhost:8080
    ```
    This will start the server.
7.  Open a browser and navigate to the following URL:
    ```
    http://localhost:8080
    ```

The system is expected to be working normally.

-----

##  Status and Future Improvements

This project was developed for partial credit in the Web Server course. With the refactoring, the following points were addressed:

* **Inclusion of *feedback* messages** (success/error) on all pages.
* The **"New Arrivals"** functionality on the `main-page` was **completed** and is functional, fetching data from the database.
* **Critical Bugs Fixed:** The logic that stored user and lending data in `$_SESSION` was removed and replaced with correct database interactions.
* **Future Improvement:** More specific error handling (e.g., CPF format validation, password strength).

-----

##  Developers

| Participante | Responsabilidade |
| :--- | :--- |
| **Amanda Morais Ribeiro** | Responsible for *front-end*, HTML support, and *backend* support. |
| **José Ernesto Marra Filho** | Responsible for CRUDs, *bug* fixing, and *backend* support. |
| **Lucas Monteiro Ribas** | Responsible for defining routers, *bug* fixing, and *backend* support. |