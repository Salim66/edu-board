<?php 


	namespace Edu\Board\Controller;

	use Edu\Board\Support\Database;
	use PDO;


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

		/**
		 * All Student
		 */
		public function allStudent()
		{
			$data = $this -> all('students');

			return $data -> fetchAll(PDO::FETCH_ASSOC);
		}

		/**
		 * Search Student
		 */
		public function studentSearch($search)
		{
			$data = $this -> customQuery("SELECT * FROM students WHERE name LIKE '%$search%' || roll LIKE '%$search%' || reg LIKE '%$search%'");
			return $data -> fetchAll(PDO::FETCH_ASSOC);
		}

		/**
		 * Single Student Delete
		 */
		public function studentDelete($id)
		{
			$data = $this -> delete('students', $id);
			
			if ($data) {
				return true;
			}
		}


	}










 ?>