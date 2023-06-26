<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post', [
            'except' => ['index', 'show'],
        ]);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $latest_posts = Post::latest()->get()->take(5);
        $categories = Category::all();
        return view('posts.index')->with(['posts' => $posts, 'latest_posts' => $latest_posts, 'categories' => $categories]);
    }

    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-images', $name);
        }
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        PostCreated::dispatch($post);
        return redirect()->back()->with('success', 'Post áwmetli jaratıldı!');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->take(5)->get()->except($post->id),
            'categories' => Category::all(),
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with([
            'post' => $post,
            'categories' => Category::all()->except($post->category_id),
            'tags' => Tag::all(),
        ]);
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {
            if ($post->photo) {
                Storage::delete($post->photo);
            }
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-images', $name);
        }
        $post->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo
        ]);

        if (isset($request->tags)) {
            $post->tags()->detach();
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        if ($post->photo) {
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function imageDestroy(Post $post)
    {
        if ($post->photo) {
            Storage::delete($post->photo);
            $post->update(['photo' => null]);
        }
        return redirect()->route('posts.edit', ['post' => $post]);
    }

    public function posts_mine()
    {
        $this->authorize('posts_mine', Post::class);
        $posts = auth()->user()->posts()->latest()->paginate(10);
        $latest_posts = Post::latest()->get()->take(5);
        $categories = Category::all();
        return view('posts.mine')->with(['posts' => $posts, 'latest_posts' => $latest_posts, 'categories' => $categories]);
    }
}
