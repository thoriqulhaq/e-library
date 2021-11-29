<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Auth;
use DB;


class BookmarksController extends Controller
{
    public function viewBookmarkPage()
    {

        $bookmarks = Bookmark::where('users_id', '=', '1');


        return view('community.bookmarkList')->with(array(
            'bookmarks' => $bookmarks
        ));
    }
}
