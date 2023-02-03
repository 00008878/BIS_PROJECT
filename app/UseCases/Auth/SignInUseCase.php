<?php

namespace App\UseCases\Auth;

use Exception;
use App\Models\User;
use App\DTO\Auth\SignInDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SignInUseCase
{
    /**
     * @throws Exception
     */
    public function execute(SignInDTO $request): array
    {
        $user = User::query()
            ->where('email', '=', $request->getEmail())
            ->first();

        if ($user === null) {
            throw new ModelNotFoundException('Пользователь не найден', 404);
        }

        if (Hash::check($request->getPassword(), $user->password) === false) {
            throw new Exception('Unauthorized', 401);
        }

        $token = $user->createToken('apitoken')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
