<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Dryport Inland</title>

	<!-- CSS DataTables -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap4.min.css">
	<!-- CSS DataTables -->
</head>

<body>
	<div class="container-fluid">

		<h1>Input Data Dryport </h1>
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url() . 'Welcome/tambah'; ?>" method="post">
					<div class="row">
						<div class="col-6">
							<div class="form-group">

								<label>Container Number</label>
								<input type="text" name="cn_number" class="form-control" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Size</label>
								<input type="number" name="size" class="form-control" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Type</label>
								<select class="form-control" name="type" required>
									<option value=""> --- Pilih Type --- </option>
									<option>Dry</option>
									<option>Reefer</option>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group ">

								<label>Gate in Date</label>
								<input type="datetime-local" class="form-control" name="date" required />

							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<table class="table table-bordered" id="dry-port" style="width:100%">
		<thead>
			<tr>
				<th scope="col">Container Number</th>
				<th scope="col">Size</th>
				<th scope="col">Type</th>
				<th scope="col">Gate on Date</th>
				<th scope="col">Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($data as $key => $value) { ?>
				<tr>
					<td scope="row"><?= $value->cn_number ?></td>
					<td scope="row"><?= $value->size ?></td>
					<td scope="row"><?= $value->type ?></td>
					<td scope="row"><?= $value->date ?></td>
					<td scope="row">
						<button class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $value->id ?>">Edit</button>
						<a href=" <?= base_url('welcome/delete/' . $value->id) ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- <a href=" <?= base_url('laporan/') ?>" class="btn btn-success">View Pdf</a>
	<a href=" <?= base_url('laporan/excel') ?>" class="btn btn-warning">Export Excel</a> -->

	<!-- Modal -->

	<?php foreach ($data as $key => $value) { ?>
		<div class="modal fade" id="edit<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('welcome/update/' . $value->id) ?>" method="POST">

							<div class="form-group">
								<label>Container Number</label>
								<input type="text" name="cn_number" class="form-control" placeholder="Enter Container Number" value=<?= $value->cn_number ?>>
							</div>
							<div class="form-group">
								<label>Size</label>
								<input type="number" name="size" class="form-control" placeholder="Size" value=<?= $value->size ?>>
							</div>
							<div class="form-group">
								<label>Type</label>
								<select class="form-control" name="type" required>
									<option value=""> --- Pilih Type --- </option>
									<option>Dry</option>
									<option>Reefer</option>
								</select>
							</div>
							<div class="form-group">
								<label>Gate in Date</label><br>
								<input type="datetime-local" class="form-control" name="date" required>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>

	<script>
		$('#datepicker').datepicker({
			uiLibrary: 'bootstrap4'
		});
	</script>

	<script>
		$(document).ready(function() {
			var table = $('#dry-port').DataTable({
				lengthChange: false,
				buttons: [{
						extend: 'print',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'pdf',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'excel',
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
				],
				columnDefs: [{
					targets: -1,
					visible: false
				}]
			});

			table.buttons().container()
				.appendTo('#dry-port_wrapper .col-md-6:eq(0)');
		});
	</script>

	<!-- SCRIPT DATA TABLES  -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

	<!-- SCRIPT DATA TABLES  -->

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>