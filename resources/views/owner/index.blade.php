@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Všichni vlastníci</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('owner.create') }}">Přidat vlastníka</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Jméno vlastíka</th>
                            <th>Upravit</th>
                            <th>Odstranit</th>
                        </thead>
                        <tbody>
                            @forelse ($owners as $owner)
                                <tr>
                                    <td>{{ $owner->id }}</td>
                                    <td>{{ $owner->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('owner.edit', $owner) }}" class="btn btn-success">Upravit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('owner.destroy', $owner->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-owner">Odstranit</button>
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
                    {{ $owners->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
