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

        $bookmarks = DB::table('academic_resources_public_users')->where('user_id', '=', '1')->get();


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
        $bookmarks = DB::table('academic_resources_public_users')->where('user_id', '=', '1')->where('academic_resources_id', '=', $id)->add();
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

    public function addBookmark(Request $request)
    { 
        //scope
        $current_user = Auth::user();
        
        //create a new bookmark and associate with current user
        $bookmark = new Bookmark;
        $bookmark->user()->associate($current_user->id);

        //configure the bookmark
        $bookmark->name = $request->name;
        $bookmark->title = $request->title;
       

        //save it
        $bookmark->save();

        //all is well, so pass back a message
        $message = array(
            'status' => 'OK', 
            'message' => 'Bookmark added!'
        );

        //redirect to the dashboard view with the message
        return redirect('community.bookmarkList')
            ->with('message',$message);

    }

    public function deleteBookmark($id)
    {

        $bookmarks = DB::table('academic_resources_public_users')->where('user_id', '=', '1')->where('academic_resources_id', '=', $id)->delete();

        return back();
    }

}
