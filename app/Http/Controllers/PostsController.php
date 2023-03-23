<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function frontIndex()
    {
        $posts = \App\Models\Posts::published()->publishedAt()->get();
        return view('posts.front.index', compact('posts'));
    }


    public function frontShow($slug)
    {
        $post = \App\Models\Posts::where('slug', $slug)->first();
        return view('posts.front.show', compact('post'));
    }

    
    public function index()
    {
        $posts = \App\Models\Posts::published()->publishedAt()->get();
        return view('posts.index', compact('posts'));
    }

    

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'required',
            'published_at' => 'required',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('posts'), $new_name);

        $slug = createUniqueSlug($request->slug, 'posts', 'slug');
        $post = new \App\Models\Posts();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->image = $new_name;
        $post->published = $request->published;
        $post->published_at = $request->published_at;
        $post->save();

        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        $post = \App\Models\Posts::find($id);
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = \App\Models\Posts::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'required',
            'published_at' => 'required',
        ]);

        $post = \App\Models\Posts::find($id);
        if ($request->hasFile('image')) {
            unlink(public_path('posts/' . $post->image));
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $new_name;
        $post->published = $request->published;
        $post->published_at = $request->published_at;
        $post->save();

        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {
        $post = \App\Models\Posts::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function published()
    {
        $posts = \App\Models\Posts::published()->get();
        return view('posts.index', compact('posts'));
    }


    public function unpublished()
    {
        $posts = \App\Models\Posts::unpublished()->get();
        return view('posts.index', compact('posts'));
    }

    public function publishedAt()
    {
        $posts = \App\Models\Posts::publishedAt()->get();
        return view('posts.index', compact('posts'));
    }


    public function search(Request $request)
    {
        $posts = \App\Models\Posts::where('title', 'like', '%' . $request->search . '%')->get();
        return view('posts.index', compact('posts'));
    }
}
