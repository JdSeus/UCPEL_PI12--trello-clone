<?php

namespace App\Http\Controllers\Ajax\NewPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use Carbon\Carbon;

use App\Models\Board;
use App\Models\Column;
use App\Models\Card;
use App\Models\Comment;

class NewPasswordController extends Controller
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

        return view('app.ajax.new-password.edit', compact('client'));

    }

    public function post(Request $r)
    {

        return view('app.ajax.dump', ['request' => $r]);

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        if(!isset($client)) {
            abort(403);
        }

    }

}