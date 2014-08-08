@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  {{ Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Attention!</strong> {{ Session::get('error')}}
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Attention!</strong> {{ Session::get('info')}}
</div>
@endif

@if ( $errors->count() > 0 )
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5>There were errors during registration:</h5>
                             @foreach($errors->all('<li>:message</li>') as $message)
                                {{$message}}
                             @endforeach
</div>
@endif