<?php

namespace App\Enums;

// class Role
// {
//     public const Admin = 'Admin';
//     public const Editor = 'Editor';
//     public const Author = 'Author';
// }

// PHP 8 >= 8.1.0
enum Role: string
{
    case Admin = 'Admin';
    case Editor = 'Editor';
    case Author = 'Author';
}
