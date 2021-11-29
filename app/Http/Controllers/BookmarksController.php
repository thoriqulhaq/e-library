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
    public function viewBookmarkPage()
    {

        $bookmarks = Bookmark::query('users_id', '=', '1');


        return view('community.bookmarkList')->with(array(
            'bookmarks' => $bookmarks
        ));
    }

    public function addBookmark($object)
    {

        if ($this->isBookmarked($object)) {
            return $this->bookmarks()->where([
                ['academic_resources_public_users.academic_resources_id', get_class($object)],
                ['academic_resources_public_users.users_id', $object->id]
            ])->delete();
        }

        return $this->bookmarks()->create(['academic_resources_id' => get_class($object), 'users_id' => $object->id]);
    }

    public function isBookmarked($object)
    {
        return $this->bookmarks()->where([
            ['academic_resources_public_users.academic_resources_id', get_class($object)],
            ['academic_resources_public_users.users_id', $object->id]
        ])->exists();
    }
}
