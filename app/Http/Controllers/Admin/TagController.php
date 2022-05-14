<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(3);

        return view('admin.tags.index',[
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        if(!Tag::where('name',$request->tag)->count()){
            Tag::create(['name' => $request->tag]);
            return redirect()->route('admin.tags.index')
                     ->with('success','Your tag has been added');
        }

        return back()->with('error','This tag is already exist!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {

        return view('admin.tags.edit',[
            'tag' => $tag
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        $tag->update([
            'name' => $request->tag,
        ]);

        return redirect()->route('admin.tags.index')
                        ->with('success','Your tag has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts()->count()){
            return back()->with('error','This tag has posts and can\'t be deleted!');
        }

        $tag->delete();
        return redirect()->route('admin.tags.index')
                        ->with('success','Your tag has been deleted');
    }
}
