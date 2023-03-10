<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\DTO\Auth\SignInDTO;
use App\DTO\Auth\SignUpDTO;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\SignInUseCase;
use App\UseCases\Auth\SignUpUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Contracts\Foundation\Application;

class AuthController extends Controller
{
    public function signInView(): Factory|View|Application
    {
        return view('signin');
    }

    public function signUpView(): Factory|View|Application
    {
        return view('signup');
    }

    public function signUp(SignUpRequest $request, SignUpUseCase $signUpUseCase): Factory|View|Application
    {
        $response = $signUpUseCase->execute(SignUpDTO::fromArray($request->validated()));

        return view('home', ['user' => $response]);
    }

    /**
     * @throws Exception
     */
    public function signIn(SignInRequest $request, SignInUseCase $signInUseCase): Factory|View|Application
    {
        $response = $signInUseCase->execute(SignInDTO::fromArray($request->validated()));

        return view('home', ['user' => $response]);
    }

    public function logout(): RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('login');
    }
}
