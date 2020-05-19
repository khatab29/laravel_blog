@extends('layouts.admin')
@section('content')
<body class="c-app">

@include('sections.sidebar')
@include('sections.header')


<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card-group">
<div class="card p-4">
<div class="card-body">
<h1 class="text-center">Post Edit</h1>

<form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
@csrf
@method('put')

<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-highlighter')}}"></use>
</svg></span></div>
<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title}}" autofocus placeholder="Post Title">
@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="input-group mb-4">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-highlighter')}}"></use>
</svg></span></div>
<input id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary"  autocomplete="summary" value="{{$post->summary}}" placeholder="Post Summary">
@error('summary')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="input-group mb-4">
    <div class="input-group-prepend"><span class="input-group-text">
        Post Image
    </span></div>
    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   value="{{$post->image}}" >
    @error('image')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>



<div class="input-group mb-4">
<div class="input-group-prepend"><span class="input-group-text">
Post Content</div>
<textarea id="content"  class="form-control @error('content') is-invalid @enderror" name="content"  rows="10">{{$post->content}}</textarea>
@error('content')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div >
<button class="btn btn-primary btn-block" type="submit" name="admin-submit">Edit</button>
</div>
</form>
</div>
</div>


</div>
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

