@extends('layouts.guest')
@section('content')
	<div id="admin-content">
			<div class="container">
					<div class="row">
							<div class="col-md-3">
									<h2 class="admin-heading">Náhled knihy</h2>
							</div>
							<div class="offset-md-7 col-md-2">
									<a class="add-new" href="/">Zpět</a>
									<a class="add-new my-2" href="{{ route('order.create', $book->id) }}">Objednat</a>
							</div>
					</div>
					<div class="row">
							<div class="offset-md-3 col-md-6">
									<div class="yourform container">
										<div class="row mb-5">
											<div class="col-6"><h4><b>{{ $book->name }}</b></h4></div>
										</div>



										<div class="row">
											<div class="col-6">

											<p class="box">
												<b>ISBN</b><br/>
												{{ $book->isbn ?? "---" }}
											</p>

											<p class="box">
												<b>Formát</b><br/>
												{{ $book->format ?? "---" }}
											</p>

											<p class="box">
												<b>Počet stran</b><br/>
												{{ $book->pageNumber ?? "---" }}
											</p>

											<p class="box">
												<b>umístšní</b><br/>
												{{ $book->place ?? "---" }}
											</p>

											<p class="box">
												<b>Vlastník</b><br/>
												{{ $book->owner->name ?? "---" }}
											</p>

											<p class="box">
												<b>Komentář</b><br/>
												{{ $book->comment ?? "---" }}
											</p>

										</div>


										<div class="col-6">
										<p class="box">
											<b>Autor</b><br/>
											{{ $book->auther->name ?? "---" }}
										</p>

										<p class="box">
											<b>Kategorie</b><br/>
											{{ $book->category->name ?? "---" }}
										</p>

										<p class="box">
											<b>Vydavatel</b><br/>
											{{ $book->publisher->name ?? "---" }}
										</p>

										<p class="box">
											<b>Rok vydání</b><br/>
											{{ $book->releaseDate ?? "---" }}
										</p>

										<p class="box">
											<b>Jazyk</b><br/>
											{{ $book->language ?? "---" }}
										</p>

									</div>
									<p class="box">
										<b>Shrnutí</b><br/>
										{!! $book->resume ?? "---" !!}
									</p>
										</div>

									</div>
									</div>
							</div>


					</div>
			</div>
	</div>
@endsection
