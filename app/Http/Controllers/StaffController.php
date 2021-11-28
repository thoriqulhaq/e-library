<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Books;
use App\Models\Author;

class StaffController extends Controller
{
    public function viewLandingPage()
    {
        return view('staff.main');
    }

    public function viewUploadBook() {
        return view('staff.uploadbook');
    }

    public function saveBookInfo(Request $request, AcademicResources $acadres, Books $book) {
        $acadres->title = $request->title;
        $acadres->description = $request->description;
        $acadres->genre = $request->genre;
        $acadres->publication_place = $request->input("publish-place");
        $acadres->publication_date = $request->input("publish-date");
        $acadres->type = 1;
        $acadres->file_path = $request->file("book-file")->store("books");

        $acadres->save();

        $book->publisher = $request->publisher;
        $book->edition = 5;
        $book->isbn = $request->isbn;
        $acadres->details()->save($book);
    }

    public function submitUploadBook(Request $request) {
        $acadres = new AcademicResources();
        $book = new Books();
        
        $this->saveBookInfo($request, $acadres, $book);

        $authorsname = $request->author;
        if (!is_array($authorsname)) {
            $authorsname = [$authorsname];
        }
        foreach ($authorsname as $name) {
            echo $name;
            $author = Author::where("name", $name)->first();
            if ($author == null) {
                $author = new Author();
                $author->name = $name;
                $author->save();
            }
            $acadres->authors()->attach($name);
        }


    }

    public function editBook(Request $request, $id) {
        $book = AcademicResources::where("id", $id)->first();

        return view("staff.editbook", [ "title" => $book->title,
                                        "genre" => $book->genre,
                                        "description" => $book->description,
                                        "publisher" => $book->details->info()[1], "publish_place" => $book->publication_place, "publish_date" => $book->publication_date, "isbn" => $book->details->info()[0]]);
    }

    public function editBookP(Request $request, $id) {
        $acadres = AcademicResources::where("id", $id)->first();

        $details = $acadres->details();
        $this->saveBookInfo($request, $acadres, $details);
    }
}
