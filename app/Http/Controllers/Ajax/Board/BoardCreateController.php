<?php

namespace App\Http\Controllers\Ajax\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Board;

class BoardCreateController extends Controller
{

    public function index(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        return view('app.ajax.board.create');
    }

    public function post(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $errors = new MessageBag();

        $createBoardValidator = Validator::make(request()->all(), 
            [
                'board_title' => ['required', 'string'],
            ],
            [
                'board_title.required' => 'O campo Título é necessário!',
            ]
        );

        if ($createBoardValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($createBoardValidator, $errors);
            return view('app.ajax.board.create')->withErrors($errors);
        }

        $board = new Board();
        $board->title = ''.$r->board_title;
        $board->save();

        $client = Auth::guard('client')->user();

        $board->clients()->attach([$client->id]);

        return response(route('adx'), 303);
    }

}
