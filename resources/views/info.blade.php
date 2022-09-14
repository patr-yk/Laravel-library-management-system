@extends('layouts.app')
@section('content')
	<div id="admin-content">
		<div class="container">
			<p>{{ $message }}</p>
			<a class="add-new" href="{{ route($redirect); }}">Ok</a>
		</div>
	</div>
@endsection
