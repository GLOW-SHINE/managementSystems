<?php

namespace App\Modules\Users\Application\Actions;

use App\Modules\Users\Application\DTOs\CreateUserDTO;
use App\Modules\Users\Domain\Entities\User;
use App\Modules\Users\Domain\Repositories\UserRepositoryInterface;

final class CreateUserAction
{
    public function __construct(private UserRepositoryInterface $userRepository){}
    public function execute(CreateUserDTO $dto): User
    {        
        // $type = $dto->type instanceof \BackedEnum ? $dto->type->value : (string) $dto->type;
        // $status = $dto->status instanceof \BackedEnum ? $dto->status->value : (string) $dto->status;
        // $password = password_hash($dto->password, PASSWORD_DEFAULT);

        $user = new User(
            id: null,
            name: $dto->name,
            email: $dto->email,
            username: $dto->username,
            password: $dto->password,
            phone: $dto->phone,
            address: $dto->address,
            picture: $dto->picture,
            bio: $dto->bio,
            type: $dto->type,
            status: $dto->status,
        );

        return $this->userRepository->create($user);
    }
}
