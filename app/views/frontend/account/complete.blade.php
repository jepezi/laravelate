@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Edit Account - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Congrats! You're in</h1>
<h2>Last step.</h2>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Edit Account">
		<h3>Complete Your Account Information</h3>
		{{ Form::open(['role' => 'form']) }}

			{{ Form::emailField('email', $app->user->email, ['placeholder' => 'john_doe@example.com', 'disabled' => 'disabled']) }}

			{{ Form::textField('first_name', null, ['placeholder' => 'John']) }}

			{{ Form::textField('last_name', null, ['placeholder' => 'Doe']) }}

			<div class="form-item">
			<label for="message">Message</label>
			<textarea name="message" placeholder="Your short message about yourself">{{{ $app->user->message }}}</textarea>
			</div>

			{{ Form::textField('website', null, ['placeholder' => 'http://example.com']) }}

			{{ Form::textField('twitter', null, ['placeholder' => 'http://twitter.com/example']) }}

			<div class="form-item">
			<label for="gender">Gender:
			<input type="radio" name="gender" value="Male" {{{ $app->user->gender === 'Male' ? 'checked' : '' }}} /> Male <br />
			<input type="radio" name="gender" value="Female" {{{ $app->user->gender === 'Female' ? 'checked' : '' }}} /> Female
			</label>
			</div>

			<input type="submit" value="Next" class="btn btn--full">
			{{ Form::close() }}
		</div>
	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/togglepassword.js') }}"></script>
@stop

