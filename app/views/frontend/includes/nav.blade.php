<div class="nav">
    <a href="/">Home</a> 
@if ($app->loggedin)
 <a href="{{ route('account.index') }}">{{ $app->user->first_name . ' ' . $app->user->last_name }}</a> <a href="{{ URL::route('session.destroy') }}">Log out</a>
@else
<a href="{{ URL::route('comeonin') }}">Come on in</a>
@endif
    </div>