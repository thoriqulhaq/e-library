<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Books;
use App\Models\Author;
use DB;

use App\Models\User;

class StaffController extends Controller
{
    public function viewLandingPage()
    {
        return view('staff.dashboardPage', [
            'page' => 1
        ]);
    }

    public function viewAccountManager(Request $request)
    {
        $usr = User::all();

        $sc = [];

        $pattern = $request->name;
        $pattern = "/" . $pattern . "/i";
        foreach ($usr as $u) {
            $str = $request->is_email == "on" ? $u->email : $u->name;
            if (preg_match($pattern, $str)) {
                array_push($sc, $u);
            }
        }

        return view('staff.accountManager', [
            'datas' => $sc,
            'page' => 2
        ]);
    }

    public function viewContentManager(Request $request)
    {
        $ac = AcademicResources::all();

        $sc = [];

        $pattern = $request->title;
        $pattern = "/" . $pattern . "/i";
        $apattern = $request->author;
        $apattern = "/" . $apattern . "/i";
        foreach ($ac as $acadres) {
            if (preg_match($pattern, $acadres->title)) {
                foreach ($acadres->authors as $author) {
                    if (preg_match($apattern, $author)) {
                        array_push($sc, $acadres);
                        break;
                    }
                }
            }
        }

        return view('staff.contentManager', [
            'datas' => $sc,
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

    public function deleteContent($id)
    {
        $data = DB::table('academic_resources')->where('id', '=', $id)->delete();
        return back();
    }
}
