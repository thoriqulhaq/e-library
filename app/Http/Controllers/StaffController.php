<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Books;
use App\Models\Author;
use DB;

class StaffController extends Controller
{
    public function viewLandingPage()
    {
        return view('staff.dashboardPage', [
            'page' => 1
        ]);
    }

    public function viewAccountManager()
    {
        $datas = DB::table('users')->get();

        return view('staff.accountManager', [
            'datas' => $datas,
            'page' => 2
        ]);
    }

    public function viewContentManager()
    {
        $datas = DB::table('academic_resources')->get();

        return view('staff.contentManager', [
            'datas' => $datas,
            'page' => 3
        ]);
    }

    public function viewUploadBook()
    {
        return view('staff.uploadbook');
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

    public function submitUploadBook(Request $request)
    {
        $acadres = new AcademicResources();
        $book = new Books();

        $this->saveBookInfo($request, $acadres, $book);

        $authorsname = $request->author;
        if (!is_array($authorsname)) {
            $authorsname = [$authorsname];
        }

        foreach ($authorsname as $name) {
            if ($name != null) {
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

        return redirect("/");
    }

    public function editBook(Request $request, $id)
    {
        $book = AcademicResources::where("id", $id)->first();

        return view("staff.editbook", [
            "book" => $book, "authors" => $book->authors, "bookDetails" => $book->details, "id" => $id
        ]);
    }

    public function editBookP(Request $request, $id)
    {
        $acadres = AcademicResources::where("id", $id)->first();

        $this->saveBookInfo($request, $acadres, $acadres->details);
    }
}
