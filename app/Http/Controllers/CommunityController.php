<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommunityController extends Controller
{
    public function viewLandingPage()
    {
        return view('community.landingPage');
    }

    public function viewDetail(Request $request, $id)
    {
        $userid = 1;
        $academicResourceID = $id;

        $academicResource = DB::table('academic_resources')->where('id', $academicResourceID)->get();
        $bookmarkStatus = DB::table('academic_resources_public_users')->where('academic_resources_id', $academicResourceID)->where('users_id', $userid)->get();

        return view('community.details', [
            'academicResource' => current(current($academicResource)),
            'bookmarkStatus' => count(current($bookmarkStatus)),
        ]);
    }

    public function viewLoginPage()
    {
        return view('community.login');
    }
}
