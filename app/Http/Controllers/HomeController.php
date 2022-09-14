<?php

namespace App\Http\Controllers;

use App\Models\Comic;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("guest.home", compact("comics"));
    }

}