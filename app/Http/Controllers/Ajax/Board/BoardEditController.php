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
use App\Models\Client;

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

        $allClients = Client::get();

        $loggedUser = $client;

        return view('app.ajax.board.edit', compact('board', 'loggedUser', 'allClients'));
    }

    public function post(Request $r, $board_id)
    {
        $allClients = Client::get();

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();
        $loggedUser = $client;

        $board = Board::with('clients')
            ->whereHas('clients', function (Builder $queryA) use ($client) {
                $queryA->where('client_id', $client->id); 
            })
            ->where('id', $board_id)
            ->first();

        if(!isset($board)) {
            abort(404);
        }

        //return view('app.ajax.dump', ['request' => $r]);

        $errors = new MessageBag();
        $messages = new MessageBag();

        $editBoardValidator = Validator::make(request()->all(), 
            [
                'board_title' => ['required', 'string'],
                'board_clients' => ['required', 'array'],
            ],
            [
                'board_title.required' => 'O campo Título é necessário!',
                'board_clients.required' => 'Deve ser selecionado pelo menos um cliente!',
                'board_clients.array' => 'Deve ser selecionado pelo menos um cliente!',
            ]
        );

        if ($editBoardValidator->fails()) {
            $errors = Helper::addErrorsOfValidatorToErrorBag($editBoardValidator, $errors);
            return view('app.ajax.board.edit', compact('board', 'loggedUser', 'allClients'))->withErrors($errors);
        }

        $board->title = ''.$r->board_title;
        $board->save();

        $board->clients()->detach();
        $board->load('clients');

        foreach($r->board_clients as $board_client) {
            $auxClient = Client::where('id', $board_client)->first();
            if(isset($auxClient)) {
                $board->clients()->attach([$auxClient->id]);
            }
        }

        $hasLoggedUser = false;
        foreach($board->clients as $boardClient) {
            if($boardClient->id == $client->id) {
                $hasLoggedUser = true;
            }
        }

        if($hasLoggedUser == false) {
            $board->clients()->attach([$client->id]);
        }

        $board->save();

        return redirect()->route('ajax.board.my-boards');
    }

}
