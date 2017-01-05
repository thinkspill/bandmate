<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $bands = Band::paginate();

        return view('layouts.bandmate.bands', compact('bands', 'request'));
    }
}
