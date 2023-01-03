<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $message = 'test';

        return view('test', ['test' => $message]);
    }

    public function postTest(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return view('users', ['users' => User::all()]);
    }
}
