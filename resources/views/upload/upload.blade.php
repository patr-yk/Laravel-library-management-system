@extends('layouts.app')
@section('content')
<div id="admin-content">
	<div class="container">
		<p>Vyberte .csv soubor se záznamy knih, které si přejete importovat. <b>Podporovány jsou csv soubory z aplikace HandyLibrary.</b></p>
		<form class="" action="/upload/store" method="post" enctype="multipart/form-data">
			@csrf
			<input type="file" name="uploaded_file" accept=".csv">
			<input type="submit" name="odeslat" value="Odeslat" class="btn btn-success">
		</form>
	</div>
</div>
@endsection
