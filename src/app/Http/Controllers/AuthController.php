<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Services\Hasher;
use App\Services\RolesService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()){
            return redirect()->route('admin.main.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        $user = User::where('username', $credentials['name'])->first();
        if ($user && Hasher::check($credentials['password'], $user->password)){
            $roles = RolesService::getRoles($user->username);
            if (in_array("group.admin", $roles)){
                auth()->login($user);
                return redirect()->route('admin.main.index');
            }else{
                return redirect()->route('main');
            }
        }else{
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.',
            ]);
        }
    }

//    public function showRegistrationForm()
//    {
//        return view('auth.register');
//    }
//
//    public function register(Request $request)
//    {
//        $validatedData = $request->validate([
//            'name' => 'required|max:255',
//            'password' => 'required|confirmed|min:8',
//        ]);
//
//        $user = User::create([
//            'name' => $validatedData['name'],
//            'password' => Hash::make($validatedData['password']),
//        ]);
//
//        Auth::login($user);
//
//        return redirect()->route('admin.main.index');
//    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
