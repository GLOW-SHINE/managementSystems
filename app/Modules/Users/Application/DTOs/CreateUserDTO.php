<?php

namespace App\Modules\Users\Application\DTOs;

use App\Modules\Users\Domain\Enums\UserStatus;
use App\Modules\Users\Domain\Enums\UserType;
use App\Modules\Users\Presentation\Http\Requests\StoreUserRequest;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $username,
        public string $password,

        public ?string $phone = null,
        public ?string $address = null,
        public ?string $picture = null,
        public ?string $bio = null,

        public UserType $type = UserType::User,
        public UserStatus $status = UserStatus::ACTIVE,
    ) {
    }

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            phone: $request->validated('phone'),
            address: $request->validated('address'),
            username: $request->validated('username'),
            password: $request->validated('password'),
            picture: $request->validated('picture'),
            bio: $request->validated('bio'),
            
            type: UserType::from($request->validated('type')),
            status: UserStatus::from($request->validated('status')), 
        );
    }   
}
