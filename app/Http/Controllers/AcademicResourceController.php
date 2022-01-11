<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicResources;

class AcademicResourceController extends Controller
{
    public function search(Request $request) {
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

        return view("search", ["results" => $sc]);
    }

}
