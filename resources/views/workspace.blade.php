@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

<br><br><br><br>
    This is workspace.blade.php showing.  This will be where one workspace displays with more info.

</div>
@endsection