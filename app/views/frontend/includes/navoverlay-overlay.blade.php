<div id="navoverlay">
	<div class="navoverlay-top">
		<div class="navoverlay-top-links">
			<ul>
				@if ($app->loggedin)
					<li><a href="{{ route('account.index') }}" class="link-secret">{{ $app->user->first_name . ' ' . $app->user->last_name }}</a> <small><a href="{{ URL::route('session.destroy') }}" class="link-secret">Log out</a></small></li>
				@else
					<li><a href="{{ URL::route('comeonin') }}" class="link-secret">Come on in</a></li>
				@endif
				</ul>
			</div>
		</div>
	<nav id="nav" class="navoverlay-body">
		<ul>
		<li><a href="#" class="link-secret">Menu 1</a></li>
		<li><a href="#" class="link-secret">Menu 2</a></li>
		<li><a href="#" class="link-secret">Menu 3</a></li>
		<li><a href="#" class="link-secret">Menu 4</a></li>
		</ul>
		<a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>
		</nav>
	<footer>
		<a href="#">Terms of Service</a> <a href="#">Privacy Policy</a>
		<div>© 2014 Company. All rights reserved.</div>
		</footer>
</div>