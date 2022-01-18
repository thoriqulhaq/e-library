<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\AcademicResources;
use App\Models\Journals;
use App\Models\Author;



class JournalController extends Controller
{
    public function submitUploadJournal(Request $request)
    {
        // Validate the input, make sure the user don't temper with the front-end validation
            $validator = Validator::make($request->all(), [
            "title" => ["required", "max:255"],
            "publish-place" => ["required", "max:255"],
            "publish-date" => ["required", "date"],
            "genre" => ["nullable", "max:255"],
            "volume" => ["numeric", "nullable"],
            "journal-file" => ["required", "file"],
            "journal-cover" => ["nullable", "file"],
            "description" => ["nullable", "max:500"],
            "issue" =>["numeric", "nullable"],
        ]);

        if ($validator->fails()) {
            return response("Request validation failed, this should not happen since this error is not coming from our server.
            Please refresh the page and try again", 400);
        }  


        $validated = $validator->validated();

    
        

        $acadres = new AcademicResources();
        $journal = new Journals();

        $fpath = $request->file("journal-file")->store("journals");
        if ($validated["journal-cover"] != null) {
            $cpath = $validated["journal-cover"]->store("Cover");
        } 
        else {
            $cpath = null;
        }


        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"), $fpath, $cpath);
        $acadres->description = $request->description;
        $acadres->type = 0;
        $acadres->download_count = 0;
        $acadres->save();

        $journal->setAttributes($request->volume, $request->issue);
        $acadres->details()->save($journal);


        
        return response("Success", 201)
            ->header("Location", url("book/" . $acadres->id));
    }

    

    public function editJournal(Request $request, $id)
    {
        $journal = AcademicResources::where("id", $id)->first();

        if (($journal == null) || ($journal -> type !=0)){
            abort(404);
        }

        return view("community.editjournal", [
            "journal" => $journal, "authors" => $journal->authors, "journalDetails" => $journal->details, "id" => $id
        ]);

        
    }

    public function editJournalP(Request $request, $id)
    {
        $acadres = AcademicResources::where("id", $id)->first();

        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:255"],
            "publish-place" => ["required", "max:255"],
            "publish-date" => ["required", "date"],
            "genre" => ["nullable", "max:255"],
            "volume" => ["numeric", "nullable"],
            "description" => ["nullable", "max:500"],
            "issue" =>["numeric", "nullable"],
        ]);

        if ($validator->fails() || ($acadres->type != 0)) {
            $msg = "";
            foreach ($validator->errors()->all() as $error) {
                $msg .= $error . "\n";
            }
            return response("Request validation failed, this should not happen since this error is not coming from our server.
            Please refresh the page and try again\n" . $msg, 400);
        }

        $validated = $validator->validated();

        $acadres->setAttributes($request->title, $request->genre, $request->input("publish-place"), $request->input("publish-date"),  null, null );
        $acadres->description = $request->description;

        $acadres->save();

        $journal = $acadres->details;
        $journal->setAttributes ($request->volume, $request->issue);
        $acadres->details()->save($journal);
       

        return response("Journal information has been updated successfully");
    }



    public function viewUploadJournal(Request $request)
    {
        

        return view('community.uploadjournal');
    }
}
