<?php 
	
	namespace Edu\Board\Support;
	
	
	use PDO;

	/**
	 * Database Management
	 */
	abstract class Database
	{
		
		
		/**
		 * Server Information
		 */
		private $host = HOST;
		private $user = USER;
		private $pass = PASS;
		private $db = DB;
		private $connection;
 		
 		/**
 		 * Database Connection
 		 */
		protected function connection()
		{
			return $this -> connection = new PDO("mysql:host=". $this -> host .";dbname=". $this -> db , $this -> user , $this -> pass );
		}

		/**
		 * Data Check
		 */
		public function dataCheck($tbl, array $data, $condition = 'AND')
		{
			$query_string = '';
			foreach ($data as $key => $val) {

				$query_string .= $key . "='$val' $condition ";

			}

			$query_array = explode(' ', $query_string);
			array_pop($query_array);
			array_pop($query_array);

			$final_query_array = implode(' ', $query_array);

			$stmt = $this -> connection() -> prepare("SELECT * FROM $tbl WHERE $final_query_array");
			$stmt -> execute();
			$num = $stmt -> rowCount();

			return [
				'num' => $num,
				'data' => $stmt,
			];


		}

		/**
		 * Change password
		 */
		public function update($tbl, $user_id, array $data)
		{
			$query_string = '';
			foreach ($data as $key => $val) {
				$query_string .= $key . "='$val' , ";
			}

			$query_array = explode(' ', $query_string);
			array_pop($query_array);
			array_pop($query_array);

			$final_query_array = implode(' ', $query_array);

			$stmt = $this -> connection() -> prepare("UPDATE $tbl SET $final_query_array WHERE id='$user_id'");
			$stmt -> execute();

		}



	}


















 ?>