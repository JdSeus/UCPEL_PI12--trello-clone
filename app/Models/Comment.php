<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function card()
    {
        return $this->belongsTo('App\Models\Card');
    }

}
