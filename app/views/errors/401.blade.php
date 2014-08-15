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
<h1>Too bad. You are not authorized to view this page.</h1>
<p>We're sorry about that. Please go back to the page before.</p>


@stop