<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
	<title>Gilispace-Admin</title>
</head>

<body>
	<div class="container">
		<div class="card mt-5">
			<div class="card-header text-center">
				Data Destinasi - <a href="https://www.gilispace.com" target="_blank">https://www.gilispace.com</a>
			</div>
			<div class="card-body">
			<a href="/admin/destinasi/add" class="btn btn-primary"> + Add Destinasi</a>

			<br />
			<br />

			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Nama Destinasi</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($destinations as $dt)
					<tr>
						<td>{{ $dt->name_dest }}</td>
						<td>
							<a href="/admin/destinasi/edit/{{ $dt->id }}" class="btn btn-warning">Edit</a>
							<a href="/admin/destinasi/hapus/{{ $dt->id }}" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</body>

</html>