<?php

namespace App\Http\Controllers;

class HelpController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Halaman Bantuan
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('help.index');
    }
}
