<?php

namespace App\UseCases\Auth;

use App\DTO\Auth\SignUpDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUpUseCase
{
    public function execute(SignUpDTO $request): array
    {
        $user = new User();
        $user->name = $request->getName();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());
        $user->save();

        $token = $user->createToken('apitoken')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
