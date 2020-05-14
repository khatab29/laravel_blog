@extends('layouts.admin')
@section('content')
@include('sections.sidebar')
@include('sections.header')

                <div id="wrapper">
                    <div id="page" class="container">
                        <div id="content">
                            <div class="title">
                                <h1 class="center">{{$post->title}}</h1>
                                <span class="byline">{{$post->summary}}</span> </div>
                            <p><img src="{{$post->image}}" alt="" class="img-fluid img-thumbnail rounded" width="100%"> </p>
                            <p>{{$post->content}}.</p>
                        </div>
                    </div>
                </div>

@include('sections.footer')
@endsection
@section('posts-js')
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/colors.js"></script>
@endsection

