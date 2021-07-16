``@extends('cashier.index')

@section('main')

<h1 align="center"> Data Transaksi </h1>
<a href="{{ url('cashier/indexSukucadang') }}" class="btn btn-success mb-3	">Tambah Data Suku cadang</a>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<tr  class="text-center">
					<th> id transaksi </th>
					<th> tanggal transaksi </th>
					<th> nama customer </th>
					<th> plat nomor </th>
					<th> no_hpcust </th>
					<th> merk_motor </th>
					<th> keluhan </th>
					<th colspan="3"> Action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_transaksi as $data)
				<tr class="text-center">
					<td>{{$data->id_transaksi}}</td>
					<td>{{$data->tgl_transaksi}}</td>
					<td>{{$data->nama_customer}}</td>
					<td>{{$data->plat_nomor}}</td>
					<td>{{$data->nohp_cust}}</td>	
					<td>{{$data->merk_motor}}</td>
					<td>{{$data->keluhan}}</td>	
					<td align="right">
					<a href="{{ url("cashier/{$data->id_transaksi}/proses") }}" class="btn btn-primary">proses</a>
					</td>
					<td>	
						|
					</td>
					<td align="left">
						<form action="{{ url("cashier/{$data->id_transaksi}/aksi_delete") }}" method="post">
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
