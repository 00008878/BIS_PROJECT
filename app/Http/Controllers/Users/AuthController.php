<?php

namespace App\Http\Controllers\Users;

use App\DTO\Auth\SignInDTO;
use App\DTO\Auth\SignUpDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignUpRequest;
use App\UseCases\Auth\SignInUseCase;
use App\UseCases\Auth\SignUpUseCase;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request, SignUpUseCase $signUpUseCase): JsonResponse
    {
        $response = $signUpUseCase->execute(SignUpDTO::fromArray($request->validated()));

        return response()->json($response);
    }

    /**
     * @throws Exception
     */
    public function signIn(SignInRequest $request, SignInUseCase $signInUseCase): Factory|View|Application
    {
        $response = $signInUseCase->execute(SignInDTO::fromArray($request->validated()));

        return view('test2', ['user' => $response]);
    }
}
