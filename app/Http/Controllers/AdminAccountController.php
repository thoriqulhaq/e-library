<?php

namespace App\Http\Controllers;

use App\Models\AcademicResources;
use App\Models\PublicUser;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Auth;
use DB;


class AdminAccountController extends Controller
{
    public function viewAdminAccount(Request $request)
    {
        return view('staff.adminAccount');
    }
}
