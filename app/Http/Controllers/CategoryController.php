<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')]
        ]);

        $category = Category::create($attributes);
        if ($category) {
            return response()->json([
                'message' => 'La categoría se añadió correctamente.',
                'data' => [
                    'id' => $category->id
                ]
            ], 201);
        }

        return response()->json([
            'message' => "No se puedo añadir la categoría."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
