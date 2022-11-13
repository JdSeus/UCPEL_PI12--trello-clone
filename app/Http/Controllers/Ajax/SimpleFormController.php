<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SimpleFormController extends Controller
{

    public function index(Request $r)
    {
        return view('app.ajax.dump', ['request' => $r]);
    }

}
