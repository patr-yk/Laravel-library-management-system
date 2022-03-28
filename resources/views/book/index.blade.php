@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Všechny knihy</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('book.create') }}">Přidat knihu</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>ISBN</th>
                            <th>Název</th>
                            <th>Kategorie</th>
                            <th>Autor</th>
                            <th>Vydavatel</th>
                            <th>Stav</th>
														<th>Náhled</th>
                            <th>Upravit</th>
                            <th>Odstranit</th>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="id">{{ $book->isbn ?? "---" }}</td>
                                    <td>{{ $book->name ?? "---" }}</td>
                                    <td>{{ $book->category->name ?? "---" }}</td>
                                    <td>{{ $book->auther->name ?? "---" }}</td>
                                    <td>{{ $book->publisher->name ?? "---" }}</td>
                                    <td>
                                        @if ($book->status == 'Y')
                                            <span class='badge badge-success'>Dostupé</span>
                                        @else
                                            <span class='badge badge-danger'>Vypůjčeno</span>
                                        @endif
                                    </td>
                                    <td class="edit">
                                        <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Upravit</a>
                                    </td>
																		<td class="view">
																			<a href="{{ route('book.view', $book) }}" class="btn btn-success">Náhled</a>
																		</td>
                                    <td class="delete">
                                        <form action="{{ route('book.destroy', $book) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-book">Odstranit</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Žádné knihy nebyly nalezeny</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
