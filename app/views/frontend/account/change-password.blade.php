@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Change Password - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Change Password</h1>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Edit Account">
		<h3>Change Password here</h3>
		{{ Form::open(['role' => 'form']) }}
			<!-- <div class="form-item {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="john_doe@example.com" value="{{{ Input::old( 'email' , $app->user->email) }}}" class="{{ $errors->has('email') ? 'error' : '' }}" />
			</div> -->
			{{ Form::passwordField('current_password', ['id' => 'toggle-password-current', 'placeholder' => 'Current Password'], 'Current Password') }}
			{{ Form::passwordField('password', ['id' => 'toggle-password-new', 'placeholder' => 'Enter your new password'], 'New Password') }}


			<input type="submit" value="Change Password" class="btn btn--full">
			{{ Form::close() }}
		</div>
	</div>
@stop


@section ('foot-script')
<script type="text/javascript" src="{{ asset('assets/vendor/ShowPasswordCheckbox.js') }}"></script>
<script type="text/javascript">
	new ShowPasswordCheckbox(document.getElementById("toggle-password-current"));
	new ShowPasswordCheckbox(document.getElementById("toggle-password-new"));
</script>
@stop

