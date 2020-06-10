<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostsExport;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsExportToCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $posts;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($posts,$user)
    {
        $this->posts = $posts;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $file = public_path('\storage\posts.csv');
        $handle = fopen($file, 'w');
        foreach($this->posts as $post){
        fputcsv( $handle, $post->toArray(), ',');
        }
        Mail::to($this->user->email )->send(new PostsExport());
        
        
    }
}
