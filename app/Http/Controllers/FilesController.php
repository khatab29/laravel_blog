<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\PostsExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


use App\Post;

class FilesController extends Controller
{
    public function postsExport()
    {
        if(!Auth::user()){
        alert()->error('Error','you are not logged in');
        return redirect()->back();
        }
        $posts = Post::all();
        $file = public_path('\storage\posts.csv');
        $handle = fopen($file, 'w');
        foreach($posts as $post){
            fputcsv( $handle, $post->toArray(), ',');
        }
        Mail::to(Auth::user()->email )->send(new PostsExport())?
        alert()->success('success', 'an email had been sent to you email address'):
        alert()->error('Error','Operation Failed');
        return redirect()->back();
       

        
    }














}
