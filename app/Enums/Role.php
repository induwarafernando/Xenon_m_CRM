<?php

namespace App\Enums;

enum Role: int
{
    case SuperAdmin = 1 ;
    case Customer = 2 ;
    case Merchandiser = 3 ;
    case DeliveryManager = 4 ;
}