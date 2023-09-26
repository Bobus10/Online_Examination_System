<?php

namespace App\Enums;

enum UserRoleEnums: string
{
    case STUDENT = 'stdent';
    case TEACHER = 'teacher';
    case ADMIN = 'admin';
}
