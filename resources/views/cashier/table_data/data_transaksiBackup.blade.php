@extends('cashier.index')

@section('main')

<h1 align="center"> Data Users </h1>
<a href="{{ url('cashier/create') }}" class="btn btn-success mb-3	">Tambah Users</a>
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
				@foreach($datat as $data)
				@php
					$count = 0;
					$count = $count + 1;
					$row = "row".$count;
				@endphp
				<tr class="text-center" id="{{$row}}">
					<td>{{$data->id_transaksi}}</td>
					<td>{{$data->tgl_transaksi}}</td>
					<td>{{$data->nama_customer}}</td>
					<td>{{$data->plat_nomor}}</td>
					<td>{{$data->nohp_cust}}</td>	
					<td>{{$data->merk_motor}}</td>
					<td>{{$data->keluhan}}</td>										
					<td align="right">	
						<button type="button" class="btn btn-primary proses" data-toggle="modal" value ="{{$data->id_transaksi}}"  data-target="#exampleModalCenter">
							  proses
						</button>
					</td>
					<td>	
						|
					</td>
					<td align="left">
						<form action="{{ url("cashier/{$data->id_user}/aksi_delete") }}" method="post">
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


	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" ation="" id="transaksi_form">
	      @csrf	      
	      <div class="modal-body">
	        	<div class="table-responsive">
	        		<table class="table table-striped table-bordered" id="data_transaksi">
	        			<tr>
	        				<th>id suku cadang</th>
	        				<th>nama mekanik </th>
	        				<th>harga</th>
	        				<th>action </th>
		        		</tr>
	        		</table>
	        	</div>
	        	<div id="transaksi_dialog" title="tambah data">
	        		<div class="form-group">	        			
	        			<div class="form-group">
		        			<label> Nama Mekanik </label>
		        			<input type="text" name="nama_mekanik" id="mekanik" class="form-control" required>
						</div>		        			
						<div class="form-group">
							<label for="role">Suku Cadang : </label>
							  <select class="custom-select" name="id_sukucadang" id="suku">
								@foreach($datas as $data)
									<option value="{{ $data->id_sukucadang}},{{$data->harga}}">{{ $data->nama }}</option>
								@endforeach
							  </select>
						</div>
						<button type="button" class="btn btn-primary" id="add">Tambah</button>	        
	        		</div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Save changes</button>
	      </div>
	      </form>	      
	    </div>
	  </div>
	</div>
</div>


@endsection

@section('script')
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var count = 0;
		var id_trans = 0;
		var url = '{{ url('/cashier/detailtransaksi') }}';

		$(document).on('click', '.proses', function(){
			id_trans = $(this).attr("value");
		});

		$(document).on('click','#add',function(){
			var suku = document.getElementById("suku").value;
			var split = suku.split(",");
			var id_suku = split[0];
			var harga = split[1];
			var mekanik = document.getElementById("mekanik").value;

			count =	count +1;
			output = '<tr id="row_'+ count +'">';
			output += '<td>' + id_suku +'<input type="hidden" name="hidden_idsuku" id="idsuku'+ count +'" value='+id_suku+'> <input type="hidden" name="hidden_idtransaksi" id="id_transaksi'+count+'" value='+id_trans+'> </td>';
			output += '<td>' + mekanik +'<input type="hidden" name="hidden_mekanik" id="mekanik'+ count +'" value='+mekanik+'> </td>';
			output += '<td>' + harga +'<input type="hidden" name="hidden_harga" id="harga'+ count +'" value='+harga+'> </td>';
			output += '<td><button type="button" name="remove" class="btn btn-danger remove" id="'+count+'"> Remove </button></td>'
			$('#data_transaksi').append(output);
		});

		$(document).on('click', '.remove', function(){
			var row_id = $(this).attr("id");
			  if(confirm("Apakah anda yakin ?"))
			  {
			   $('#row_'+row_id+'').remove();
			   count = count - 1;
			  }
			  else
			  {
			   return false;
			  }	  	
		});

		$('#transaksi_form').on('submit', function(event){
			event.preventDefault();	
			if(count>0){
				var form_data = $(this).serialize();
				$.ajax({
					 headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					url : url,
					method:'POST',
					data:form_data,
					success:function(data){
						 $('#data_transaksi').find("tr:gt(0)").remove();
						  if(data.success){
			                  alert(data.message); //Message come from controller
			              }else{
			                  alert("Error");
			              }
					}
				});
			}else{
				alert("mohon isi data terlebih dahulu !");
			}

		});
	});


</script>

@endsection