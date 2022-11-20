<?php

namespace App\Http\Controllers\Ajax\Comment;

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

class CommentCreateController extends Controller
{

    public function index(Request $r, $card_id)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $card = Card::where('id', $card_id)->first();

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

        return view('app.ajax.comment.create', compact('card'));
    }

    public function post(Request $r, $card_id)
    {
        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $card = Card::where('id', $card_id)->first();

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

        $errors = new MessageBag();

        $createCommentValidator = Validator::make(request()->all(), 
            [
                'comment_description' => ['required', 'string'],
            ],
            [
                'comment_description.required' => 'O campo Descrição é necessário!',
            ]
        );

        if ($createCommentValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($createCommentValidator, $errors);
            return view('app.ajax.comment.create', compact('card'))->withErrors($errors);
        }

        $comment = new Comment();
        $comment->date = ''.Carbon::now()->format('Y-m-d');
        $comment->description = ''.$r->comment_description;
        $comment->card_id = $card->id;
        $comment->client_id = $client->id;
        $comment->save();

        return redirect()->route('ajax.card.edit', ['card_id' => $card->id]);

    }

}