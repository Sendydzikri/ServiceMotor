@extends('manager.index')

@section('main')

<h1 align="center"> Data Users </h1>
<a href="{{ url('manager/create') }}" class="btn btn-success mb-3	">Tambah Users</a>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<tr  class="text-center">
					<th> id user </th>
					<th> nama user </th>
					<th> username </th>
					<th> password </th>
					<th> role </th>
					<th colspan="3"> Action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_users as $data)
				<tr class="text-center">
					<td>{{$data->id_user}}</td>
					<td>{{$data->nama_user}}</td>
					<td>{{$data->username}}</td>
					<td>{{$data->password}}</td>
					<td>{{$data->role}}</td>
					<td align="right">
					<a href="{{ url("manager/{$data->id_user}/update") }}" class="btn btn-primary">Proses</a>
					</td>
					<td>	
						|
					</td>
					<td align="left">
						<form action="{{ url("manager/{$data->id_user}/aksi_delete") }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Hapus 	</button>	
					</form>
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>


@endsection
