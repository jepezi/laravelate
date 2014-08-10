<div class="nav">
    <a href="/">Home</a> 
@if ($app->loggedin)
    <a href="{{ route('account.edit') }}">Edit Account</a> <a href="{{ URL::route('session.destroy') }}">Log out</a>
@else
<a href="{{ URL::route('comeonin') }}">Come on in</a>
@endif
    </div>