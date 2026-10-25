<?php

namespace App\Modules\Users\Domain\Repositories;

use App\Modules\Users\Domain\Entities\User;


interface UserRepositoryInterface
{
    public function create(User $user): User;

    // public function all(): array;

    public function getAll(): array;

    public function findById(int $id): ?User;

    public function findByEmail(string $email): ?User;

    public function update(User $user): User;

    public function delete(int $id): bool;
    
}
