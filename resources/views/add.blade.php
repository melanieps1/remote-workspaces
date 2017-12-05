@extends('layouts.app')

@section('content')
<div class="homeBlade">
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

	<h1>Add a Workspace</h1>

	<form method="POST" action="#">
    {{ csrf_field() }}

    <div>
      <label>Name</label>
      <div>
        <input type="text" name="name" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Category</label>
      <div>
        <input type="text" name="category" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Description</label>
      <div>
        <input type="text" name="description" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Website</label>
      <div>
        <input type="text" name="website" placeholder="Enter name of workspace" class="logInInput" autofocus>
      </div>
    </div>

    <div>
      <label>Address</label>
      <div>
        <input type="text" name="address" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Latitude</label>
      <div>
        <input type="hidden" name="latitude" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Longitude</label>
      <div>
        <input type="hidden" name="longitude" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>

    <div>
      <label>Submitted By</label>
      <div>
        <input type="hidden" name="submitted_by" placeholder="Enter name of workspace" class="logInInput" required autofocus>
      </div>
    </div>
    
    <button type="submit" class="authBtn">
      Add Workspace
    </button>

	</form>

</div>
@endsection