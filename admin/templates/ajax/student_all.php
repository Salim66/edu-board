<?php 


	require_once '../../../config.php';
	require_once '../../../vendor/autoload.php';

	use Edu\Board\Controller\Student;

	$stu = new Student;


	$data = $stu -> allStudent();


	$i = 1;
	foreach($data as $stu) :

 ?>
 <tr>
     <td><?php echo $i; $i++; ?></td>
     <td><?php echo $stu['name']; ?></td>
     <td><?php echo $stu['roll']; ?></td>
     <td><?php echo $stu['reg']; ?></td>
     <td><?php echo $stu['board']; ?></td>
     <td><?php echo $stu['year']; ?></td>
     <td><img style='widht:50px; height:50px;' src="student/<?php echo $stu['photo']; ?>" alt=""></td>
     <td><?php echo $stu['status']; ?></td>
     <td>
         <a href="" class="btn btn-info">View</a>
         <a href="" class="btn btn-warning">Edit</a>
         <a href="" class="btn btn-danger">Delete</a>
     </td>
 </tr>

 <?php endforeach; ?>