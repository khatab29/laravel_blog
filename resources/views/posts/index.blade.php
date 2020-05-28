@extends('layouts.admin')
@section('content')
<body class="c-app">
@include('sections.sidebar')
@include('sections.header')
<body class="c-body">

        <main class="c-main">
          <div class="container-fluid">
              
           
            
            <div class="fade-in">
              <div class="card">
                <div class="card-header"><h3 class="text-center">Blog Posts</h3></div>
                <div class="card-body">

                    @if(session()->has('message'))
                    
                    <div class="alert alert-success fade-out" role="alert">
                        {{ session()->get('message') }}
                        {{ session()->forget('message') }}
                      </div>
                      @endif

                   
                  <div class="row">
                    

                    @foreach ($posts as $post)
                    <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div style="padding-top:75%">
                      <img src="{{$post->image}}" class="img-fluid rounded img-thumbnail">
                      </div>
                    <a class="button-info" href="{{route('posts.show',['post' => $post->id])}}"><h5>{{$post->title}}</h5></a>
                      <h6>{{$post->summary}}</h6>
                    </div>
                    @endforeach
           
                  </div>
                </div>
              </div>

            </div>
            {{ $posts->links() }}

          </div>
        </main>
        
@include('sections.footer')
@endsection
@section('posts-js')
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/colors.js"></script>
@endsection

