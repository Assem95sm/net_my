<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Асем</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>
		<div class="container py-3">
		<div class="row">
			<div class="col-12">
				<table class="table-bordered table w-100">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Lastname</th>
						<th scope="col">email</th>
						</tr>
					</thead>
					<tbody>
						<? foreach ($list_arrayq as $value) {?>
							<tr>
								<th scope="row"><?=$value['id'];?></th>
								<td><?=$value['name'];?></td>
								<td><?=$value['lastname'];?></td>
								<td><?=$value['email'];?></td>
							</tr>
						<? } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				let data = {async: 1};
				let rtable = document.querySelector('table tbody');
				fetch('/async_users.php', {
					method: 'POST',
					body: JSON.stringify(data)
				})
				.then(response => response.json())
				.then(result => {
					// console.log(result);
					for (let row of result) {
						let tr = document.createElement('tr');
						tr.innerHTML = '<td>' + row.id + '</td>'+
							'<td>' + row.name + '</td>'+
							'<td>' + row.lastname + '</td>'+
							'<td>' + row.email + '</td>';
						rtable.append(tr);
					}
				});
			});
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>
<? ?>