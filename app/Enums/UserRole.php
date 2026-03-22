<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case ProductCreator = 'product_creator';

    public function canManageProductsFully(): bool
    {
        return $this === self::Admin;
    }
}
