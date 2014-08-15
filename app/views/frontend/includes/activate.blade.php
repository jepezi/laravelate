@if ($app->loggedin && Config::get('auth.activate') && ! (Request::is('activate') || Request::is('account/activate') || Request::is('activate/resent')) )
	@if (! $app->user->activated)
	<div class="warn">
		Your account has not been activated. Please <a href="{{ route('account.activate') }}">activate your account</a>.
		</div>
	@endif
@endif