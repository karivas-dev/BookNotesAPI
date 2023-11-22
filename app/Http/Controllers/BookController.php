<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Book::with('author')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'author_id' => ['required'],
            'category_id' => ['required']
        ]);

        $attributes['isOwned'] = true;

        $book = Book::create($attributes);
        if ($book) {
            return response()->json([
                'message' => 'El libro se añadió correctamente.',
                'data' => [
                    'id' => $book->id
                ]
            ], 201);
        }

        return response()->json([
            'message' => "No se puedo añadir el libro."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->fill($request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'author_id' => ['nullable'],
            'category_id' => ['nullable']
        ]));

        if ($book->isClean()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $book->save();
        return response()->json([
            'message' => "El libro se actualizó correctamente."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'El libro se eliminó correctamente.'
        ]);
    }
}
