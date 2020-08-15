<?php 

	require_once "../../../config.php";
	require_once "../../../vendor/autoload.php";

	use Edu\Board\Controller\User;

	$user = new User;	


	$data = $user -> allUser();

	$all_data = $data -> fetchAll();

	$id = 1;
	foreach($all_data as $val):
 ?>
 <tr>
     <td><?php echo $id; $id++; ?></td>
     <td><?php echo $val['name'] ?></td>
     <td><?php echo $val['email'] ?></td>
     <td><?php echo $val['cell'] ?></td>
     <td><?php echo $val['role'] ?></td>
     <td><img style='widht:50px; height:50px;' src="images/<?php echo $val['photo'] ?>" alt=""></td>
     <td><?php echo $val['status'] ?></td>
     <td>Active</td>
     <td>
         <a href="" class="btn btn-info">View</a>
         <a href="" class="btn btn-warning">Edit</a>
         <a id='user_delete' user_id="<?php echo $val['id'] ?>" href="" class="btn btn-danger">Delete</a>
     </td>
 </tr>


 <?php endforeach; ?>