<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $this->canAccessProducts($user);
    }

    public function view(User $user, Product $product): bool
    {
        return $this->canAccessProducts($user);
    }

    public function create(User $user): bool
    {
        return $this->canAccessProducts($user);
    }

    public function update(User $user, Product $product): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->isAdmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Product $product): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return $user->isAdmin();
    }

    private function canAccessProducts(User $user): bool
    {
        return in_array($user->role, [UserRole::Admin, UserRole::ProductCreator], true);
    }
}
