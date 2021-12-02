<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommunityController extends Controller
{
    public function viewLandingPage()
    {
        $academicResource = DB::table('academic_resources')->get();
        $academicResource = DB::table('academic_resources')->orderBy('download_count')->get();

        return view('community.landingPage', [
            'academicResource' => ($academicResource),
            'academicResourceSortByDownload' => ($academicResource),
        ]);
    }

    public function viewDetail(Request $request, $id)
    {
        $userid = 1;
        $academicResourceID = $id;

        $academicResource = DB::table('academic_resources')->where('id', $academicResourceID)->get();
        $academicResourceAuthor = DB::table('academic_resources_author')->where('academic_resources_id', $academicResourceID)->get();
        $bookmarkStatus = DB::table('academic_resources_public_users')->where('academic_resources_id', $academicResourceID)->where('users_id', $userid)->get();

        $string = current(current($academicResource))->genre;
        $academicResourceGenre = explode(',', $string);

        return view('community.details', [
            'academicResource' => current(current($academicResource)),
            'academicResourceAuthor' => $academicResourceAuthor,
            'academicResourceGenre' => $academicResourceGenre,
            'bookmarkStatus' => count(current($bookmarkStatus)),
        ]);
    }

    public function viewLoginPage()
    {
        return view('community.login');
    }
}
