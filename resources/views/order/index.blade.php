@extends('layouts.app')
@section('content')
<div id="admin-content">
		<div class="container">
				<div class="row">
						<div class="col-md-3">
								<h2 class="admin-heading">Všechny objednávky</h2>
						</div>
				</div>
				<div class="row">
						<div class="col-md-12">
								<div class="message"></div>
								<table class="content-table">
										<thead>
												<th>Jméno</th>
												<th>Email</th>
												<th>Kniha</th>
												<th>Poznámka</th>
												<th></th>
												<th></th>
										</thead>
										<tbody>
												@forelse ($orders as $order)
														<tr>
																<td class="id">{{ $order->student->name ?? '---' }}</td>
																<td>{{ $order->student->email ?? '---' }}</td>
																<td>{{ $order->book->name ?? '---' }}</td>
																<td>{{ $order->note ?? '---'}}</td>

																<td class="delete">
																		<form action="{{ route('order.accept', $order->id) }}" method="post"
																				class="form-hidden">
																				<button class="btn btn-success delete-order">Potvrdit</button>
																				@csrf
																		</form>
																</td>

																<td class="delete">
																		<form action="{{ route('order.destroy', $order) }}" method="post"
																				class="form-hidden">
																				<button class="btn btn-danger delete-order">Odmítnout</button>
																				@csrf
																		</form>
																</td>

														</tr>
												@empty
														<tr>
																<td colspan="8">Žádné objednávky nebyly nalezeny</td>
														</tr>
												@endforelse
										</tbody>
								</table>
								{{ $orders->links('vendor/pagination/bootstrap-4') }}
						</div>
				</div>
		</div>
</div>
@endsection
