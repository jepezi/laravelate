@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
@parent
Oops!
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Page not found.</h1>
<p>We're sorry about that. The page you're going to is not found.</p>


@stop