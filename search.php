<?php 
	
	require_once 'config.php';
	require_once 'vendor/autoload.php';

	use Edu\Board\Controller\Result;

	$res = new Result;

	// search form isset
	if ( isset($_POST['result']) ) {

		// Get values
		$exam = $_POST['exam'];
		$year = $_POST['year'];
		$board = $_POST['board'];
		$roll = $_POST['roll'];
		$reg = $_POST['reg'];

		
		$student_data = $res -> searchResult($exam, $year, $board, $roll, $reg);
		
	}else {
		header("location:index.php");
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="assets/css/syle.css">

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/bd_logo.png">
</head>
<body>
	

	<div class="wraper">
		<div class="w-top">
			<div class="logo">
				<img src="assets/images/bd_logo.png" alt="">
			</div>
			<div class="banner">
				<h3>Ministry of Education</h3>
				<hr>
				<h4>Intermediate and Secondary Education Boards Bangladesh</h4>
			</div>
		</div>
		<div class="w-main">


				<div class="student-info">
					<div class="student-photo">
						<img src="admin/student/<?php echo $student_data['photo']; ?>" alt="">
					</div>
					<div class="student-details">
						<table>
							<tr>
								<td>Name</td>
								<td><?php echo $student_data['name']; ?></td>
							</tr>
							<tr>
								<td>Roll</td>
								<td><?php echo $student_data['roll']; ?></td>
							</tr>
							<tr>
								<td>Reg.</td>
								<td><?php echo $student_data['reg']; ?></td>
							</tr>
							<tr>
								<td>Board</td>
								<td><?php echo $student_data['board']; ?></td>
							</tr>
							<tr>
								<td>Institute</td>
								<td><?php echo $student_data['inst']; ?></td>
							</tr>
							<tr>
								<td>Result</td>
								<?php 

									$gpa_ban = $res -> getGpa($student_data['ban']);
									$gpa_eng = $res -> getGpa($student_data['eng']);
									$gpa_math = $res -> getGpa($student_data['math']);
									$gpa_ss = $res -> getGpa($student_data['ss']);
									$gpa_s = $res -> getGpa($student_data['s']);
									$gpa_rel = $res -> getGpa($student_data['rel']);


									/**
									 * Total student results validation
									 */
									if ( $gpa_ban >= 1 AND $gpa_eng >= 1 AND $gpa_math >= 1 AND $gpa_ss >= 1 AND $gpa_rel >= 1 AND $gpa_s >= 1 ) {
										$pf = 'Passed';
									} else {
										$pf = 'Failed';
									}
									


								 ?>
								<td><span style="color:green;font-weight:bold;"><?php echo $pf; ?><span></td>
							</tr>
						</table>
					</div>

				</div>

				<div class="student-result">
					<table>
						<tr>
							<td>Subject</td>
							<td>Marks</td>
							<td>Grade</td>
							<td>GPA</td>
							<td>CGPA</td>
						</tr>
						<tr>
							<td>Bangla</td>
							<td><?php echo $student_data['ban']; ?></td>
							<td><?php echo $grade_ban = $res -> getGrade($student_data['ban']) ?></td>
							<td><?php echo $gpa_ban = $res -> getGpa($student_data['ban']) ?></td>
							
							<?php 
								// Average Gpa calculation 			
								$gpa_eng = $res -> getGpa($student_data['eng']);
								$gpa_math = $res -> getGpa($student_data['math']);
								$gpa_ss = $res -> getGpa($student_data['ss']);
								$gpa_s = $res -> getGpa($student_data['s']);
								$gpa_rel = $res -> getGpa($student_data['rel']);

								$avg_gpa = (($gpa_ban+$gpa_eng+$gpa_math+$gpa_ss+$gpa_s+$gpa_rel)/6);
								$avg_gpa_round = round($avg_gpa,2);

							 ?>

							<td rowspan="6"><?php echo $avg_gpa_round; ?></td>

						</tr>
						<tr>
							<td>English</td>
							<td><?php echo $student_data['eng']; ?></td>
							<td><?php echo $grade_eng = $res -> getGrade($student_data['eng']) ?></td>
							<td><?php echo $gpa_eng = $res -> getGpa($student_data['eng']) ?></td>
						</tr>
						<tr>
							<td>Math</td>
							<td><?php echo $student_data['math']; ?></td>
							<td><?php echo $grade_math = $res -> getGrade($student_data['math']) ?></td>
							<td><?php echo $gpa_math = $res -> getGpa($student_data['math']) ?></td>
						</tr>
						<tr>
							<td>Social Science</td>
							<td><?php echo $student_data['ss']; ?></td>
							<td><?php echo $grade_ss = $res -> getGrade($student_data['ss']) ?></td>
							<td><?php echo $gpa_ss = $res -> getGpa($student_data['ss']) ?></td>
						</tr>
						<tr>
							<td>Science</td>
							<td><?php echo $student_data['s']; ?></td>
							<td><?php echo $grade_s = $res -> getGrade($student_data['s']) ?></td>
							<td><?php echo $gpa_s = $res -> getGpa($student_data['s']) ?></td>
						</tr>
						<tr>
							<td>Religion</td>
							<td><?php echo $student_data['rel']; ?></td>
							<td><?php echo $grade_rel = $res -> getGrade($student_data['rel']) ?></td>
							<td><?php echo $gpa_rel = $res -> getGpa($student_data['rel']) ?></td>
						</tr>
					</table>
				</div>




		</div>
		<div class="w-footer">
			<div class="f-left">
				<p>©2005-2019 Ministry of Education, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<img src="assets/images/tbl_logo.png" alt="">
			</div>
		</div>
	</div>
	<div class="bottom">
		<img src="assets/images/play.png" alt="">
	</div>

	

	
</body>
</html>