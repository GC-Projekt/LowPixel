<?php

namespace App\Http\Controllers\Admin\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post) {
        $data = $request->validated();
        if ($request->files->has('main_image'))
        {
            $data['main_image'] = Storage::put('/images', $data['main_image']);
        }

        $post->update($data);

        return view('admin.post.show', compact('post'));
    }
}
