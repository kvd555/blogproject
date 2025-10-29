<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    case BrandNew = 0;
    case Published = 10;
    case Rejected = 20;

    public function toString(): string
    {
        return match ($this) {
            self::BrandNew => 'Новый',
            self::Published => 'Опубликован',
            self::Rejected => 'Отклонен',
        };
    }
}
