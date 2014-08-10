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
	<div class="layout__item  lap-and-up-one-half  desk-two-fifths" data-ui-component="Main content">
		<h3>Log in</h3>
		{{ Form::open(['route' => 'session.store']) }}
			<div class="form-item">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="john_doe@example.com" value="{{{ Input::old('email') }}}" />
			</div>

			<div class="form-item">
			<label for="password">Password</label>
			<input type="password" id="toggle-password-login" name="password" placeholder="Set your password" />
			<small>At least 6 characters</small>
			</div>

			<input type="submit" value="Submit" class="btn btn--full">
			{{ Form::close() }}
		</div
	><div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Sub content">
		<h3>Sign up</h3>
		{{ Form::open(['route' => 'signup']) }}
			<div class="form-item">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="john_doe@example.com" value="{{{ Input::old('email') }}}" />
			</div>

			<div class="form-item">
			<label for="password">Password</label>
			<input type="password" id="toggle-password-signup" name="password" placeholder="Set your password" />
			<small>At least 6 characters</small>
			</div>

			<!-- <div class="form-item">
			<label for="name">First Name</label>
			<input type="text" name="first_name" placeholder="John Doe" />
			</div>

			<div class="form-item">
			<label for="name">Last Name</label>
			<input type="text" name="last_name" placeholder="John Doe" />
			</div>

			<div class="form-item">
			<label for="website">Website:</label>
			<input type="text" name="website" placeholder="http://example.com" disabled />
			</div>

			<div class="form-item">
			<label for="gender">Gender:</label>
			<input type="radio" name="gender" value="Male" /> Male <br />
			<input type="radio" name="gender" value="Female" /> Female
			</div>

			<div class="form-item">
			<label for="interest">Inquiry:</label>
			<input type="checkbox" name="interest" value="Quote" /> Quote <br />
			<input type="checkbox" name="interest" value="Question" /> Question
			</div>

			<div class="form-item">
			 <select>
			   <option name="Test">Test</option>
			 </select>
			</div>

			<div class="form-item">
			<label for="message">Message:</label>
			<textarea name="message"></textarea>
			</div> -->

			<input type="submit" value="Submit" class="btn btn--full">
			{{ Form::close() }}

	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/togglepassword.js') }}"></script>
@stop

