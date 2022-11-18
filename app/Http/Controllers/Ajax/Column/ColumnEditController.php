<?php

namespace App\Http\Controllers\Ajax\Column;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Column;

class ColumnEditController extends Controller
{

    public function index(Request $r, $column_id)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $column = Column::where('id', $column_id)->first();
        
        if(!isset($column)) {
            abort(404);
        }

        $board = $column->board;

        if(!isset($board)) {
            abort(404);
        }

        $board->load('clients');

        $boardClients = $board->clients;

        $columnHasClient = false;
        foreach($boardClients as $boardClient) {
            if ($boardClient->id == $client->id) {
                $columnHasClient = true;
            }
        }

        if($columnHasClient == false) {
            abort(404);
        }

        return view('app.ajax.column.edit', compact('column'));
    }

    public function post(Request $r, $column_id)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $column = Column::where('id', $column_id)->first();
        
        if(!isset($column)) {
            abort(404);
        }

        $board = $column->board;

        if(!isset($board)) {
            abort(404);
        }

        $board->load('clients');



        $boardClients = $board->clients;

        $columnHasClient = false;
        foreach($boardClients as $boardClient) {
            if ($boardClient->id == $client->id) {
                $columnHasClient = true;
            }
        }

        if($columnHasClient == false) {
            abort(404);
        }

        $errors = new MessageBag();

        $editColumnValidator = Validator::make(request()->all(), 
            [
                'column_title' => ['required', 'string'],
            ],
            [
                'column_title.required' => 'O campo Título é necessário!',
            ]
        );

        if ($editColumnValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($editColumnValidator, $errors);
            return view('app.ajax.column.edit', compact('column'))->withErrors($errors);
        }

        $column->title = ''.$r->column_title;
        $column->save();

        $route = route('board', ['board_id' => $board->id]);

        return response($route, 303);
    }

}
