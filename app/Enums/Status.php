<?php

namespace App\Enums;

enum Status: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
}
