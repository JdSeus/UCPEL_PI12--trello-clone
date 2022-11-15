<?php

namespace App\Http\Controllers\Ajax\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Board;

class BoardRemoveController extends Controller
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

        return view('app.ajax.board.remove', compact('board'));
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

        $board->delete();

        return redirect()->route('ajax.board.my-boards');
    }

}
