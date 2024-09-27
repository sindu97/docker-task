<?php

namespace App\Enum;

enum StatusEnum: string
{
    case PENDING =  '0';
    case COMPLETED = '1';
    case Hold =  '2';
}
