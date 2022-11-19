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

class ColumnChangeOrderController extends Controller
{

    public function index(Request $r, $column_id, $direction)
    {
        //return view('app.ajax.dump', ['request' => $r]);

        if(!isset($column_id)) {
            abort(404);
        }

        if(!isset($direction)) {
            abort(404);
        }

        if(($direction != 'right') && ($direction != 'left')) {
            abort(404);
        }

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

        if ($direction == 'right') {
            $auxOrder = (int) (''.$column->order);

            $columnToTheRight = Column::where('board_id', $board->id)->where('order', '>', ''.($auxOrder))->orderBy('order', 'asc')->first();

            if(isset($columnToTheRight)) {

                $column->order = $auxOrder + 1;
                $column->save();

                $columnToTheRight->order = $auxOrder;
                $columnToTheRight->save();
            }

            //return view('app.ajax.dump', ['request' => [$column, $columnToTheRight]]);

            return response('',204)->header('HX-Trigger', 'BoardListChanged');

        } else if ($direction == 'left') {
            $auxOrder = (int) (''.$column->order);

            $columnToTheLeft = Column::where('board_id', $board->id)->where('order', '<', ''.($auxOrder))->orderBy('order', 'desc')->first();

            if(isset($columnToTheLeft)) {

                $column->order = $auxOrder - 1;
                $column->save();

                if(isset($columnToTheLeft)) {
                    $columnToTheLeft->order = $auxOrder;
                    $columnToTheLeft->save();  
                }
            }

            //return view('app.ajax.dump', ['request' => [$column, $columnToTheLeft]]);

            return response('',204)->header('HX-Trigger', 'BoardListChanged');
        }

        abort(404);
    }


}
