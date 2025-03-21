<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/PostsController.php
    // app/Http/Controllers/PostsController.php
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:10048', // Increased size limit to 10MB
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . str_replace(' ', '-', $request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        // Generate a unique slug
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $uniqueSlug = $slug;
        $counter = 1;

        // Ensure the slug is unique
        while (Post::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        // Create the post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $uniqueSlug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Fetch the current post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Fetch related posts (e.g., posts by the same author)
        $relatedPosts = Post::where('user_id', $post->user_id)
            ->where('id', '!=', $post->id) // Exclude the current post
            ->inRandomOrder() // Randomize the order
            ->limit(3) // Limit to 3 posts
            ->get();

        // Pass the post and related posts to the view
        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048', // Image is optional
            'delete_image' => 'nullable|boolean', // Checkbox for deleting the image
        ]);

        // Find the post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Handle image deletion if the checkbox is checked
        if ($request->has('delete_image') && $request->delete_image) {
            // Delete the old image if it exists
            if ($post->image_path && file_exists(public_path('images/' . $post->image_path))) {
                unlink(public_path('images/' . $post->image_path));
            }
            $post->image_path = null; // Remove the image path from the database
        }

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image_path && file_exists(public_path('images/' . $post->image_path))) {
                unlink(public_path('images/' . $post->image_path));
            }

            // Upload the new image
            $newImageName = uniqid() . '-' . str_replace(' ', '-', $request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $post->image_path = $newImageName;
        }

        // Update the post
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $post->image_path, // Keep the existing image if no new image is uploaded
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }
}

