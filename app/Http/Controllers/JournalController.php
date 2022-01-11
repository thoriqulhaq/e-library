<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;
use App\Models\Journals;
use App\Models\Author;



class JournalController extends Controller
{
    public function submitUploadJournal(Request $request)
    {
        $acadres = new AcademicResources();
        $journal = new Journals();

        $fpath = $request->file("journal-file")->store("journals");
        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), $fpath, "");
        $acadres->type = 1;
        $acadres->save();

        $journal->setAttributes($request->volume, $request->issue);
        $acadres->details()->save($journal);


        // Attach every authors into the journal
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

    public function saveJournalInfo(Request $request, AcademicResources $acadres, Journals $journal)
    {
        $acadres->title = $request->title;
        $acadres->description = $request->description;
        $acadres->genre = $request->genre;
        $acadres->publication_place = $request->input("publish-place");
        $acadres->publication_date = $request->input("publish-date");
        $acadres->type = 1;
        if ($request->file("journal-file") != null) {
            $acadres->file_path = $request->file("journal-file")->store("journals");
        }

        $acadres->save();

        
        $journal->volume = $request->volume;
        $journal->issue = $request->issue;
        $journal->issue = $request->issue;
        $acadres->details()->save($journal);
    }


    public function viewUploadJournal()
    {
        return view('community.uploadjournal');
    }
}
