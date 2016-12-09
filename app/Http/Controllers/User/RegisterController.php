<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'birthday',
            'role',
            'image',
            'phone',
            'address',
            'gender',
        ]);
        $user = User::create($data);

        if ($user) {
            Auth::guard()->login($user);

            return redirect('/home');
        }

        return redirect('/');
    }
}
