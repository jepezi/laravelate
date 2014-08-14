@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Reset Password - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Reset Your Password</h1>
<p>Complete the form below by entering your email address and resetting password (and confirm it). Hit the "Reset Password" button and your password will be reset.</p>

<div class="layout  layout--large">
	<div class="layout__item lap-and-up-one-whole" data-ui-component="Password Remind">

		{{ Form::open(['action' => 'RemindersController@postReset']) }}
		
			<input type="hidden" name="token" value="{{ $token }}">
			{{ Form::emailField('email', null, ['placeholder' => 'youremail@example.com'], 'Enter your email address') }}
			{{ Form::passwordField('password', ['placeholder' => 'Enter your new password'], 'New Password') }}
			{{ Form::passwordField('password_confirmation', ['placeholder' => 'Type your new password again to confirm'], 'Confirm New Password') }}

			<input type="submit" value="Reset Password" class="btn btn--full">
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