<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Books;
use App\Models\Author;

/*
Separate controller for each model
Controller for Book Model
*/

class BookController extends Controller
{
    public function submitUploadBook(Request $request)
    {
        $acadres = new AcademicResources();
        $book = new Books();

        $fpath = $request->file("book-file")->store("");
        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), $fpath, "");
        $acadres->type = 1;
        $acadres->save();

        $book->setAttributes($request->publisher, $request->isbn, $request->edition);
        $acadres->details()->save($book);


        // Attach every authors into the book
        $authorsname = $request->author;
        foreach ($authorsname as $name) {
            if ($name != null) {
                $author = Author::where("name", $name)->first();
                if ($author == null) {
                    $author = new Author();
                    $author->name = $name;
                    $author->save();
                }
                $acadres->authors()->attach($name);
            }
        }
    }

    public function saveBookInfo(Request $request, AcademicResources $acadres, Books $book)
    {
        $acadres->title = $request->title;
        $acadres->description = $request->description;
        $acadres->genre = $request->genre;
        $acadres->publication_place = $request->input("publish-place");
        $acadres->publication_date = $request->input("publish-date");
        $acadres->type = 1;
        if ($request->file("book-file") != null) {
            $acadres->file_path = $request->file("book-file")->store("books");
        }

        $acadres->save();

        $book->publisher = $request->publisher;
        $book->edition = 5;
        $book->isbn = $request->isbn;
        $acadres->details()->save($book);
    }

    public function editBook(Request $request, $id)
    {
        $book = AcademicResources::where("id", $id)->first();

        if ($book == null) {
            abort(404);
        }

        return view("staff.editbook", [
            "book" => $book, "authors" => $book->authors, "bookDetails" => $book->details, "id" => $id
        ]);
    }

    public function editBookP(Request $request, $id)
    {
        $acadres = AcademicResources::where("id", $id)->first();

        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), "", "", 0);
        $acadres->save();

        $book = $acadres->details;
        $book->setAttributes($request->publisher, $request->isbn, $request->edition);
        $acadres->details()->save($book);

        // Detach all the authors, simpler than just checking which author disappear
        foreach ($acadres->authors as $author) {
            $acadres->authors()->detach($author->name);
        }


        // Attach every authors in the forms to the book
        $authorsname = $request->author;
        foreach ($authorsname as $name) {
            if ($name != null) {
                $author = Author::where("name", $name)->first();
                if ($author == null) {
                    $author = new Author();
                    $author->name = $name;
                    $author->save();
                }
                $acadres->authors()->attach($name);
            }
        }
    }

    public function viewUploadBook()
    {
        return view('staff.uploadbook');
    }
}
