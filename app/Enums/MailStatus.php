<?php

namespace App\Enums;

enum MailStatus: string
{
    case Pending = 'pending';
    case Sent = 'sent';
}
