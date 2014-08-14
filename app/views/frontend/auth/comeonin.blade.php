@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Come on in - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Come on in</h1>

<div class="layout  layout--large">
	<div class="layout__item" data-ui-component="Login with Facebook">
		<a href="{{ URL::to('/auth/Facebook') }}" class="btn btn--full">Login with Facebook</a>
		</div>
	</div>
<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-two-fifths" data-ui-component="Main content">
		<h3>Log in</h3>
		{{ Form::open(['route' => 'session.store']) }}
			
			{{ Form::emailField('email_login', null, ['placeholder' => 'john_doe@example.com']) }}

			{{ Form::passwordField('password_login', ['id' => 'toggle-password-login', 'placeholder' => 'Set your password'], 'Password') }}


			<input type="submit" value="Login" class="btn btn--full">
			{{ Form::close() }}
			<div><p>Help: <a href="{{ action('RemindersController@getRemind') }}">I can't login or I forget my password.</a></p></div>
		</div
	><div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Sub content">
		<h3>Sign up</h3>
		{{ Form::open(['route' => 'signup']) }}
			<!-- <div class="form-item">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="john_doe@example.com" value="{{{ Input::old('email') }}}" />
			</div> -->
			{{ Form::emailField('email', null, ['placeholder' => 'john_doe@example.com']) }}

			{{ Form::passwordField('password', ['id' => 'toggle-password-signup', 'placeholder' => 'Set your password'], 'Password') }}

			<!-- <div class="form-item">
			<label for="password">Password</label>
			<input type="password" id="toggle-password-signup" name="password" placeholder="Set your password" />
			<small>At least 6 characters</small>
			</div> -->

			<input type="submit" value="Sign up" class="btn btn--full">
			{{ Form::close() }}
		</div>
	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/togglepassword.js') }}"></script>
@stop

