@extends('layouts.admin')
@section('homepage-style')
<link href="{{asset('vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet')}}">
@endsection
@section('content')  
<body class="c-app">
@include('sections.sidebar')      
@include('sections.header')
@include('sections.online-members')
@include('sections.traffic-chart')
@include('sections.feedback')
@include('sections.traffic')
@include('sections.sales')
@include('sections.footer')
@endsection
@section('homepage-js')
<script src="{{asset('vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js')}}"></script>
<script src="{{asset('vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection