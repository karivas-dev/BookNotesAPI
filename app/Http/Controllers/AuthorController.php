<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('authors')],
            'country' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $author = Author::create($attributes);
        if ($author) {
            return response()->json([
                'message' => 'El autor se añadió correctamente.',
                'data' => [
                    'id' => $author->id
                ]
            ], 201);
        }

        return response()->json([
            'message' => "No se puedo añadir el autor."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
