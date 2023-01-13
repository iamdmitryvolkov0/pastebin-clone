<?php

namespace App\Enums;

enum PasteStatusEnum: int
{
    case STATUS_PUBLIC = 0;
    case STATUS_PRIVATE = 1;
    case STATUS_UNLISTED = 2;
}
