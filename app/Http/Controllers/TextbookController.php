<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Textbook;
use App\Traits\BookTrait;
use Illuminate\Http\Request;

class TextbookController extends Controller
{
    use BookTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:books',
            'book_type' => 'required|in:magazine,textbook,paper',
            'image' => 'image|file|max:32768',
            'publisher' => 'required|max:40',
            'year_published' => 'required|numeric|min:1900|max:2022',
            'description' => 'required',

            'isbn' => 'required|unique:textbooks|max:13',
            'author' => 'required|max:40',
            'edition' => 'required|numeric',
            'category' => 'required|max:30',
        ]);
        $filePath = BookTrait::storeFile($request, class_basename(Textbook::class));
        $imagePath = BookTrait::storeImage($request, class_basename(Textbook::class));

        $book = BookTrait::createBook($validated, $imagePath, $filePath);

        $textbook = Textbook::create([
            'book_id' => $book->id,
            'isbn' => $validated['isbn'],
            'edition' => $validated['edition']
        ]);

        return redirect('/dashboard/books')->with('success', 'Textbook has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:255',
            'book_type' => 'required|in:magazine,textbook,paper',
            'image' => 'image|file|max:32768',
            'publisher' => 'required|max:40',
            'year_published' => 'required|numeric|min:1900|max:2022',
            'description' => 'required',

            'author' => 'required|max:40',
            'edition' => 'required|numeric',
            'category' => 'required|max:30',
        ]);

        if ($request->oldSlug === $request['slug'])
        {
            $validated += $request->validate([
                'slug' => 'required',
            ]);
        }
        else
        {
            $validated += $request->validate([
                'slug' => 'required|unique:books',
            ]);
        }
        
        $filePath = BookTrait::updateFile($request, $book, class_basename(Textbook::class));
        $imagePath = BookTrait::updateImage($request, $book, class_basename(Textbook::class));
        
        // dd($request);
        if ($request->oldIsbn === $request['isbn'])
        {
            $validated += $request->validate([
                'isbn' => 'required|max:13'
            ]);
        }
        else
        {
            $validated += $request->validate([
                'isbn' => 'required|unique:textbooks|max:13'
            ]);
        }
        
        // dd($imagePath);
        $attrib = [
            'isbn' => $validated['isbn'],
            'edition' => $validated['edition']
        ];
        
        BookTrait::updateBook($book->id, $validated, $imagePath ?? $request->oldImage, $filePath ?? $request->oldFile);
        Textbook::where('book_id', $book->id)->update($attrib);

        return redirect('/dashboard/books')->with('success', 'Textbook has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
