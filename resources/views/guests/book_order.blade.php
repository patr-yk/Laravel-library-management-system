@extends('layouts.guest')
@section('content')
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h2 class="admin-heading">Objednat knihy</h2>
			</div>
			<div class="offset-md-7 col-md-2">
				<a class="add-new" href="{{ route('view', $book->id) }}">Zpět</a>
			</div>
		</div>
		<div class="row">
			<div class="offset-md-3 col-md-6">
			<div class="yourform container">
				<div class="row mb-5">
					<div class="col-6"><h4><b>{{ $book->name }}</b></h4></div>
				</div>
				<form action="{{ route('order.store') }}" method="post" autocomplete="off">
					@csrf
					<input type="hidden" name="id" value="{{ $book->id }}">
					<div class="form-group">
						<label>Vaše jméno</label>
						<input type="text" class="form-control @error('name') isinvalid @enderror"
						placeholder="jméno" name="name" value="{{ old('name') }}" required>
						@error('name')
						<div class="alert alert-danger" role="alert">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control @error('email') isinvalid @enderror"
						placeholder="email" name="email" value="{{ old('email') }}" required>
						@error('email')
						<div class="alert alert-danger" role="alert">
							{{ $message }}
						</div>
						@enderror
					</div>
					<input type="submit" name="save" class="btn btn-danger" value="uložit" required>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection
