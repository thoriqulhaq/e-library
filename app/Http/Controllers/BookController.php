<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AcademicResources;
use App\Models\Books;
use App\Models\Author;
use App\Rules\Isbn;

/*
Separate controller for each model
Controller for Book Model
*/
 
class BookController extends Controller
{
    public function submitUploadBook(Request $request)
    {
        // Validate the input, make sure the user don't temper with the front-end validation
        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:255"],
            "publisher" => ["required", "max:255"],
            "publish-place" => ["required", "max:255"],
            "publish-date" => ["required", "date"],
            "genre" => ["nullable", "max:255"],
            "edition" => ["numeric", "nullable"],
            "book-file" => ["required", "file"],
            "book-cover" => ["nullable", "file"],
            "description" => ["nullable", "max:500"],
            "author" => ["required", "array", "max:5"],
            "isbn" => ["required", "numeric", new Isbn]
        ]);

        if ($validator->fails()) {
            return response("Request validation failed, this should not happen since this error is not coming from our server.
            Please refresh the page and try again", 400);
        }


        $validated = $validator->validated();

        // Check if ISBN if already used, if it is, return a 200 OK response, but resource is not created
        if (($b = Books::where("isbn", $validated["isbn"])->first()) != null) {
            $ar = AcademicResources::where("id", $b->academic_resources_id)->first();
            return response("This ISBN number has already registered to another book\n
            <a href='" . url("book/" . $ar->id) . "'>" . $ar->title . "</a>");
        }

        $acadres = new AcademicResources();
        $book = new Books();

        $fpath = $validated["book-file"]->store("books");
        if ($validated["book-cover"] != null) {
            $cpath = $validated["book-cover"]->store("Cover");
        } 
        else {
            $cpath = null;
        }

        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), $fpath, $cpath);
        $acadres->description = $request->description;
        $acadres->type = 1;
        $acadres->download_count = 0;
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

        return response("Success", 201)
            ->header("Location", url("book/" . $acadres->id));
    }

    public function editBook(Request $request, $id)
    {
        $book = AcademicResources::where("id", $id)->first();

        if (($book == null) || ($book->type != 1)) {
            abort(404);
        }

        return view("staff.editbook", [
            "book" => $book, "authors" => $book->authors, "bookDetails" => $book->details, "id" => $id, 'page' => 3
        ]);
    }

    public function editBookP(Request $request, $id)
    {
        $acadres = AcademicResources::where("id", $id)->first();

        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:255"],
            "publisher" => ["required", "max:255"],
            "publish-place" => ["required", "max:255"],
            "publish-date" => ["required", "date"],
            "genre" => ["nullable", "max:255"],
            "edition" => ["numeric", "nullable"],
            "description" => ["nullable", "max:500"],
            "author" => ["required", "array", "max:5"],
            "isbn" => ["required", "numeric", new Isbn]
        ]);
        if ($validator->fails() || ($acadres->type != 1)) {
            $msg = "";
            foreach ($validator->errors()->all() as $error) {
                $msg .= $error . "\n";
            }
            return response("Request validation failed, this should not happen since this error is not coming from our server.
            Please refresh the page and try again\n" . $msg, 400);
        }

        $validated = $validator->validated();

        // Check if ISBN if already used, if it is, return a 200 OK response, but resource is not created
        if (($b = Books::where("isbn", $validated["isbn"])->first()) != null) {
            if ($acadres->id != $b->academic_resources_id) {
                $ar = AcademicResources::where("id", $b->academic_resources_id)->first();
                return response("This ISBN number has already registered to another book\n
                <a href='" . url("book/" . $ar->id) . "'>" . $ar->title . "</a>");
            }
        }

        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), null, null);
        $acadres->description = $request->description;

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

        return response("Book information has been updated successfully");
    }

    public function viewUploadBook(Request $request)
    {
        if ($request->user()->cannot("create", Books::class)) {
            abort(403);
        }

        return view('staff.uploadbook', ['page' => 3]);
    }
}
