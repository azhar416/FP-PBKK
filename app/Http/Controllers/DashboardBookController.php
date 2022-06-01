<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Magazine;
use App\Models\Paper;
use App\Models\Textbook;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.books.indexbook', [
            'books' => Book::latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('dashboard.books.create', [
            'type' => $request->type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        return view('dashboard.books.edit', [
            'type' => $book->book_type,
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        Storage::disk('public_uploads')->delete($book->image);
        Storage::disk('public_uploads')->delete($book->link);
        
        if ($book->book_type === 'textbook')
        {
            $spesific = Textbook::findOrFail($book->id);
            Textbook::destroy($spesific->id);
        } 
        elseif ($book->book_type === 'paper')
        {
            $spesific = Paper::findOrFail($book->id);
            Paper::destroy($spesific->id);
        }
        elseif ($book->book_type === 'magazine')
        {
            $spesific = Magazine::findOrFail($book->id);
            Magazine::destroy($spesific->id);
        }

        Book::destroy($book->id);

        return redirect('/dashboard/books')->with('success', 'Book has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
