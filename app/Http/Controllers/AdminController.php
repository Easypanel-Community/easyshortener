<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {

        $isAdmin = auth()->user()->role() == "admin";

        if(!$isAdmin){
            return view('admin.index');
        }else{
            abort(403);
        }
    }
}
