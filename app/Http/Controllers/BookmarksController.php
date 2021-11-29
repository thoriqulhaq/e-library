<?php

namespace App\Http\Controllers;

use App\Models\AcademicResources;
use App\Models\PublicUser;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Auth;
use DB;


class BookmarksController extends Controller
{
    public function viewBookmarkPage(Request $request)
    {
        $bookmarkDetails = array();
        // $academicResourceID = $id;

        $bookmarks = DB::table('academic_resources_public_users')->where('users_id', '=', '1')->get();


        foreach (($bookmarks) as $bookmarksID) {
            $academicResource = DB::table('academic_resources')->where('id', $bookmarksID->academic_resources_id)->get();
            foreach ($academicResource as $data) {
                array_push($bookmarkDetails, $data);
            }
        }


        return view('community.bookmarkList')->with(array(
            'academicResource' => $bookmarkDetails
        ));
    }

    public function deleteBookmark($id)
    {

        $bookmarks = DB::table('academic_resources_public_users')->where('users_id', '=', '1')->where('academic_resources_id', '=', $id)->delete();

        return back();
    }
}
