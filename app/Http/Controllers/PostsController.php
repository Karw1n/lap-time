<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts,title',
            'excerpt' => 'required',
            'body' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        // data needs to be validated
            $post = new Post;
            $post->title = $validatedData['title']; 
            $post->excerpt = $validatedData['excerpt'];
            $post->body = $validatedData['body'];
            $post->image_path = $this->storeImage($request);
            $post->save();
            

            session()->flash('message', 'Post was created.');
            return redirect()->route('blog.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('message', 'Post was deleted.');
    
    }

    private function storeImage($request) 
    {
        $newImageName = uniqid() . '-' . $request->title . '.'.
        $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
