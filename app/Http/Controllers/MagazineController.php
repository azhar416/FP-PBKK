<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Magazine;
use App\Traits\BookTrait;
use Illuminate\Http\Request;

class MagazineController extends Controller
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

            'issn' => 'required|unique:magazines',
        ]);
        $filePath = BookTrait::storeFile($request, class_basename(Magazine::class));
        $imagePath = BookTrait::storeImage($request, class_basename(Magazine::class));

        $validated += [
            'author' => null,
            'category' => null,
        ];

        $book = BookTrait::createBook($validated, $imagePath, $filePath);


        $magazine = Magazine::create([
            'book_id' => $book->id,
            'issn' => $validated['issn'],
        ]);

        return redirect('/dashboard/books')->with('success', 'Magazine has been added');

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
        $validated = $request->validated([
            'ame' => 'required|max:255',
            'book_type' => 'required|in:magazine,textbook,paper',
            'image' => 'image|file|max:32768',
            'publisher' => 'required|max:40',
            'year_published' => 'required|numeric|min:1900|max:2022',
            'description' => 'required',
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

        $filePath = BookTrait::updateFile($request, $book, class_basename(Magazine::class));
        $imagePath = BookTrait::updateImage($request, $book, class_basename(Magazine::class));

        if ($request->oldIssn === $request['issn'])
        {
            $validated += $request->validate([
                'issn' => 'required',
            ]);
        }
        else
        {
            $validated += $request->validate([
                'issn' => 'required|unique:magazines',
            ]);
        }
        
        $attrib = [
            'issn' => $validated['issn'],
        ];

        BookTrait::updateBook($book->id, $validated, $imagePath ?? $request->oldImage, $filePath ?? $request->oldFile);
        Magazine::where('book_id', $book->id)->update($attrib);

        return redirect('/dashboard/books')->with('success', 'Magazine has been updated');
    
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
