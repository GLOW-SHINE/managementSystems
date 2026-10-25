<?php

namespace App\Modules\Users\Domain\Entities;

use App\Modules\Users\Domain\Enums\UserStatus;
use App\Modules\Users\Domain\Enums\UserType;

class User
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private ?int $id,
        private string $name,
        private string $email,
        private ?string $password = null,
        private ?string $phone = null,
        private ?string $address = null,
        private ?string $username = null,
        private ?string $picture = null,
        private ?string $bio = null,
        private UserType $type = UserType::ClientOrCustomer,
        private UserStatus $status = UserStatus::ACTIVE,
    ){ }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function getType(): string
    {
       return $this->type->value;
    }

    public function getStatus(): string
    {
        return $this->status->value;
    }
}
