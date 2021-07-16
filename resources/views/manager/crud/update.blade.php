@extends('manager.index')

@section('main')
<h1 align="center"> Update Data</h1>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<form action="{{ url("manager/{$data_users->id_user}/aksi_update") }}" method="post">
				@method('PATCH')
				@csrf
			
				<div class="form-group">
					<label for="name">Nama User : </label>
					<input value="{{$data_users->nama_user}}" class="form-control" type="text" name="nama_user" required>  
				</div>
				<div class="form-group">
					<label for="email">Username : </label>
					<input value="{{$data_users->username}}" class="form-control" type="text" name="username" required>  
				</div>
				<div class="form-group">
					<label for="password">Password : </label>
					<input value="{{$data_users->password}}" class="form-control" type="password" name="password" required>  
				</div>
				<div class="form-group">
					<label for="role">Role : </label>
					  <select class="custom-select" name="role">
					    <option value="Manager" >Admin</option>
					    <option value="Cashier">Cashier</option>
					  </select>
				</div>
				<a href="{{ url('manager') }}" class="btn btn-primary">Kembali</a>
				<button type="submit" class="btn btn-warning">Update data</button>
			</form>
		</div>
	</div>

@endsection