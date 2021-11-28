<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function viewBookmarkPage()
    {
        return view('community.bookmarkList');
    }

    public function listBookmarkPage()
    {


        return view('community.bookmarkList');
    }
}
