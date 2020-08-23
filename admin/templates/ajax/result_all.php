<?php 

	require_once '../../../config.php';
	require_once '../../../vendor/autoload.php';

	use Edu\Board\Controller\Result;

	$res = new Result;


	$data = $res -> allResult();

    $id = 1;
	foreach( $data as $result):

 ?>

 <tr>
     <td><?php echo $id; $id++; ?></td>
     <td><?php echo $result['ban'] ?></td>
     <td><?php echo $result['eng'] ?></td>
     <td><?php echo $result['math'] ?></td>
     <td><?php echo $result['ss'] ?></td>
     <td><?php echo $result['s'] ?></td>
     <td><?php echo $result['rel'] ?></td>
     <td>
         <a href="" class="btn btn-info">View</a>
         <a href="" class="btn btn-warning">Edit</a>
         <a id="delete_student_result" result_id='<?php echo $result['id'] ?>' href="" class="btn btn-danger">Delete</a>
     </td>
 </tr>

 <?php endforeach; ?>