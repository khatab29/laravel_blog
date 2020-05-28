<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Posts as PostResource;
use App\Http\Requests\PostValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return new PostCollection(Post::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
          $validator = Validator::make([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image
        ], [
            'title' => 'required|max:35',
            'summary' => 'required|min:50|max:100',
            'content' => 'required|min:150|max:600',
            'image' => ['required']
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return new PostResource(Post::create([
        'title' => $request->title,
        'summary' => $request->summary,
        'image' => $request->image,
        'content' => $request->content
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image
        ], [
            'title' => 'required|max:35',
            'summary' => 'required|min:50|max:100',
            'content' => 'required|min:150|max:600',
            'image' => ['required']
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->image = $request->image;
        $post->content = $request->content;
        $post->save();
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return new PostResource($post);

    }
}
