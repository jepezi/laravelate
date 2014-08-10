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
		{{ Form::open(['method' => 'put', 'role' => 'form']) }}
			<div class="form-item">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" placeholder="John Doe" value="{{{ Input::old( 'first_name' , $app->user->first_name) }}}" {{ $errors->has('first_name') ? 'class="error"' : '' }} />
			</div>

			<div class="form-item">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" placeholder="John Doe" value="{{{ Input::old( 'last_name' , $app->user->last_name) }}}" {{ $errors->has('last_name') ? 'class="error"' : '' }} />
			</div>

			<div class="form-item">
			<label for="message">Message</label>
			<textarea name="message" placeholder="Your short message about yourself" value="{{{ Input::old( 'message' , $app->user->message) }}}"></textarea>
			</div>

			<div class="form-item">
			<label for="website">Website:</label>
			<input type="text" name="website" placeholder="http://example.com" value="{{{ Input::old( 'website' , $app->user->website) }}}" />
			</div>

			<div class="form-item">
			<label for="twitter">Twitter:</label>
			<input type="text" name="twitter" placeholder="http://example.com" value="{{{ Input::old( 'twitter' , $app->user->twitter) }}}" />
			</div>

			<div class="form-item">
			<label for="gender">Gender:
			<input type="radio" name="gender" value="Male" {{{ $app->user->gender === 'Male' ? 'checked' : '' }}} /> Male <br />
			<input type="radio" name="gender" value="Female" {{{ $app->user->gender === 'Female' ? 'checked' : '' }}} /> Female
			</label>
			</div>

			<!-- <div class="form-item">
			<label for="interest">Inquiry:</label>
			<input type="checkbox" name="interest" value="Quote" /> Quote <br />
			<input type="checkbox" name="interest" value="Question" /> Question
			</div> -->

			<!-- <div class="form-item">
			 <select>
			   <option name="Test">Test</option>
			 </select>
			</div> -->


			<input type="submit" value="Submit" class="btn btn--full">
			{{ Form::close() }}

	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/togglepassword.js') }}"></script>
@stop

