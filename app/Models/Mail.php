<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = ['subject', 'body', 'to', 'user_id'];
}
