<header id="top" role="banner">
        <div class="block">
            <h1 class="block-title"><a href="/">Laravelate</a></h1>
            <ul class="navmain">
				<li><a href="#" class="link-secret">Menu 1</a></li>
				<li><a href="#" class="link-secret">Menu 2</a></li>
				<li><a href="#" class="link-secret">Menu 3</a></li>
				<li><a href="#" class="link-secret">Menu 4</a></li>
				</ul>
            <a class="nav-btn" id="nav-open-btn" href="#nav">Navigation</a>
            <ul class="navsecondary">
				@if ($app->loggedin)
				<li><a href="{{ route('account.index') }}" class="link-secret">{{ $app->user->first_name . ' ' . $app->user->last_name }}</a> <small><a href="{{ URL::route('session.destroy') }}">Log out</a></small></li>
				@else
				<li><a href="{{ URL::route('comeonin') }}">Come on in</a></li>
				@endif
				</ul>
	        </div>
		

    </header>