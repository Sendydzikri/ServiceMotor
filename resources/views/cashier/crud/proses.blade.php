@extends('cashier.index')

@section('main')
<h1 align="center"> Proses Transaksi</h1>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<form action="{{ url('cashier/aksi_tambahSuku')}}" method="post">
				@csrf
					<input value="{{$data_transaksi->id_transaksi}}" class="form-control" type="hidden" name="id_transaksi" required> 			
					<input value="{{$data_transaksi->nama_customer}}" class="form-control" type="hidden" name="nama_customer" required> 
					<input value="{{$data_transaksi->tgl_transaksi}}" class="form-control" type="hidden" name="tgl_transaksi" required>  
					<input value="{{$data_transaksi->plat_nomor}}" class="form-control" type="hidden" name="plat_nomor" required>
					<input value="{{$data_transaksi->nohp_cust}}" class="form-control" type="hidden" name="nohp_cust" required>  
					<input value="{{$data_transaksi->merk_motor}}" class="form-control" type="hidden" name="merk_motor" required> 

				<div class="form-group">
						<label for="role">Suku Cadang : </label>
							 <select class="custom-select" name="id_sukucadang" id="suku">
							@foreach($data_suku as $data)
								<option value="{{ $data->id_sukucadang}},{{$data->harga}}">{{$data->nama }}</option>
							@endforeach
						</select>
				</div>
				<div class="form-group">
					<label for="nama_mekanik">Nama Mekanik : </label>
					<input  class="form-control" type="text" name="nama_mekanik" required>  
				</div>
				<a href="{{ url('cashier') }}" class="btn btn-primary">Kembali</a>
				<button type="submit" class="btn btn-warning">Tambah</button>
			</form>
		</div>
	</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<tr  class="text-center">
	        		<th>id suku cadang</th>
	        		<th>nama mekanik </th>
	        		<th>harga</th>
	        		<th>action </th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_detail as $data)
				<tr class="text-center">
					<td>{{$data->id_sukucadang}} 
						<input value="{{$data->nomor}}" class="form-control" type="hidden" name="nomor" required>
					</td>
					<td>{{$data->nama_mekanik}}</td>
					<td>{{$data->harga}}</td>
					<td align="center">
						<form action="{{ url("cashier/{$data->id_transaksi}/{$data->nomor}/hapus_suku") }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Hapus 	</button>	
					</form>
					</td>
					
				</tr>

				@endforeach
				@endphp
			</tbody>
		</table>
		<form action="{{ url("cashier/{$data_transaksi->id_transaksi}/submit") }}" method="post">
			@method('PATCH')
			@csrf
			<button class="btn btn-primary" type="submit">Submit</a>
		</form>
	</div>

</div>

@endsection