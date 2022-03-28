@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Přidat knihu</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('books') }}">Zpět</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Název</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Název knihy" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>ISBN</label>
                            <input type="text" class="form-control @error('isbn') isinvalid @enderror"
                                placeholder="ISBN" name="isbn" value="{{ old('isbn') }}" required>
                            @error('isbn')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategorie</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id" required>
                                <option value="">Vyberte kategorii</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Autor</label>
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="auther_id" required>
                                <option value="">Vyberte Autora</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>";
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Vydavatel</label>
                            <select class="form-control @error('publisher_id') isinvalid @enderror " name="publisher_id" required>
                                <option value="">Vyberte vydavatele</option>
                                @foreach ($publishers as $publisher)
                                    <option value='{{ $publisher->id }}'>{{ $publisher->name }}</option>";
                                @endforeach
                            </select>
                            @error('publisher_id')
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

@endsection
