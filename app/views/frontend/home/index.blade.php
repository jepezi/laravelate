@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
@parent
- Home
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Hi there!</h1>


@stop