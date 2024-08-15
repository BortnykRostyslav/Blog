<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);

    }

    public function delete()
    {
        $post = Post::find(2);

        $post->delete();

        dd('delete');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('post.index');
    }

    public function FirstOrCreate()
    {

        $anotherPost = [
            'title' => 'Another Post Title',
            'content' => 'This is the content of the another post.',
            'image' => 'another.jpg',
            'likes' => 530,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'Another_2 Post Title'
        ], [
            'title' => 'Another Post Title',
            'content' => 'This is the content of the another post.',
            'image' => 'another.jpg',
            'likes' => 530,
            'is_published' => 1,
        ]);

        dump($post->content);
        dd('end');
    }

    public function UpdateOrCreate()
    {
        $anotherPost = [
            'title' => 'Updateorcreate Post Title',
            'content' => 'Updateorcreate This is the content of the another post.',
            'image' => 'Updadeorcreate.jpg',
            'likes' => 53,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'Another_2 Post Title'
        ], [
            'title' => 'It`s not update Post Title',
            'content' => 'It`s not update This is the content of the another post.',
            'image' => 'It`s not update.jpg',
            'likes' => 53,
            'is_published' => 1,
        ]);

        dd($post->content);
    }
}
