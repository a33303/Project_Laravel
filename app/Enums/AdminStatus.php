<?php

declare(strict_types=1);

namespace App\Enums;

enum AdminStatus: string
{
    case IS_ADMIN = 'Админ';
    case IS_USER = 'Пользователь';

    public static function all(): array
    {
        return [
            self::IS_ADMIN->value,
            self::IS_USER->value,
        ];
    }
}
