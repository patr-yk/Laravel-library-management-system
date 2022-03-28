@extends('layouts.guest')
@section('content')
	<a class="float-right mx-5 my-2" href="{{ route('login') }}">Přihlásit se</a>

	<div id="admin-content">
			<div class="container">
					<div class="row">
							<div class="col-md-3">
									<h2 class="admin-heading">Seznam knih</h2>
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
																					<span class='badge badge-success'>Dostupné</span>
																			@else
																					<span class='badge badge-danger'>Vypůjčeno</span>
																			@endif
																	</td>
																	<td class="view">
																		<a href="{{ route('view', $book->id) }}" class="btn btn-success">Náhled</a>
																	</td>
															</tr>
													@empty
															<tr>
																	<td colspan="8">Žádné knihy v databázi.</td>
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
