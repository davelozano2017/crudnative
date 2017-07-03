<?php
include '../class/config.php';
switch ($_POST['action']) {

	case 'addorupdate':
		$id 	= $data->post($_POST['id']);
		$ln 	= $data->post($_POST['lastname']);
		$fn 	= $data->post($_POST['firstname']);
		$mn 	= $data->post($_POST['middlename']);
		$qr 	= $data->insertupdate($id,$ln,$fn,$mn);
	break;

	case 'delete':
		$id 		= $data->post($_POST['id']);
		$query 	= $data->delete($id);
	break;

	case 'show':
		$i = 1;
		?>
		<table class="table table-responsive">
			<th>#</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th style="text-align:center">Action</th>
				<?php foreach ($data->show() as $row): ?>
				<tr>
					<td><?php echo$i++?></td>
					<td><?php echo$row['lastname']?></td>
					<td><?php echo$row['firstname']?></td>
					<td><?php echo$row['middlename']?></td>
					<td>
							<button class="btn btn-danger" onclick="del(<?php echo$row['id']?>)"><i class="fa fa-trash"></i></button>
							<button class="btn btn-primary" onclick="edit(<?php echo$row['id']?>)"><i class="fa fa-pencil"></i></button>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<?php
		break;

	case 'edit':
	$id 	= $data->post($_POST['id']);
	$query 	= $data->select($id);
	break;

	default:
	break;
}
