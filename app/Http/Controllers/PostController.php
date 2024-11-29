<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *     $post = Post::create($request->all());

     */
    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            $imageNames = [];
            foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/images/posts"), $imageName);
            $imageNames[] = $imageName;
            }
            $imageNamesString = implode(',', $imageNames);
    }
        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $imageNamesString
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($request->hasFile("image")) {
            $imageNames = [];
            foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/images/posts"), $imageName);
            $imageNames[] = $imageName;
            }
            $imageNamesString = implode(',', $imageNames);
    } else {
        $imageNamesString = $post->image;
    }
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $imageNamesString
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }
}
