<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class OwnedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::where('isOwned', true)->with('book', 'book.author')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $bookUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $bookUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $bookUser)
    {
        //
    }
}
