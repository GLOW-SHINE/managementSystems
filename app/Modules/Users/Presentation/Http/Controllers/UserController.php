<?php

namespace App\Modules\Users\Presentation\Http\Controllers;
use App\Modules\Users\Application\Services\UserService;
use App\Modules\Users\Application\DTOs\CreateUserDTO;
use App\Modules\Users\Presentation\Http\Requests\StoreUserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Modules\Users\Presentation\Http\Resources\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService){ }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $dto = CreateUserDTO::fromRequest($request);

        $user = $this->userService->createUser($dto);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    
    public function index(): JsonResponse
    {
        $users = $this->userService->listUsers();

        return response()->json([
            'success' => true,
            'data' => UserResource::collection($users)->resolve(),
        ]);
    }

    public function show(int $id): JsonResponse
    {

        $user = $this->userService->getUserById($id);

        dd($user);

        return response()->json([
            'success' => true,
            'data' => $this->userService->getUserById($id),
        ]);

    }


    public function update(FormRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->updateUser(
            $id,
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.',
            'data' => new UserResource($user),
        ]);
    }


}