@extends('layouts.admin')
@section('content')
<body class="c-app">

@include('sections.sidebar')
@include('sections.header')
<div class="c-body">
    <main class="c-main">
        <div class="fade-in">
        <div class="container-fluid">
                <div id="wrapper">
                    <div id="page" class="container">
                        
                            <div class="title">
                                <h1 class="center">{{$post->title}}</h1>
                            </div> 
                            <div class="body">
                            <p><img src="{{$post->image}}" alt="" class="img-fluid img-thumbnail rounded" width="100%"> </p>
                            <p>{{$post->content}}.</p>
                            </div>
                    </div>
               <div class="row"> 
            <form action="{{route('posts.destroy',['post'=>$post->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure want to delete this post')">Delete</button>               
               </form>
            <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-info">Edit</a>
               </div>
        </div>
        </div>
    </main>
    

@include('sections.footer')
@endsection
@section('posts-js')
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/colors.js"></script>
@endsection

