@section("header")
	<div class="cover">
		<img src="/assets/images/profile.jpg" />
	</div>
	<div class="navigation">
		<a href="{{ URL::route('connect') }}">Connect</a>
    	<a href="{{ URL::route('create') }}">Create</a>
    	<a href="{{ URL::route('contact') }}">Contact</a>
	</div>
@show