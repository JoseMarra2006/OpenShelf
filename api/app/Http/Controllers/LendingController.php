<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Traits\ApiResponse;

class LendingController extends Controller
{
    use ApiResponse;
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lendings = Lending::with(['user', 'book'])->get();

        return $this->successResponse('Lista de empréstimos recuperada com sucesso.', $lendings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => ['required', 'exists:books,id'],
            'due_date' => ['required', 'date', 'after:today'],
        ]);

        $book = Book::find($request->book_id);

        if ($book->quantity <= 0) {
            return $this->errorResponse('Livro indisponível para empréstimo.', null, 400);
        }

        try {
            DB::beginTransaction();

            $lending = Lending::create([
                'user_id' => $request->user()->id,
                'book_id' => $request->book_id,
                'due_date' => $request->due_date,
            ]);

            $book->decrement('quantity');

            DB::commit();

            return $this->successResponse('Empréstimo registrado com sucesso.', $lending->load(['user', 'book']), 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Erro ao registrar empréstimo.', $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lending $lending)
    {
        return $this->successResponse('Detalhes do empréstimo recuperados com sucesso.', $lending->load(['user', 'book']));
    }

    /**
     * Update the specified resource in storage (e.g., return the book).
     */
    public function update(Request $request, Lending $lending)
    {
        $request->validate([
            'returned_at' => ['nullable', 'date'],
        ]);

        if ($lending->returned_at) {
            return $this->errorResponse('Este livro já foi devolvido.', null, 400);
        }

        try {
            DB::beginTransaction();

            $lending->update([
                'returned_at' => $request->returned_at ?? now(),
            ]);

            $lending->book->increment('quantity');

            DB::commit();

            return $this->successResponse('Livro devolvido com sucesso.', $lending->load(['user', 'book']));

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Erro ao registrar devolução.', $e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lending $lending)
    {
        if (!$lending->returned_at) {
            return $this->errorResponse('Não é possível deletar um empréstimo ativo. Registre a devolução primeiro.', null, 400);
        }

        $lending->delete();

        return $this->successResponse('Empréstimo deletado com sucesso.');
    }
}
