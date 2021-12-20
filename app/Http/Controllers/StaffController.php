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
}
