@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Všichni autoři</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('authors.create') }}">Přidat autora</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Jméno autora</th>
                            <th>Upravit</th>
                            <th>Odstranit</th>
                        </thead>
                        <tbody>
                            @forelse ($authors as $auther)
                                <tr>
                                    <td>{{ $auther->id }}</td>
                                    <td>{{ $auther->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('authors.edit', $auther) }}" class="btn btn-success">Upravit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('authors.destroy', $auther->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-author">Odstranit</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Žádní autoři nebyli nalezeni</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $authors->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
