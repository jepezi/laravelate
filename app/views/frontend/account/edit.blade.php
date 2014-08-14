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
<h1>Edit Account</h1>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-one-fifth" data-ui-component="Account Main">

			@if (! $app->user->avatar)
			{{ Form::imageUpload('/assets/images/avatar_default.jpg', '/ajax/uploadAndSaveAvatar', 'Upload Image', 'avatar', '(size 240x240)') }}
			<!-- <img src="/assets/images/avatar_default.jpg" alt=""> -->
			@else
			{{ Form::imageUpload( $app->user->avatar, '/ajax/uploadAndSaveAvatar', 'Upload Image', 'avatar', '(size 240x240)') }}
			<!-- <img src="{{ $app->user->avatar }}" alt=""> -->
			@endif

		</div
	><div class="layout__item  lap-and-up-one-half  desk-four-fifths" data-ui-component="Edit Account">

		{{ Form::open(['route' => 'account.edit' , 'role' => 'form']) }}

			<h3>Account Information</h3>

			{{ Form::emailField('email', $app->user->email, ['placeholder' => 'john_doe@example.com', 'disabled' => 'disabled']) }}


			@if (! $app->user->uid)

			<div class="form-item">
			<label for="password">Password</label>
			<p><a href="{{route('account.change_password')}}">Change Password</a></p>
			</div>

			@endif

			<h3>Personal Information</h3>


			<!-- <div class="form-item {{ $errors->has('first_name') ? 'has-error' : '' }}">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" placeholder="John Doe" value="{{{ Input::old( 'first_name' , $app->user->first_name) }}}" {{ $errors->has('first_name') ? 'class="error"' : '' }} />
			</div> -->
			{{ Form::textField('first_name', $app->user->first_name, ['placeholder' => 'John']) }}

			<!-- <div class="form-item {{ $errors->has('last_name') ? 'has-error' : '' }}">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" placeholder="John Doe" value="{{{ Input::old( 'last_name' , $app->user->last_name) }}}" {{ $errors->has('last_name') ? 'class="error"' : '' }} />
			</div> -->
			{{ Form::textField('last_name', $app->user->last_name, ['placeholder' => 'Doe']) }}

			<div class="form-item {{ $errors->has('message') ? 'has-error' : '' }}">
			<label for="message">Message</label>
			<textarea name="message" placeholder="Your short message about yourself">{{{ $app->user->message }}}</textarea>
			</div>

			<!-- <div class="form-item {{ $errors->has('website') ? 'has-error' : '' }}">
			<label for="website">Website:</label>
			<input type="text" name="website" placeholder="http://example.com" value="{{{ Input::old( 'website' , $app->user->website) }}}" />
			</div> -->
			{{ Form::textField('website', $app->user->website, ['placeholder' => 'http://example.com']) }}

			<!-- <div class="form-item {{ $errors->has('twitter') ? 'has-error' : '' }}">
			<label for="twitter">Twitter:</label>
			<input type="text" name="twitter" placeholder="http://example.com" value="{{{ Input::old( 'twitter' , $app->user->twitter) }}}" />
			</div> -->
			{{ Form::textField('twitter', $app->user->twitter, ['placeholder' => 'http://twitter.com/example']) }}

			<div class="form-item">
			<label for="gender">Gender:
			<input type="radio" name="gender" value="Male" {{{ $app->user->gender === 'Male' ? 'checked' : '' }}} /> Male <br />
			<input type="radio" name="gender" value="Female" {{{ $app->user->gender === 'Female' ? 'checked' : '' }}} /> Female
			</label>
			</div>


			<input type="submit" value="Save" class="btn btn--full">
		{{ Form::close() }}
		</div>
	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/togglepassword.js') }}"></script>

<script src="{{ asset('assets/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.fileupload.js') }}"></script>

<script src="{{ asset('assets/js/uploadSingleImage.js') }}"></script>
@stop

