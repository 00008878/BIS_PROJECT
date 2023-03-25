<?php

namespace App\UseCases\Auth;

use App\Models\User;
use App\Models\Service;
use App\DTO\Auth\SignUpDTO;
use Illuminate\Support\Facades\Hash;

class SignUpUseCase
{
    public function execute(SignUpDTO $request): array
    {
        $user = new User();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());
        $user->save();

        $token = $user->createToken('apitoken')->plainTextToken;

        $services = Service::query()
            ->get();

        if (auth()->attempt([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ])) {
            return [
                'user' => $user,
                'services' => $services,
                'token' => $token,
            ];
        }

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
