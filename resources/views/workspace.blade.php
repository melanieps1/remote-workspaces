@extends('layouts.map')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

	<div class="smallSearch">
    <form method="POST" action="/workspaces/search" id="location-form">
        <div class="searchDiv">
            <div class="orangeAccentSm"></div>
            <input class="searchBarSm" type="text" placeholder="Enter a location (city or zip code)" name="location-search-bar">
        </div>
      <input name="_method" type="hidden" value="POST">
      {{ csrf_field() }}
      <button type="submit" name="button" value="search" class="searchBtnSm">
        <i class="fa fa-search searchIconSm" aria-hidden="true"></i>
        Modify Search
      </button>
    </form>
  </div>

  <div class="workspaceMain">
  	<div>
  		<h2>{{ $workspace->name }}</h2>
  		<div class="rating-sm">
        <p class="ratings-text">9.0</p>
      </div>
    </div>
  	<h5>{{ $workspace->category->name }}</h5>
  	<p>{{ $workspace->address }}</p>
	@if ($workspace->website === null)
		<!-- TODO: This isn't working yet -->
	@else
  	<a href="{{ $workspace->website }}" target="_blank" class="blueLink"><i class="fa fa-external-link" aria-hidden="true"></i>View Website</a>
	@endif
		<p>{{ $workspace->description }}</p>
		<hr>

		<h3>Reviews</h3>

		<ul>
			
		@foreach ($ratings as $rating)
			<li>{{ $rating->review }}</li>
			<li>{{ $rating->user->username }} • {{ $rating->updated_at }}</li>
		@endforeach

		</ul>
	</div>

</div>
@endsection