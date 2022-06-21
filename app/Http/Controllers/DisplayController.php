<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index(Request $request)
    {
        if (url('b/home')) {
            # code...
        }
        // if(view()->exists($request->path())){
        //     return view('layouts.backend_4.master1');
        //     return view($request->path());
        // }
        // return view('layouts.backend_4.master1');

        // return 'pages-404';
    }
}
