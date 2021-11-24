<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Books;

class StaffController extends Controller
{
    public function viewLandingPage()
    {
        return view('staff.main');
    }

    public function viewUploadBook() {
        return view('staff.uploadbook');
    }

    public function submitUploadBook(Request $request) {
        $acadres = new AcademicResources();

        $acadres->title = $request->title;
        $acadres->description = "Placeholder";
        $acadres->genre = "Placeholder";
        $acadres->publication_place = $request->input("publish-place");
        $acadres->publication_date = $request->input("publish-date");
        $acadres->type = 1;
        $acadres->file_path = $request->file("book-file")->store("books");

        $acadres->save();

        $book = new Books();
        $book->publisher = $request->publisher;
        $book->edition = 5;
        $book->isbn = $request->isbn;

        $acadres->details()->save($book);
    }
}
