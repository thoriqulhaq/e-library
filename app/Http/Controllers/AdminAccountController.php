<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Staff;
use App\Models\AcademicResources;
use App\Models\PublicUser;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AdminAccountController extends Controller
{
    public function viewAdminAccount(Request $request)
    {
        $sc = [];
        return view('staff.addAccount', [
            'datas' => $sc,
            'page' => 4
        ]);
    }


    public function addAdminAccount(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

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
