<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Criar Usuário de Teste
        User::create([
            'name' => 'Teste API',
            'email' => 'teste@api.com',
            'password' => Hash::make('password'), // Senha: password
        ]);

        // 2. Criar Livro de Teste
        Book::create([
            'title' => 'O Guia do Mochileiro das Galáxias',
            'author' => 'Douglas Adams',
            'isbn' => '978-8575031592',
            'quantity' => 5,
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'isbn' => '978-8535914849',
            'quantity' => 0, // Livro indisponível para teste de erro
        ]);
    }
}
