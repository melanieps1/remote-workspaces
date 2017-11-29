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
        <form>
            <div class="searchDiv">
                <!-- <span class="orangeAccent"></span> -->
                <input class="searchBarHome" type="text" placeholder="Enter a location (city or zip code)">
            </div>
        </form>
        <form method="POST" action="/results">
        	<input name="_method" type="hidden" value="POST">
        	{{ csrf_field() }}
        		<div>
    			    <button type="submit" name="button" value="search">
    			    	See Results
    			    </button>
    		  	</div>
      	</form>
	</div>

</div>
@endsection