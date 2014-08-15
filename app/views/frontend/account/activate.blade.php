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
<h1>Activate your account</h1>

<div class="layout  layout--large">
	<div class="layout__item  lap-and-up-one-half  desk-three-fifths" data-ui-component="Edit Account">
		<p>At the time you successfully signed up with us previously, we sent an activation link to your email. However, it seems you haven't activated your account by clicking the link in the email.</p>
		<h4>Never get our email? Couldn't find it?</h4>
		<p>No problem! Just click the link below to resend the activation link to your email.</p>
		<a href="{{ route('account.resendcode') }}">Resend Activation Link to my email</a>
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

