<?php

namespace App\Http\Controllers\Admin\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Post $post) {

        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
