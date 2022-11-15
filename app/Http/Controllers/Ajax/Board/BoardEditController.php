<?php

namespace App\Http\Controllers\Ajax\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Board;

class BoardEditController extends Controller
{

    public function index(Request $r, $board_id)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();
        
        $board = Board::with('clients')
            ->whereHas('clients', function (Builder $queryA) use ($client) {
                $queryA->where('client_id', $client->id); 
            })
            ->where('id', $board_id)
            ->first();

        if(!isset($board)) {
            abort(404);
        }

        return view('app.ajax.board.edit', compact('board'));
    }

    public function post(Request $r, $board_id)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $board = Board::with('clients')
            ->whereHas('clients', function (Builder $queryA) use ($client) {
                $queryA->where('client_id', $client->id); 
            })
            ->where('id', $board_id)
            ->first();

        if(!isset($board)) {
            abort(404);
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
            return view('app.ajax.board.edit', compact('board'))->withErrors($errors);
        }

        $board->title = ''.$r->board_title;
        $board->save();

        return redirect()->route('ajax.board.my-boards');
    }

}
