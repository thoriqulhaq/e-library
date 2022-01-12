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

    public function _construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //grab this user's bookmarks and any public bookmarks
        $bookmarks->where('users_id','=', Auth::user()->id)
            ->orWhere('id',$bookmarks->academic_resources_id)
            ->get();

         
        $message = \Session::get('message') ? \Session::get('message') : array();

        //render with all of the necassary data
        return view('community.bookmarkList')->with(array(
            'bookmarks' => $bookmarks),
          
        );
    }

    public function addBookmark($id)
    { 
        $bookmarks = DB::table('academic_resources_public_users')->where('users_id', '=', '1')->where('academice_resources_id', '=', $id)
        ->collect();
        return back();

    }

    public function deleteBookmark($id)
    {

        $bookmarks = DB::table('academic_resources_public_users')->where('users_id', '=', '1')->where('academic_resources_id', '=', $id)->delete();

        return back();
    }

}
