<?php

namespace App\Service;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Service\MarkdownRenderService;

class StorePostService
{
    public function __construct()
    {
        $this->markdown = new MarkdownRenderService();
    }
    public function make(array $request)
    {
        $user = Auth::user();
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $this->markdown->render($request['body']);
        $post->category_id = Category::firstOrCreate(['name' => $request['category']])->id;

        $user->posts()->save($post);
    }
}
