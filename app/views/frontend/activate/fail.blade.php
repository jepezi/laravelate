@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Activation Fail - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')

<h1>Activation fails.</h1>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Edit Account">
		<h3>Please try activating your account again.</h3>
		<p>There is some error. The best way is to try activating your account again by logging into your account page and click "Resend Activation Code".</p>
		</div>
	</div>
@stop