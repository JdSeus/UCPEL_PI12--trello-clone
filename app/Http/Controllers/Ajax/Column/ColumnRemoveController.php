<?php

namespace App\Http\Controllers\Ajax\Column;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Column;

class ColumnRemoveController extends Controller
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
        $board->load('clients');

        if(!isset($board)) {
            abort(404);
        }

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

        return view('app.ajax.column.remove', compact('column'));
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
        $board->load('clients');

        if(!isset($board)) {
            abort(404);
        }

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

        $column->delete();

        $route = route('board', ['board_id' => $board->id]);

        return response($route, 303);
    }

}
