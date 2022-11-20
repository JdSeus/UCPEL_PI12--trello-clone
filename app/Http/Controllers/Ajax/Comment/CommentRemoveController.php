<?php

namespace App\Http\Controllers\Ajax\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Comment;

class CommentRemoveController extends Controller
{

    public function index(Request $r, $comment_id)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $comment = Comment::where('id', $comment_id)->first();
        
        if(!isset($comment)) {
            abort(404);
        }

        $card = $comment->card;

        if(!isset($card)) {
            abort(404);
        }

        $column = $card->column;

        if(!isset($column)) {
            abort(404);
        }

        $board = $column->board;

        if(!isset($board)) {
            abort(404);
        }

        $board->load('clients');

        $boardClients = $board->clients;

        $cardHasClient = false;
        foreach($boardClients as $boardClient) {
            if ($boardClient->id == $client->id) {
                $cardHasClient = true;
            }
        }

        if($cardHasClient == false) {
            abort(403);
        }

        return view('app.ajax.comment.remove', compact('comment'));
    }

    public function post(Request $r, $comment_id)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $comment = Comment::where('id', $comment_id)->first();
        
        if(!isset($comment)) {
            abort(404);
        }

        $card = $comment->card;

        if(!isset($card)) {
            abort(404);
        }

        $column = $card->column;

        if(!isset($column)) {
            abort(404);
        }

        $board = $column->board;

        if(!isset($board)) {
            abort(404);
        }

        $board->load('clients');

        $boardClients = $board->clients;

        $cardHasClient = false;
        foreach($boardClients as $boardClient) {
            if ($boardClient->id == $client->id) {
                $cardHasClient = true;
            }
        }

        if($cardHasClient == false) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('ajax.card.edit', $comment->card->id);
    }

}