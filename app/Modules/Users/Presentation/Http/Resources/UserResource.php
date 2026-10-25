<?php

namespace App\Modules\Users\Presentation\Http\Resources;

use App\Modules\Users\Domain\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'id'       => $user->getId(),
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'username' => $user->getUsername(),
            'phone'    => $user->getPhone(),
            'address'  => $user->getAddress(),
            'picture'  => $user->getPicture(),
            'bio'      => $user->getBio(),
            'type'     => $user->getType(),
            'status'   => $user->getStatus(),
        ];
    }
}