<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Column;

class Board extends Model
{
    use HasFactory;

    protected $table = 'boards';

    public $additional_attributes = ['last_column_order'];

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function columns()
    {
        return $this->hasMany('App\Models\Column');
    }

    public function getLastColumnOrderAttribute()
    {
        if(isset($this->id)) {
            $lastColumnOfBoard = Column::where('board_id', $this->id)->orderBy('order', 'desc')->first();
            return (int) (''.$lastColumnOfBoard->order);
        }
        return -1;
    }

}
