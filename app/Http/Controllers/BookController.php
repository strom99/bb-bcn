<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books');

        $books->leftJoin('book_category', 'books.id', '=', 'book_category.book_id');
        if (request()->has('categoria')) {
            $books->where('category_id', request('categoria'));
        }

        if (request()->has('search')) {
            $books->where('title', 'like', '%' . request('search') . '%');
        }

        $libros = $books->paginate(2);
        $categorias = DB::table('categories')->get();
        return view('home')->with([
            'libros' => $libros,
            'categories' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $message = "Libro creado";
        try {
            $libro = DB::table('books')->insert([
                'ISBN' => $request->get('isbn'),
                'title' => $request->get('title'),
                'img' => 'https://picsum.photos/500/500?random=85053',
                'author' => $request->get('author'),
                'published_date' => now(),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }
        return redirect()->back()->with([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $book)
    {
        $book_o = DB::table('books')->find($book);
        return view('show')->with([
            'libro' => $book_o
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = DB::table('books')->find($id);

        return view('edit')->with([
            'libro' => $libro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, StoreBookRequest $request)
    {
        try {
            $update = DB::table('books')
                ->where('id', $id)
                ->update([
                    'ISBN' => $request->get('isbn'),
                    'title' => $request->get('title'),
                    'author' => $request->get('author'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'updated_at' => now()
                ]);
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }

        return redirect()->back()->with([
            'message' => 'modificado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = DB::table('books')
            ->where('id', $id)
            ->delete();
        return redirect()->back()->with([
            'message' => "eliminado"
        ]);
    }
}
