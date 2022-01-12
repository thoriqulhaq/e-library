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
}
