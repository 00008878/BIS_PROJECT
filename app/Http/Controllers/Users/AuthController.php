<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\DTO\Auth\SignInDTO;
use App\DTO\Auth\SignUpDTO;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\SignInUseCase;
use App\UseCases\Auth\SignUpUseCase;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Contracts\Foundation\Application;

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
