<?php

namespace App\Http\Controllers\Users;

use Exception;
use App\Models\Client;
use App\DTO\Auth\SignInDTO;
use App\DTO\Auth\SignUpDTO;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\SignInUseCase;
use App\UseCases\Auth\SignUpUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Models\ClientApplicationInvite;
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
        $signUpUseCase->execute(SignUpDTO::fromArray($request->validated()));

        return view('client-register');
    }

    /**
     * @throws Exception
     */
    public function signIn(SignInRequest $request, SignInUseCase $signInUseCase): Factory|View|Application
    {
        $response = $signInUseCase->execute(SignInDTO::fromArray($request->validated()));

        $client = Client::query()
            ->with('applications')
            ->where('user_id', auth()->user()->id)
            ->first();

        $invitations = ClientApplicationInvite::query()
            ->where('to_client_id', $client->id)
            ->get();

        return view('home', ['user' => $response, 'client' => $client, 'invitations' => $invitations]);
    }

    public function logout(): RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('login');
    }
}
