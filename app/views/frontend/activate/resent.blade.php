@extends('frontend.layouts.master')

{{-- ==========  Title  ========== --}}
@section('title')
Activate your account - 
@parent
@stop


{{-- ==========  Head script  ========== --}}
@section ('head-script')
@stop


{{-- ==========  Content  ========== --}}
@section('content')
@include('frontend.includes.noti')
<h1>Activation link sent!</h1>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Edit Account">
		<h3>Activate your account from the link in your email</h3>
		<p>We just sent you an email with the link to activate your account. Simply click the link in the email and your account will be activated.</p>
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

