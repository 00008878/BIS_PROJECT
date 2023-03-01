<?php

namespace App\UseCases\Auth;

use Exception;
use App\Models\User;
use App\Models\Service;
use App\DTO\Auth\SignInDTO;
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

        $services = Service::query()
            ->get();

        if (auth()->attempt([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ])) {
            return [
                'user' => $user,
                'services' => $services,
            ];
        }

        return [];
    }
}
