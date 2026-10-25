<?php

namespace App\Modules\Users\Infrastructure\Persistence\Repositories;

use App\Modules\Users\Domain\Entities\User;
use App\Modules\Users\Domain\Repositories\UserRepositoryInterface;
use App\Modules\Users\Infrastructure\Persistence\Eloquent\UserModel;
use App\Modules\Users\Domain\Enums\UserStatus;
use App\Modules\Users\Domain\Enums\UserType;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(User $user): User
    {
        $model = UserModel::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'picture' => $user->getPicture(),
            'bio' => $user->getBio(),
            'type' => $user->getType(),
            'status' => $user->getStatus(),
        ]);

        return $this->toDomain($model);
    }


    public function getAll(): array
    {
        return UserModel::query()
            ->get()
            ->map(fn (UserModel $model) => $this->toDomain($model))
            ->all();
    }

    public function findById(int $id): ?User
    {
        $model = UserModel::find($id);

        if (!$model) {
            return null;
        }

        return $this->toDomain($model);
    }

    public function findByEmail(string $email): ?User
    {
        $model = UserModel::where('email', $email)->first();

        if (!$model) {
            return null;
        }

        return $this->toDomain($model);
    }

    public function update(User $user): User
    {
        $model = UserModel::findOrFail($user->getId());

        $model->update([
             'name' => $user->getName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'picture' => $user->getPicture(),
            'bio' => $user->getBio(),
            'type' => $user->getType(),
            'status' => $user->getStatus(),
        ]);

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) UserModel::whereKey($id)->delete();
    }

    private function toDomain(UserModel $model): User
    {
        return new User(
            id: $model->id,
            name: $model->name,
            email: $model->email,
            password: $model->password,
            phone: $model->phone,
            address: $model->address,
            username: $model->username,
            picture: $model->picture,
            bio: $model->bio,
            type: UserType::from($model->type),
            status: UserStatus::from($model->status),
        );
    }
}