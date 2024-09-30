<?php 

$json_data = file_get_contents('users.json');
$users = json_decode($json_data);

$paginated_users = array_chunk($users,10);

$page_numbers = count($paginated_users);

$page_index = $_GET['page'] ?? 0;



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
	.pagination {
		display: inline-block;
	}

	.pagination a {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
	}

	.pagination a.active {
		background-color: #4CAF50;
		color: white;
	}

	.pagination a:hover:not(.active) {
		background-color: #ddd;
	}
	</style>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div style="margin: 51px;">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
			</thead>
			<tbody>
				<?php foreach($paginated_users[$page_index] as $user) : ?>
				<tr>
					<td><?=  $user->id ?></td>
					<td><?=  $user->first_name?></td>
					<td><?=  $user->last_name ?></td>
					<td><?=  $user->email ?></td>
					<td><?=  $user->gender?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<div class="pagination">
			<?php for($i = 0 ; $i < $page_numbers; $i++) :?>
			<a href="./index.php?page=<?= $i ?>" class="<?=  $i == $page_index ? 'active' : ''?>"><?= $i+1 ?></a>
			<?php endfor; ?>
		</div>
	</div>
	<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
</body>

</html>