<?php

namespace App\Modules\Users\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Modules\Users\Domain\Enums\UserType;
use App\Modules\Users\Domain\Enums\UserStatus;

use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             /* |------------------------ | Name |------------------------ */ 
            'name' => [ 
                'required', 
                'string', 
                'min:2', 
                'max:100', 
                'regex:/^[A-Za-z]+(?:[ .\'-][A-Za-z]+)*$/', 
            ], 
            
            /* |------------------------ | Email |----------------------- */ 
            'email' => [ 
                'required', 
                'string', 
                'max:255', 
                'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', 
                'unique:users,email', 
            ], 
            
            /* |------------------------ | Phone |----------------------- */ 
            'phone' => [ 
                'nullable', 
                'string', 
                'regex:/^\+?[1-9]\d{7,14}$/', 
                'max:15', 
            ], 
            
            /* |------------------------ | Address |-------------------- */ 
            'address' => [ 
                'nullable', 
                'string', 
                'min:5', 
                'max:500', 
                'regex:/^[A-Za-z0-9\s,.\'\/#-]+$/', 
            ], 
            
            /* |------------------------ | Username |------------------- */ 
            'username' => [ 
                'required', 
                'string', 
                'min:3', 
                'max:30', 
                'regex:/^[a-zA-Z][a-zA-Z0-9._-]*$/', 
                'unique:users,username', 
            ], 
            
            /* |------------------------ | Password |------------------- */ 
            'password' => [
                        'required',
                        'string',
                        Password::min(8)
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                        'confirmed',
                    ], 
             
            /* |-------------------------- | Picture |--------------------- */ 
            'picture' => [ 
                'nullable', 
                'image', 
                'mimes:jpg,jpeg,png,webp', 
                'max:2048', 
                ], 
                
            /* |------------------------ | Bio |----------------------- */ 
            'bio' => [ 
                'nullable', 
                'string', 
                'min:10', 
                'max:1000', 
                'regex:/^[A-Za-z0-9\s.,!?\'"()\-:;]+$/', ], 
                    
            /* |--------------------------- | User Type |-------------------- */ 
            'type' => [
                        'required',
                        Rule::enum(UserType::class),
                    ],
            
            /* |------------------------ | User Status |--------------------- */ 
            'status' => [
                            'required',
                            Rule::enum(UserStatus::class),
                        ],
        ];
    }

    /** 
      * Get custom validation messages. 
    */

    public function messages(): array
    {
        return [ 
            'name.required' => 'Name is required.', 
            'name.regex' => 'Name may contain only letters, spaces, dots, apostrophes and hyphens.', 
            'name.min' => 'Name must be at least 2 characters.', 
            'name.max' => 'Name must not exceed 100 characters.', 
            
            'email.required' => 'Email address is required.', 
            'email.regex' => 'Please enter a valid email address.', 
            'email.unique' => 'This email address is already registered.', 
            
            'phone.regex' => 'Please enter a valid phone number.', 
            'phone.max' => 'Phone number must not exceed 15 digits.', 
            
            'address.regex' => 'Address contains invalid characters.', 
            'address.min' => 'Address must be at least 5 characters.', 
            'address.max' => 'Address must not exceed 500 characters.', 
            
            'username.required' => 'Username is required.', 
            'username.regex' => 'Username may contain only letters, numbers, dots, underscores and hyphens.', 
            'username.min' => 'Username must be at least 3 characters.', 
            'username.max' => 'Username must not exceed 30 characters.', 
            'username.unique' => 'This username is already taken.', 
            
            'password.required' => 'Password is required.', 
            'password.min' => 'Password must be at least 8 characters.', 
            'password.max' => 'Password must not exceed 64 characters.', 
            'password.regex' => 'Password must contain uppercase, lowercase, number and special character.', 
            'password.confirmed' => 'Password confirmation does not match.', 
            'picture.image' => 'The picture must be a valid image.', 
            'picture.mimes' => 'The picture must be jpg, jpeg, png or webp.', 
            'picture.max' => 'The picture size must not exceed 2MB.', 
            
            'bio.regex' => 'Bio contains invalid characters.', 
            'bio.min' => 'Bio must be at least 10 characters.', 
            'bio.max' => 'Bio must not exceed 1000 characters.', 
            
            'type.required' => 'User type is required.', 
            'status.required' => 'User status is required.', 
        ];
    }
}