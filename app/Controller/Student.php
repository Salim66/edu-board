<?php 


	namespace Edu\Board\Controller;

	use Edu\Board\Support\Database;


	/**
	 * Student Management
	 */
	class Student extends Database
	{

		/**
		 * Create Student
		 */
		public function createStudent($data)
		{

			$file_name = !empty($_FILES['photo']['name']) ? $this -> fileUpload($_FILES['photo'], '../../student/') : '';

			$this -> create('students', [
				'name' => $data['name'],
				'roll' => $data['roll'],
				'reg' => $data['reg'],
				'board' => $data['board'],
				'inst' => $data['inst'],
				'exam' => $data['exam'],
				'year' => $data['year'],
				'photo' => $file_name,
			]);

		}


	}










 ?>