<?php 


	namespace Edu\Board\Controller;

	use Edu\Board\Support\Database;
	use PDO;


	/**
	 * Result Management
	 */
	class Result extends Database
	{

		/**
		 * Add students results
		 */	
		 public function addResult($data)
		 	{
		 		$this -> create('results', [
		 			'student_id' => $data['student_id'],
		 			'ban'        => $data['ban'],
		 			'eng'		 => $data['eng'],
		 			'math'		 => $data['math'],
		 			'ss' 		 => $data['ss'],
		 			's'			 => $data['s'],
		 			'rel' 		 => $data['rel'],
		 		]);
		 	}	

		/**
		 * Search student result
		 */
		public function searchResult($exam, $year, $board, $roll, $reg)
		{
			$data = $this -> customQuery("SELECT * FROM students INNER JOIN results ON students.id=results.student_id WHERE students.exam='$exam' AND students.year='$year' AND students.board='$board' AND students.roll='$roll' AND students.reg='$reg' ");
			return $data -> fetch(PDO::FETCH_ASSOC);
		}

		/**
		 * Show all result
		 */
		public function allResult()
		{
			$data = $this -> all('results');
			
			return $data -> fetchAll(PDO::FETCH_ASSOC);
		}

		/**
		 *  Delete single student result
		 */
		public function userDelete($id)
		{
			$data = $this -> delete('results', $id);

			if ($data) {
				return true;
			}
		}

		/**
		 * Calculation Grade
		 */
		public function getGrade($marks)
		{
			if ( $marks >= 0 && $marks <= 32 ) {
				return 'F';
			} elseif( $marks >= 33 && $marks <= 39 ) {
				return 'D';
			} elseif( $marks >= 40 && $marks <= 49 ) {
				return 'C';
			} elseif( $marks >= 50 && $marks <= 59 ) {
				return 'B';
			} elseif( $marks >= 60 && $marks <= 69 ) {
				return 'A-';
			} elseif( $marks >= 70 && $marks <= 79 ) {
				return 'A';
			} elseif( $marks >= 80 && $marks <= 100 ) {
				return 'A+';
			} else {
				return 'Invalid!';
			}
			
		}

		/**
		 * Calculation GPA
		 */
		public function getGpa($marks)
		{
			if ( $marks >= 0 && $marks <= 32 ) {
				return 0;
			} elseif( $marks >= 33 && $marks <= 39 ) {
				return 1;
			} elseif( $marks >= 40 && $marks <= 49 ) {
				return 2;
			} elseif( $marks >= 50 && $marks <= 59 ) {
				return 3;
			} elseif( $marks >= 60 && $marks <= 69 ) {
				return 3.5;
			} elseif( $marks >= 70 && $marks <= 79 ) {
				return 4;
			} elseif( $marks >= 80 && $marks <= 100 ) {
				return 5;
			} else {
				return 'Invalid!';
			}
			
		}

	}



 ?>