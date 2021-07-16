@extends('cashier.index')

@section('main')
<h1 align="center"> Update Data Suku Cadang </h1>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<form action="{{ url("cashier/{$data_suku->id_sukucadang}/aksi_updateSuku") }}" method="post">
				@method('PATCH')
				@csrf
				<div class="form-group">
					<label for="name">Nama : </label>
					<input class="form-control" value="{{$data_suku->nama}}" type="text" name="nama_suku" required>  
				</div>
				<div class="form-group">
					<label for="email">Harga : </label>
					<input class="form-control" value="{{$data_suku->harga}}" type="number" name="harga" required>  
				</div>
				<div class="form-group">
					<label for="password">Stock : </label>
					<input class="form-control" type="number" value="{{$data_suku->stock}}" name="stock" required>  
				</div>
				<a href="{{ url('cashier/indexSukucadang') }}" class="btn btn-primary">Kembali</a>
				<button type="submit" class="btn btn-success">Update Suku cadang</button>
			</form>
		</div>
	</div>
@endsection