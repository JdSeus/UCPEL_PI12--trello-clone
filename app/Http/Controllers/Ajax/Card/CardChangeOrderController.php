<?php

namespace App\Http\Controllers\Ajax\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\Models\Card;
use App\Models\Column;

class CardChangeOrderController extends Controller
{

    public function index(Request $r, $card_id, $direction)
    {
        //return view('app.ajax.dump', ['request' => $r]);

        if(!isset($card_id)) {
            abort(404);
        }

        if(!isset($direction)) {
            abort(404);
        }

        if(($direction != 'up') && ($direction != 'down') && ($direction != 'left') && ($direction != 'right')) {
            abort(404);
        }

        if (!Auth::guard('client')->check()) {
            abort(403);
        }

        $client = Auth::guard('client')->user();

        $card = Card::with('column')->where('id', $card_id)->first();
        
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
            abort(404);
        }

        if ($direction == 'down') {
            $auxOrder = (int) (''.$card->order);

            $cardToTheDown = Card::where('column_id', $column->id)->where('order', '>', ''.($auxOrder))->orderBy('order', 'asc')->first();

            if(isset($cardToTheDown)) {

                $card->order = $auxOrder + 1;
                $card->save();

                $cardToTheDown->order = $auxOrder;
                $cardToTheDown->save();
            }

            return response('',204)->header('HX-Trigger', 'BoardListChanged');

        } else if ($direction == 'up') {
            $auxOrder = (int) (''.$card->order);

            $cardToTheTop = Card::where('column_id', $column->id)->where('order', '<', ''.($auxOrder))->orderBy('order', 'desc')->first();

            if(isset($cardToTheTop)) {

                $card->order = $auxOrder - 1;
                $card->save();

                $cardToTheTop->order = $auxOrder;
                $cardToTheTop->save();  
            }

            return response('',204)->header('HX-Trigger', 'BoardListChanged');

        } else if ($direction == 'left') {
            $auxOrder = (int) (''.$card->order);
            $auxColumnOrder = (int) (''.$card->column->order);

            $columnToTheLeft = Column::where('board_id', $board->id)->where('order', '<', ''.($auxColumnOrder))->orderBy('order', 'desc')->first();

            $cardsToTheDown = Card::where('column_id', $column->id)->where('order', '>', ''.($auxOrder))->orderBy('order')->get();

            if(isset($columnToTheLeft)) {

                foreach($columnToTheLeft->cards as $columnToTheLeftCard) {
                    $columnToTheLeftCard->order = $columnToTheLeftCard->order + 1;
                    $columnToTheLeftCard->save();
                }
                
                $card->order = 1;
                $card->column_id = $columnToTheLeft->id;
                $card->save();
            }

            foreach($cardsToTheDown as $cardToTheDown) {
                $cardToTheDownOrder = (int) (''.$cardToTheDown->order);
                $cardToTheDown->order = $cardToTheDownOrder - 1;
                $cardToTheDown->save();
            }

            return response('',204)->header('HX-Trigger', 'BoardListChanged');

        } else if ($direction == 'right') {
            $auxOrder = (int) (''.$card->order);
            $auxColumnOrder = (int) (''.$card->column->order);

            $columnToTheRight = Column::where('board_id', $board->id)->where('order', '>', ''.($auxColumnOrder))->orderBy('order', 'asc')->first();

            $cardsToTheDown = Card::where('column_id', $column->id)->where('order', '>', ''.($auxOrder))->orderBy('order')->get();

            if(isset($columnToTheRight)) {

                foreach($columnToTheRight->cards as $columnToTheRightCard) {
                    $columnToTheRightCard->order = $columnToTheRightCard->order + 1;
                    $columnToTheRightCard->save();
                }
                
                $card->order = 1;
                $card->column_id = $columnToTheRight->id;
                $card->save();
            }

            foreach($cardsToTheDown as $cardToTheDown) {
                $cardToTheDownOrder = (int) (''.$cardToTheDown->order);
                $cardToTheDown->order = $cardToTheDownOrder - 1;
                $cardToTheDown->save();
            }

            return response('',204)->header('HX-Trigger', 'BoardListChanged');
        }

        abort(404);
    }


}
