<?php

namespace App\Http\Controllers\Ajax\Column;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Board;
use App\Models\Column;

class ColumnCreateController extends Controller
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

        return view('app.ajax.column.create', compact('board'));
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

        $createColumnValidator = Validator::make(request()->all(), 
            [
                'column_title' => ['required', 'string'],
            ],
            [
                'column_title.required' => 'O campo Título é necessário!',
            ]
        );

        if ($createColumnValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($createColumnValidator, $errors);
            return view('app.ajax.column.create', compact('board'))->withErrors($errors);
        }

        $column = new Column();
        $column->title = ''.$r->column_title;
        $column->board_id = $board->id;
        $column->save();

        $route = route('board', ['board_id' => $board->id]);

        return response($route, 303);
    }

}
