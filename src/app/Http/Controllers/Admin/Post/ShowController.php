<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function __invoke(Post $post) {
        return view('admin.post.show', compact('post'));

    }
}
