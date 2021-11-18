<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function viewLandingPage()
    {
        return view('staff.main');
    }

    public function uploadBook() {
        return view('staff.uploadbook');
    }
}
