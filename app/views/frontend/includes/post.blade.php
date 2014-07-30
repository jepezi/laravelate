@if (count($post) > 0)

        <div class="post">
        	<h3><a href="{{ URL::route('click.to', Hasher::encrypt($post->id) ) }}" target="_blank">{{ $post->title }}</a></h3>
        	<p class="summary">{{ $post->caption }}</p>
            <small class="date"><i class="fa fa-hand-o-up"></i> {{ $post->click_total }} | {{ $post->created_at->diffForHumans() }}</small>
        	<div class="_type"><img src="/assets/images/icon-type-{{ $post->type }}.png" alt=""></div>
        	<ul class="_genres">
        	@foreach ($post->genres as $genre)
    			<li><img src="{{ $genre->icon }}" alt=""></li>
        	@endforeach
        		</ul>
        	<div class="preview-link">
                <a href="{{ URL::route('click.to', Hasher::encrypt($post->id) ) }}" target="_blank">
        		<div class="_img">
		        	<img src="{{ $post->p_images }}" alt="">
		        	</div>
		        <div class="_meta">
		        	<div class="__headline">
		        		<div class="___title">{{ $post->p_title }}</div>
		        		<div class="___url">{{ $post->simplerurl }}</div>
		        		</div>
		        	<div class="__description">
		        		{{ $post->p_description }}
		        		</div>    
		        	</div>
                </a>
	        	</div>
        </div>

@else
    Oh! No Posts!
@endif