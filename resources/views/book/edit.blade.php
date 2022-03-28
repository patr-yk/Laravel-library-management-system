@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Upravit knihu</h2>
                </div>
								<div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('books') }}">Zpět</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Název knihy</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Název knihy" name="name" value="{{ $book->name }}" >
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>ISBN</label>
                            <input type="text" class="form-control @error('isbn') isinvalid @enderror"
                                placeholder="ISBN" name="isbn" value="{{ $book->isbn }}" >
                            @error('isbn')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategorie</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id"
                                >
                                <option value="">Vyberte kategorii</option>
                                @foreach ($categories as $category)
                                    @if ($category->id == $book->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
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
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="author_id">
                                <option value="">Vyberte autora</option>
                                @foreach ($authors as $auther)
                                    @if ($auther->id == $book->auther_id)
                                        <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                                    @else
                                        <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                    @endif
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
                            <select class="form-control @error('publisher_id') isinvalid @enderror "
                                name="publisher_id" >
                                <option value="">Vyberte vydavatele</option>
                                @foreach ($publishers as $publisher)
                                    @if ($publisher->id == $book->publisher_id)
                                        <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                                    @else
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>Počet stran</label>
                            <input type="text" class="form-control @error('page_number') isinvalid @enderror"
                                placeholder="Počet stran" name="page_number" value="{{ $book->pageNumber }}" >
                            @error('page_number')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>Rok vydání</label>
                            <input type="text" class="form-control @error('release_date') isinvalid @enderror"
                                placeholder="Rok vydání" name="release_date" value="{{ $book->releaseDate }}" >
                            @error('release_date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>Umístěí</label>
                            <input type="text" class="form-control @error('place') isinvalid @enderror"
                                placeholder="Umístěí" name="place" value="{{ $book->place }}" >
                            @error('place')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

												<div class="form-group">
                            <label>Poznámka</label>
                            <textarea class="form-control @error('comment') isinvalid @enderror"
                                placeholder="Poznámka" name="comment">{{ $book->comment }}</textarea>
                            @error('comment')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
												<div class="form-group">
                            <label>Shrnutí</label>
                            <textarea class="form-control @error('resume') isinvalid @enderror"
                                placeholder="Shrnutí" name="resume">{{ $book->resume }}</textarea>
                            @error('resume')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

												<div class="form-group">
                            <label>Vlastník</label>
                            <select class="form-control @error('owner_id') isinvalid @enderror "
                                name="owner_id" >
                                <option value="">Vyberte vlastníka</option>
                                @foreach ($owners as $owner)
                                    @if ($owner->id == $book->owner_id)
                                        <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
                                    @else
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('owner_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="uložit" >
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
