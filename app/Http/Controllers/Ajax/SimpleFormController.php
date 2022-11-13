<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SimpleFormController extends Controller
{

    public function index(Request $r)
    {
        return view('app.ajax.simple-form');
    }

}
