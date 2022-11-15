<?php

namespace App\Http\Controllers\Ajax\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Board;

class MyBoardsController extends Controller
{

    public function index(Request $r)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $boards = Board::with('clients')
            ->whereHas('clients', function (Builder $queryA) use ($client) {
                $queryA->where('client_id', $client->id); 
            })
            ->get();

        return view('app.ajax.board.my-boards', compact('boards'));
    }

}
