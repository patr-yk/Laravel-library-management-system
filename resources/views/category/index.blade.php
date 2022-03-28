@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Všechy kategorie</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('category.create') }}">Přidat kategorii</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Název kategorie</th>
                            <th>Upravit</th>
                            <th>Odstranit</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('category.edit', $category) }}" class="btn btn-success">Upravit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('category.destroy', $category) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-author">Odstranit</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Žádné kategorie nebyly nalezeny</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

