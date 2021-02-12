<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request => request()
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $parseName = request("name");
        $name = "Dyaksa Jauharuddin Nour";

        return view("home", compact("name"));
    }
}
