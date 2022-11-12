<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    public function column()
    {
        return $this->belongsTo('App\Models\Column');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
