<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    public function tweet()
    {
        return $this->belongsTo('App\Models\Tweet');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
