<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('links.index');
    }

    public function create()
    {
        return view('links.create');
    }

    public function edit(Link $link)
    {
        return view('links.edit')->with('link', $link);
    }
}