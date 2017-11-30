@extends('layouts.app')

@section('content')
<div class="homeBlade">
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

	<div class="floatingForm">
		<h2>Find workspaces in your city</h2>
            <div>
                <form method="POST" action="/workspaces/search" id="location-form">
                    <div class="searchDiv">
                        <div class="orangeAccent"></div>
                        <input class="searchBarHome" type="text" placeholder="Enter a location (city or zip code)" name="location-search-bar">
                    </div>
                	<input name="_method" type="hidden" value="POST">
                	{{ csrf_field() }}
    			    <button type="submit" name="button" value="search" class="searchBtnHome">
                        <i class="fa fa-search searchIconHome" aria-hidden="true"></i>
    			    	Search
    			    </button>
              	</form>
            </div>
            <br><br><br>
            <p class="grayText">
                Whether you are in your hometown or a new city, use Remote Workspaces to find a spot that fits your needs so you can confidently work from anywhere.
            </p>
	</div>

</div>
@endsection