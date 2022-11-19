<?php

namespace App\Http\Controllers\Ajax\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Board;
use App\Models\Column;
use App\Models\Card;

class CardCreateController extends Controller
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

        return view('app.ajax.card.create', compact('column'));
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

        $createCardValidator = Validator::make(request()->all(), 
            [
                'card_title' => ['required', 'string'],
            ],
            [
                'card_title.required' => 'O campo Título é necessário!',
            ]
        );

        if ($createCardValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($createCardValidator, $errors);
            return view('app.ajax.card.create', compact('column'))->withErrors($errors);
        }

        $auxOrder = 0;
        $otherCardsOfColumn = Card::where('column_id', $column->id)->get();
        foreach($otherCardsOfColumn as $otherCardOfColumn) {
            if ($otherCardOfColumn->order > $auxOrder) {
                $auxOrder = $otherCardOfColumn->order;
            }
        }
        $auxOrder = $auxOrder + 1;

        $card = new Card();
        $card->title = ''.$r->card_title;
        $card->column_id = $column->id;
        $card->order = $auxOrder;
        $card->save();

        return response('',204)->header('HX-Trigger', 'BoardListChanged');
    }

}
