<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $table = 'columns';

    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }

    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }

}
