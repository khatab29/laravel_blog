//Cache::forget($request->fullUrl());
/*
         $posts = Cache::remember($request->fullUrl(), now()->addMinutes(5), function () {
            return  Post::paginate(20);
        });
         return view('posts.index',['posts' => $posts])->render();

*/
         $posts = Post::paginate(20);
         $response = response(view('posts.index',['posts' => $posts])->render());
         return $response
            ->header('Cache-Control', ['max-age=3000','private']);
            //->header('etag', md5($response->getContent()));
            //->header('Cache-Control','private')
            //->header('Expires', now()->addMinutes(15));


