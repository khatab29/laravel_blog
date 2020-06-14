<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostValidation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Jobs\PostsExportToCsv;
use Illuminate\Support\Facades\Cache;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request()->has('page') ? request()->get('page') : 1;
       //Cache::forget('all-posts' . '_page_' . $page);
        $posts = Cache::remember('all-posts' . '_page_' . $page, now()->addMinutes(15), function () {
        return Post::paginate(20);
        });
        return view('posts.index',['posts' => $posts])->render();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
       return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidation  $request, Post $post)
    {
        $validated = $request->validated();
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->image = $request->image;
        $post->content = $request->content;
        $post->save()? alert()->success($post->title, 'Was Updated Successfully') :
        alert()->error('Error','Operation Failed');
        return redirect(route('posts.show',['post'=>$post->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $post->delete()? alert()->success($post->title, 'Was Deleted Successfully'):
        alert()->error('Error','Operation Failed');
        return redirect(route('posts.index'));
    }



    public function postsExport()
    {
        if(!Auth::user()){
        alert()->error('Error','you are not logged in');
        return redirect()->back();
        }
        $posts = Post::all();
        $user =  Auth::user();
        PostsExportToCsv::dispatch($posts, $user)?
        alert()->success('success', 'an email had been sent to you email address'):
        alert()->error('Error','Operation Failed');
        return redirect()->back();



    }




























}
