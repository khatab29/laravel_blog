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



            //virtual host settings
            <VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:\xampp\htdocs\blog\public"
    ServerName blog.local
    ServerAlias dashbaord.blog.local
    ##ErrorLog "logs/dummy-host2.example.com-error.log"
    ##CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:\xampp\htdocs\laracast_blog\public"
    ServerName laracast_blog.local
    ServerAlias dashbaord.laracast_blog.local
    ##ErrorLog "logs/dummy-host2.example.com-error.log"
    ##CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:\xampp\htdocs\admin_dashboard\public"
    ServerName admin_dashboard.local
    ServerAlias dashbaord.admin_dashboard.local
    ##ErrorLog "logs/dummy-host2.example.com-error.log"
    ##CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>


        127.0.0.1       localhost
        127.0.0.1       blog.local
        127.0.0.1       laracast_blog.local
        127.0.0.1       admin_dashboard.local



