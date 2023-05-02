<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $user = new User([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'role' => User::ROLE_ADMIN,
        ]);
        return redirect()->route('admin.user.index');
    }
}
