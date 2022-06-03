<?php

namespace App\Traits;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @param Request $request
 * 
 */
trait BookTrait
{
    public static function createBook($request, $imagePath = null, $filePath = null)
    {
        return Book::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'book_type' => $request['book_type'],
            'image' => $imagePath,
            'author' => $request['author'],
            'category' => $request['category'],
            'publisher' => $request['publisher'],
            'year_published' => $request['year_published'],
            'description' => $request['description'],
            'link' => $filePath
        ]);
    }

    public static function updateBook($id, $validated, $imagePath, $filePath)
    {
        // dd($id);
        $attrib = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'image' => $imagePath,
            'author' => $validated['author'] ?? '',
            'category' => $validated['category'] ?? '',
            'publisher' => $validated['publisher'],
            'year_published' => $validated['year_published'],
            'description' => $validated['description'],
            'link' => $filePath
        ];
        
        Book::where('id', $id)->update($attrib);
    }

    public static function storeFile(Request $request, $type)
    {
        $file = $request->file('file');
        if ($file) {
            // $path = $file->storeAs(Str::lower($type) . '/' . $request->slug, $request->slug . '.' . $file->extension());
            $path = $file->store($type, 'public_uploads');
            return $path;
        }

        return null;
    }

    public static function updateFile(Request $request, Book $book, $type)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($request->oldFile) {
                // Storage::delete($request->oldFile);
                Storage::disk('public_uploads')->delete($request->oldFile);
            }

            $path = $file->store($type, 'public_uploads');
            return $path;
        }

        return null;
    }

    public static function storeImage(Request $request, $type)
    {
        $image = $request->file('image');

        if ($image) {
            // $path = $image->storeAs(Str::lower($type) . '/' . $request->slug, $request->slug . '.' . $image->extension());
            $path = $image->store($type, 'public_uploads');
            return $path;
        }
        return null;
    }

    public static function updateImage(Request $request, Book $book, $type)
    {
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($request->oldImage) {
                Storage::disk('public_uploads')->delete($request->oldImage);
            }

            $path = $image->store($type, 'public_uploads');
            return $path;
        }
        return null;
    }
}
