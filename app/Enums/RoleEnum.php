<?php

namespace App\Enums;

enum RoleEnum: int
{
    case Admin = 1;
    case Kaprodi = 2;
    case MO = 3;
    case Mahasiswa = 4;

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'admin',
            self::Kaprodi => 'kaprodi',
            self::MO => 'mo',
            self::Mahasiswa => 'mahasiswa',
        };
    }
}
