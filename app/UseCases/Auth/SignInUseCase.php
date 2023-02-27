<?php

namespace App\UseCases\Auth;

use Exception;
use App\Models\User;
use App\DTO\Auth\SignInDTO;
use App\Models\ServiceType;
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

        $service_type = ServiceType::query()
            ->get();

        if (auth()->attempt([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ])) {
            return [
                'user' => $user,
                'service_type' => $service_type,
            ];
        }

        return [];
    }
}
