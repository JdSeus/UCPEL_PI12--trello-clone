<?php

namespace App\Http\Controllers\Ajax\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Client;

class MenuController extends Controller
{

    public function index(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        if(!isset($client)) {
            abort(403);
        }

        return view('app.ajax.menu.content');

    }

}