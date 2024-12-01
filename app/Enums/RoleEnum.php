<?php

namespace App\Enums;

enum RoleEnum
{
    case Admin = 'admin';
    case User = 'user';
    case Moderator = 'moderator';
}
