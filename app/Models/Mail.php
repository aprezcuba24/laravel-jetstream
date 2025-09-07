<?php

namespace App\Models;

use App\Enums\MailStatus;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = ['subject', 'body', 'to', 'user_id'];

    protected $casts = [
        'status' => MailStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
