<?php

namespace App\Http\Controllers;

use App\Jobs\NotifySubscribers;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required',
            'websiteId' => 'required|exists:websites,id',
        ];
        $messages = [
            'websiteId.exists' => 'The website specified does not exist!',
            'websiteId.required' => 'The websiteId field is missing!',
        ];
        $this->validate($request, $rules, $messages);
        $website = Website::query()->findOrFail($request->websiteId);
        $post = new Post($request->only('title', 'body'));
        $website->posts()->save($post);
        $this->dispatch(new NotifySubscribers($post));
        return $post;
    }
}
