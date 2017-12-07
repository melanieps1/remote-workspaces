@extends('layouts.app')

@section('content')
<div class="createBlade">
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <div class="floatingFormAdd">
      <h2 class="formHeader">Add a Workspace</h2>

    	<form method="POST" action="/workspaces">
        {{ csrf_field() }}

        <div>
          <label>Name</label>
          <div>
            <input type="text" name="name" placeholder="Enter name of workspace" class="addInput" required>
          </div>
        </div>

        <div>
          <label>Category</label>
          <div>
            <select class="addInput" name="category_id">
          @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
            </select>
          </div>
        </div>

        <div>
          <label>Description</label>
          <div>
            <textarea type="text" name="description" placeholder="Enter description" class="textInput" required></textarea>
          </div>
        </div>

        <div>
          <label>Website</label>
          <div>
            <input type="url" name="website" placeholder="https://www.example.com" class="addInput">
          </div>
        </div>

        <div>
          <label>Address</label>
          <div>
            <textarea type="text" name="address" placeholder="123 Main St, New York, NY, 10001" class="textInput" required></textarea>
          </div>
        </div>

        <div>
          <input type="hidden" name="latitude" required>
        </div>

        <div>
          <input type="hidden" name="longitude" required>
        </div>


        <div>
          <input type="hidden" name="submitted_by" required>
        </div>
        
        <div class="addBtnDiv">
          <button type="submit" name="button" value="addWorkspace" class="addBtn">
            Add Workspace
          </button>
        </div>

      </form>
    </div>

</div>
@endsection