@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Forgot Password - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Can't Log in? Forgot Password?</h1>
<p>Enter your email address below and we'll send you password reset instructions.</p>

<div class="layout  layout--large">
	<div class="layout__item lap-and-up-one-whole" data-ui-component="Password Remind">

		{{ Form::open(['action' => 'RemindersController@postRemind']) }}
			
			{{ Form::emailField('email', null, ['placeholder' => 'youremail@example.com'], 'Enter your email address') }}

			<input type="submit" value="Send me reset instruction" class="btn btn--full">
		{{ Form::close() }}

		<h5>A note about spam filters</h5>
		<p>If you don't get an email from us within a few minutes please be sure to check your spam filter. The email will be coming from do-not-reply@basecamp.com.</p>
		
		<div><p>I think I remember it. <a href="{{ route('comeonin') }}">I will try logging in again.</a></p></div>

		</div>
	</div>
@stop

@section ('foot-script')
<script type="text/javascript">
$(function(){
	$("input[name='email']").focus();
});
</script>
@stop