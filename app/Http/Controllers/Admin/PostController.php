<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\EditPostRequest;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {   
       $post =  auth()->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            
        ]);

        $tags = explode(', ',$request->tags);
        
        //create the tag if it doesn't exist and create the associated column in the pivot table
        foreach($tags as $tagName){
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }      

        
        return redirect()->route('admin.posts.index')
                        ->with('success','Your post has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = $post->tags->implode("name",", ");
        
        return view('admin.posts.edit',[
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
        ]);
        
        $tags = explode(", ",$request->tags);

        $newTags =[];
        foreach($tags as $tagName){
            $tag = Tag::firstOrCreate(['name' => $tagName]);
           array_push($newTags,$tag->id);
        }      

       $post->tags()->sync($newTags);
        
       return redirect()->route('admin.posts.index')
                        ->with('success','Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')
                        ->with('success','Your post has been deleted');
    }
}
