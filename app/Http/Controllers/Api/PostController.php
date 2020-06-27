<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Posts as PostResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;


//etag: b3989d832143af4c82c7bf0daee1bc78



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Cache::forget($request->fullUrl());
        /*
        return Cache::remember($request->fullUrl(), now()->addMinutes(15), function () {
        return new PostCollection(Post::paginate(20));
        });
        */
        $response = response(Cache::remember($request->fullUrl(), now()->addMinutes(15), function () {
            return new PostCollection(Post::paginate(20));
            }));
        return $response
        ->header('Cache-Control', 'public')
        ->header('etag', md5($response->getContent()));


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
        $validator = Validator::make($request->all(),[
        'title' => 'required|max:35',
        'summary' => 'required|min:50|max:100',
        'content' => 'required|min:150|max:600',
        'image' => 'required'
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
        $validator = Validator::make($request->all(), [
        'title' => 'required|max:35',
        'summary' => 'required|min:50|max:100',
        'content' => 'required|min:150|max:600',
        'image' => 'required'
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
