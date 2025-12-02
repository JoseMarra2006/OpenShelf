# Documentação da API OpenShelf - Empréstimo de Livros

Esta documentação descreve a API RESTful de Empréstimo de Livros construída com **Laravel** e autenticada com **Laravel Sanctum**.

## 1. Requisitos e Configuração

### 1.1. Requisitos

*   PHP 8.1+
*   Composer
*   Banco de Dados (MySQL, PostgreSQL, SQLite, etc.)

### 1.2. Configuração do Projeto

1.  **Clonar o Repositório (Assumindo que o projeto Laravel está em `openshelf-api`):**
    ```bash
    git clone <URL_DO_REPOSITORIO> openshelf-api
    cd openshelf-api
    ```
2.  **Instalar Dependências:**
    ```bash
    composer install
    ```
3.  **Configurar Variáveis de Ambiente:**
    Crie o arquivo `.env` a partir do `.env.example` e configure as credenciais do banco de dados.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    **Exemplo de Configuração do Banco de Dados no `.env`:**
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=openshelf_api
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4.  **Executar Migrations:**
    ```bash
    php artisan migrate
    ```

## 2. Autenticação (Laravel Sanctum)

A API utiliza a autenticação baseada em *Token* do Laravel Sanctum. O *token* deve ser enviado no cabeçalho `Authorization` de todas as requisições protegidas.

### 2.1. Login e Geração de Token

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `POST` | `/api/login` | Autentica o usuário e gera um *token* de acesso. |

**Corpo da Requisição (JSON):**

```json
{
    "email": "seu_email@exemplo.com",
    "password": "sua_senha"
}
```

**Resposta de Sucesso (200 OK):**

```json
{
    "status": "success",
    "message": "Login realizado com sucesso.",
    "data": {
        "user": { /* dados do usuário */ },
        "token": "SEU_TOKEN_DE_ACESSO",
        "token_type": "Bearer"
    }
}
```

### 2.2. Logout

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `POST` | `/api/logout` | Invalida o *token* de acesso atual. |

**Cabeçalho Necessário:** `Authorization: Bearer SEU_TOKEN_DE_ACESSO`

## 3. Endpoints de Empréstimo (`/api/lendings`)

Todos os *endpoints* de empréstimo requerem autenticação via Laravel Sanctum.

### 3.1. Listar Empréstimos

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `GET` | `/api/lendings` | Retorna a lista de todos os empréstimos. |

### 3.2. Criar Novo Empréstimo

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `POST` | `/api/lendings` | Cria um novo registro de empréstimo. |

**Corpo da Requisição (JSON):**

| Campo | Tipo | Obrigatório | Descrição |
| :--- | :--- | :--- | :--- |
| `book_id` | `integer` | Sim | ID do livro a ser emprestado. |
| `due_date` | `date` | Sim | Data de devolução prevista (deve ser futura). |

**Validações:**
*   `book_id` deve existir na tabela `books`.
*   `due_date` deve ser uma data válida e posterior à data atual.
*   A quantidade (`quantity`) do livro deve ser maior que zero.

### 3.3. Visualizar Empréstimo Específico

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `GET` | `/api/lendings/{lending}` | Retorna os detalhes de um empréstimo específico. |

### 3.4. Registrar Devolução (Atualizar)

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `PUT` | `/api/lendings/{lending}` | Registra a devolução do livro (atualiza o campo `returned_at`). |

**Corpo da Requisição (JSON - Opcional):**

```json
{
    "returned_at": "YYYY-MM-DD HH:MM:SS" // Se omitido, usa a data/hora atual.
}
```

**Lógica:**
*   Incrementa a quantidade (`quantity`) do livro.
*   Não permite a atualização se o livro já foi devolvido.

### 3.5. Remover Empréstimo

| Método | URL | Descrição |
| :--- | :--- | :--- |
| `DELETE` | `/api/lendings/{lending}` | Remove um registro de empréstimo. |

**Lógica:**
*   Só permite a remoção se o livro já tiver sido devolvido (`returned_at` preenchido).

## 4. Estrutura de Resposta Padrão

Todas as respostas da API seguem o padrão JSON abaixo, implementado através do `App\Traits\ApiResponse`.

| Campo | Tipo | Descrição |
| :--- | :--- | :--- |
| `status` | `string` | Indica o status da requisição (`success` ou `error`). |
| `message` | `string` | Mensagem descritiva da resposta. |
| `data` | `mixed` | Os dados retornados (pode ser um objeto, array ou `null`). |

**Exemplo de Erro (400 Bad Request):**

```json
{
    "status": "error",
    "message": "Livro indisponível para empréstimo.",
    "data": null
}
```
