<?php

namespace App\Enums;

enum UserRoleEnums: string
{
    case STUDENT = 'student';
    case INSTRUCTOR = 'instructor';
    case ADMIN = 'admin';
}
