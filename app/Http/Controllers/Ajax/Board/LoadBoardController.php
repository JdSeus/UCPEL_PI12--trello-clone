<?php

namespace App\Http\Controllers\Ajax\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Board;

class LoadBoardController extends Controller
{

    public function index(Request $r, $board_id)
    {

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $board = Board::with(
            [
                'clients',
                'columns' => function($query) {
                    $query->with(['cards' => function($queryB) {
                        $queryB->orderBy('order');
                    }])
                    ->orderBy('order');
                }
            ])
            ->whereHas('clients', function (Builder $queryA) use ($client) {
                $queryA->where('client_id', $client->id); 
            })
            ->where('id', $board_id)
            ->first();

        if(!isset($board)) {
            abort(404);
        }

        return view('app.ajax.board.loaded-board', compact('board'));
    }

}
