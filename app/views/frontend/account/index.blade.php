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
<h1>Account</h1>

<div class="layout  layout--large">
	
	<div class="layout__item  lap-and-up-one-half  desk-one-fifth" data-ui-component="Account Main">

		@if (! $app->user->avatar)
		{{ Form::imageUpload('/assets/images/avatar_default.jpg', '/ajax/uploadAndSaveAvatar', 'Upload Image', 'avatar', '(size 240x240)') }}
		<!-- <img src="/assets/images/avatar_default.jpg" alt=""> -->
		@else
		{{ Form::imageUpload( $app->user->avatar, '/ajax/uploadAndSaveAvatar', 'Change Image', 'avatar', '(size 240x240)') }}
		<!-- <img src="{{ $app->user->avatar }}" alt=""> -->
		@endif
			
		</div
	><div class="layout__item  lap-and-up-one-half  desk-four-fifths" data-ui-component="Edit Account">

			<h3>Account Information</h3>
			
			<dl class="table-display">
				<dt>Email</dt
				><dd>{{{ $app->user->email }}}</dd>

				@if (! $app->user->uid)

				<dt>Password</dt
				><dd><a href="{{route('account.change_password')}}">Change Password</a></dd>

				@endif
				</dl>

			<h3>Personal Information</h3>
			
			<dl class="table-display">
				<dt>Name</dt
				><dd>{{{ $app->user->first_name . ' ' . $app->user->last_name}}}</dd>

				<dt>Message</dt
				><dd>{{{ ! empty($app->user->message) ? $app->user->message : 'No message' }}}</dd>

				<dt>Website</dt
				><dd>{{{ ! empty($app->user->website) ? $app->user->website : 'No website' }}}</dd>

				<dt>Twitter</dt
				><dd>{{{ ! empty($app->user->twitter) ? $app->user->twitter : 'No twitter' }}}</dd>

				<dt>Gender</dt
				><dd>{{{ ! empty($app->user->gender) ? $app->user->gender : 'No gender' }}}</dd>

				</dl>

				<a href="{{route('account.edit')}}">Edit</a>


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

