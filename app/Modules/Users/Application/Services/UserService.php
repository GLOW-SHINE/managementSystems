<?php

namespace App\Modules\Users\Application\Services;
use App\Modules\Users\Application\Actions\CreateUserAction;
use App\Modules\Users\Application\DTOs\CreateUserDTO;
use App\Modules\Users\Domain\Entities\User;
use App\Modules\Users\Domain\Repositories\UserRepositoryInterface;

class UserService
{
    public function __construct(
        private CreateUserAction $createUserAction,
        private UserRepositoryInterface $userRepository
    )
    {
    }

    public function createUser(CreateUserDTO $dto): User
    {
        return $this->createUserAction->execute($dto);
    }

    public function getAll()
    {
        return $this->listUsers();
    }

    public function listUsers()
    {
        if (method_exists($this->userRepository, 'getAll')) {
            return $this->userRepository->getAll();
        }

        return [];
    }

    public function getUserById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function updateUser(int $id, User $user): ?User
    {
        return $this->userRepository->update($user);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}





