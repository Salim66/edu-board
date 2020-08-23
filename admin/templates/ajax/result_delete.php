<?php 

	require_once '../../../config.php';
	require_once '../../../vendor/autoload.php';

	use Edu\Board\Controller\Result;

	$res = new Result;


	$id = $_POST['id'];

	$data = $res -> userDelete($id);

	if ($data) {
		echo "<p class='alert alert-success'>Delete account successfull !<button class='close' data-dismiss='alert' >&times;</button></p>";
	}

