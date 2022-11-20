<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Card;

class Column extends Model
{
    use HasFactory;

    protected $table = 'columns';

    public $additional_attributes = ['last_card_order'];

    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }

    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }

    public function getLastCardOrderAttribute()
    {
        if(isset($this->id)) {
            $lastCardOfBoard = Card::where('column_id', $this->id)->orderBy('order', 'desc')->first();
            return (int) (''.$lastCardOfBoard->order);
        }
        return -1;
    }

}
