<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;
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
        return view('staff.addAccount');
    }


    public function addAdminAccount(Request $request)
    {
        $data = array('name' => $request->name, "email" => $request->email, "password" => Hash::make($request->password), "is_admin" => true);
        DB::table('users')->insert($data);
        return back();
    }

    public function deleteAdminAccount($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->delete();
        return back();
    }
}
