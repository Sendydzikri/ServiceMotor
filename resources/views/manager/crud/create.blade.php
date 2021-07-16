@extends('manager.index')

@section('main')
<h1 align="center"> Tambah Data </h1>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<form action="{{ url('manager/aksi_create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name : </label>
					<input class="form-control" type="text" name="nama_user" required>  
				</div>
				<div class="form-group">
					<label for="email">username : </label>
					<input class="form-control" type="text" name="username" required>  
				</div>
				<div class="form-group">
					<label for="password">Password : </label>
					<input class="form-control" type="password" name="password" required>  
				</div>
				<div class="form-group">
					<label for="role">Role : </label>
					  <select class="custom-select" name="role">
					    <option value="Manager">Manager</option>
					    <option value="Cashier">Cashier</option>
					  </select>
				</div>
				<a href="{{ url('manager') }}" class="btn btn-primary">Kembali</a>
				<button type="submit" class="btn btn-success">Tambah data</button>
			</form>
		</div>
	</div>
@endsection