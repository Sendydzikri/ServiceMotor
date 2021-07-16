 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manager</title>

        <!-- Fonts -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
		  <a class="navbar-brand" href="#"> <b> Form Service </b> </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		</nav>

    	<div class="container pb-5 border border-dark">
			<h1 align="center"> Service Form </h1>
				<div class="row">
					<div class="col-md-8 offset-sm-2">
						<form action="{{ url('/form_transaksi/aksi_create') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="name">Nama : </label>
								<input class="form-control" type="text" name="nama_customer" required>  
							</div>
							<div class="form-group">
								<label for="merk_motor">Merk Motor : </label>
								<input class="form-control" type="text" name="merk_motor" required>  
							</div>
							<div class="form-group">
								<label for="plat_nomor">Plat Nomor : </label>
								<input class="form-control" type="text" name="plat_nomor" required>  
							</div>
							<div class="form-group">
								<label for="plat_nomor">Nomor hp : </label>
								<input class="form-control" type="number" name="nohp_cust" required>  
							</div>
							<div class="form-group">
								<label for="keluhan">Keluhan : </label>
								<textarea class="form-control" name="keluhan" rows="3" required > </textarea>  
							</div>							
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
				</div>
    	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    @yield('script')
</html>