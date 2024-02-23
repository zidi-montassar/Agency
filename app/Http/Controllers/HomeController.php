<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller {



    public function index()
    {
        $properties = property::available()->recent()->limit(3)->get();
        return view('home', ['properties' => $properties]);
    }
}
