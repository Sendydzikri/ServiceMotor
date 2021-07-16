@extends('cashier.index')

@section('main')

<h1 align="center"> Data Suku Cadang </h1>
<a href="{{ url('cashier/addSukucadang') }}" class="btn btn-success mb-3	">Tambah Data Suku cadang</a>
<a href="{{ url('cashier') }}" class="btn btn-primary mb-3	">Kelola Transaksi</a>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<tr  class="text-center">
					<th> id sukucadang </th>
					<th> nama </th>
					<th> harga </th>
					<th> stock </th>
					<th colspan="3"> Action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_sukucadang as $data)
				<tr class="text-center">
					<td>{{$data->id_sukucadang}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->harga}}</td>
					<td>{{$data->stock}}</td>
					<td align="right">
					<a href="{{ url("cashier/{$data->id_sukucadang}/updateSuku") }}" class="btn btn-warning">update</a>
					</td>
					<td>	
						|
					</td>
					<td align="left">
						<form action="{{ url("cashier/{$data->id_sukucadang}/delete_suku") }}" method="post">
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