<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() {
        $posts = Post::all();
        return view('admin.main.index', [
            'posts_count' => Post::all()->count(),
            'users_count' => User::all()->count(),
        ]);
    }
}
