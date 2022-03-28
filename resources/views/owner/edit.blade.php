@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Upravit vlastíka</h2>
            </div>
						<div class="offset-md-7 col-md-2">
              <a class="add-new" href="{{ route('owners') }}">Zpět</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('owner.update', $owner->id) }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Jmnéno vlastníka</label>
                        <input type="text" class="form-control @error('name') isinvalid @enderror" name="name"
                            value="{{ $owner->name }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" name="submit" class="btn btn-danger" value="uložit" required>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
