##  Open Shelf: Sua Biblioteca Digital.

O **Open Shelf** é um projeto de biblioteca digital desenvolvido para a disciplina de Web-Servidor, com o objetivo de demonstrar a implementação de funcionalidades básicas de *backend* utilizando PHP e o servidor embutido do PHP. O sistema utiliza sessões para simular o armazenamento de dados de usuários e do acervo de livros.

Este projeto caracteriza-se por funcionalidades simples, sendo um trabalho acadêmico com foco na demonstração de comandos básicos de *backend* e roteamento.

-----

## Funcionalidades Principais do Sistema

O sistema apresenta uma tela inicial que dá acesso às seguintes funcionalidades:

| Opção | Descrição |
| :--- | :--- |
| **Home** | Direciona o usuário para a página inicial. |
| **Catalogue** | Permite a consulta ao acervo de livros já cadastrados. |
| **Lending Book** | Direciona para a funcionalidade de emprestar um livro do acervo. |
| **For Author** | Espaço para autores independentes publicarem seus livros no acervo. |
| **Sign In** | Página para o cadastro de novos usuários na biblioteca digital. |
| **Login** | Destinado a usuários já cadastrados entrarem em suas devidas contas e consultarem seus livros emprestados. |

-----

##  Instalação e Execução (Windows)

Para rodar o projeto Open Shelf localmente, siga os passos para instalar o PHP e o Git Bash.

### 1\. Instalação e Configuração do PHP

1.  Acesse o link oficial do PHP: **[https://windows.php.net/download](https://windows.php.net/download)** e baixe o primeiro arquivo **`.ZIP`** disponível.
2.  Após o download, descompacte a pasta ZIP em um local de sua preferência (ex: `C:\php`).
3.  Copie o **diretório completo** da pasta descompactada do PHP.
4.  No Windows, procure por **"variáveis de ambiente"** e abra o programa.
5.  Clique novamente em **"Variáveis de Ambiente"**, selecione a variável de usuário **"Path"**.
6.  Clique em **"Editar"**, depois em **"Novo"** e cole o diretório copiado.
7.  Clique **"Ok"** e **"Ok"** novamente para salvar as alterações.

### 2\. Instalação do Git Bash

1.  Acesse o site oficial do Git em **[https://git-scm.com](https://git-scm.com)**.
2.  Na página inicial, clique em **"Download"** e baixe o instalador correspondente para Windows (`.exe`).
3.  Execute o instalador. Durante a instalação, **recomenda-se** selecionar a opção **“Git from the command line and also from 3rd-party software”** para adicionar o Git ao PATH do sistema.
4.  Continue avançando com **"Next"** e clique em **"Install"**. Finalize clicando em **"Finish"**.

### 3\. Clonando e Executando o Repositório

1.  Escolha um diretório de sua preferência no Explorador de Arquivos.
2.  Clique com o botão direito do mouse/touchpad e selecione a opção **"Open Git Bash Here"**.
3.  Com o Git Bash aberto, clone o repositório oficial do projeto:
    ```bash
    git clone https://github.com/amand4morais/OpenShelf
    ```
4.  Abra o **Prompt de Comando do Windows (CMD)**.
5.  Navegue até o diretório do projeto:
    ```bash
    cd <diretório escolhido para baixar o repositório do GitHub>/OpenShelf
    ```
6.  Execute o servidor embutido do PHP:
    ```bash
    php -S localhost:8080
    ```
    Isso iniciará o servidor.
7.  Abra um navegador (o Brave é recomendado) e cole a seguinte URL:
    ```
    http://localhost:8080
    ```

O sistema deve estar funcionando normalmente.

-----

##  Status e Melhorias Futuras

Este projeto foi desenvolvido com a intenção de ganho de nota parcial para a matéria de Web-Servidor e possui as seguintes funcionalidades a serem implementadas ou corrigidas:

  * Tratamento de erros mais específicos.
  * Inclusão de mensagens de *feedback* (sucesso/erro) em algumas páginas.
  * A funcionalidade de "New Arrivals" na `main-page` não foi completada.

-----

##  Desenvolvedores

| Participante | Responsabilidade |
| :--- | :--- |
| **Amanda Morais Ribeiro** | Responsável pelo *front-end*, suporte em HTML e suporte em *backend*. |
| **José Ernesto Marra Filho** | Responsável pelos CRUDs, correção de *bugs* e suporte em *backend*. |
| **Lucas Monteiro Ribas** | Responsável pela definição de roteadores, correção de *bugs* e suporte em *backend*. |

-----

## Open Shelf: Your Digital Library

The **Open Shelf** is a simple digital library project developed for a Web Server university course. Its main goal is to demonstrate the implementation of basic backend functionalities using PHP and the PHP built-in web server. The system uses sessions to simulate the storage of user data and the book catalog.

This project features simple functionalities, serving as an academic work focused on demonstrating basic backend commands and routing.

-----

## Core System Features

The system presents an initial screen that provides access to the following functionalities:

| Option | Description |
| :--- | :--- |
| **Home** | Directs the user back to the initial homepage from any part of the system. |
| **Catalogue** | Allows browsing our collection of registered books. |
| **Lending Book** | Directs to the functionality for borrowing a book from our collection. |
| **For Author** | A dedicated space for independent authors to publish their books in our collection. |
| **Sign In** | Reserved for registering a new user in our digital library. |
| **Login** | Intended for already registered users to access their accounts and view their borrowed books. |

-----

## Installation and Execution Guide (Windows)

To run the Open Shelf project locally, follow the steps to install PHP and Git Bash.

### 1\. PHP Installation and Configuration

1.  Access the official PHP download link: **[https://windows.php.net/download](https://windows.php.net/download)** and download the first **`.ZIP`** file available.
2.  After downloading, unzip the folder to a location of your choice (e.g., `C:\php`).
3.  Copy the **full directory path** of the unzipped PHP folder.
4.  On Windows, search for **"environment variables"** and open the program.
5.  Click **"Environment Variables"** again, and select the user variable **"Path"**.
6.  Click **"Edit"**, then **"New"**, and paste the copied directory.
7.  Click **"Ok"** and **"Ok"** again to save the changes.

### 2\. Git Bash Installation

1.  Access the official Git website at **[https://git-scm.com](https://git-scm.com)**.
2.  On the homepage, click **"Download"** and download the corresponding installer for Windows (`.exe`).
3.  Execute the installer. During installation, it is **recommended** to select the option **“Git from the command line and also from 3rd-party software”** to add Git to the system's PATH.
4.  Continue clicking **"Next"** and click **"Install"**. Finish by clicking **"Finish"**.

### 3\. Cloning and Running the Repository

1.  Choose a directory of your preference in File Explorer.
2.  Right-click or use your touchpad and select the option **"Open Git Bash Here"**.
3.  With Git Bash open, clone the official project repository:
    ```bash
    git clone https://github.com/amand4morais/OpenShelf
    ```
4.  Open the **Windows Command Prompt (CMD)**.
5.  Navigate to the project directory:
    ```bash
    cd <directory chosen for GitHub repository download>/OpenShelf
    ```
6.  Execute the PHP built-in server:
    ```bash
    php -S localhost:8080
    ```
    This will start the server.
7.  Open a browser (Brave is recommended) and navigate to the following URL:
    ```
    http://localhost:8080
    ```

The system is expected to be working normally.

-----

##  Status and Future Improvements

This project was developed for partial credit in the Web Server course and has the following features that need implementation or correction:

  * Specific error handling.
  * Inclusion of *feedback* messages (success/error) on some pages.
  * The "New Arrivals" functionality on the `main-page` was not completed.

-----

##  Developers

| Participant | Responsibility |
| :--- | :--- |
| **Amanda Morais Ribeiro** | Responsible for *front-end*, HTML support, and *backend* support. |
| **José Ernesto Marra Filho** | Responsible for CRUDs, *bug* fixing, and *backend* support. |
| **Lucas Monteiro Ribas** | Responsible for defining routers, *bug* fixing, and *backend* support. |
