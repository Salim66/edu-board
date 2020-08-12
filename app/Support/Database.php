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
		 * Data create
		 */
		public function create($table_name, $data)
		{

			// Make SQL column from database
			$array_key = array_keys($data);
			$array_col = implode(',', $array_key);

			// Make SQL values from database
			$array_val = array_values($data);

			foreach ($array_val as $value) {
				
				$from_value[] = "'".$value."'";

			}

			$array_values = implode(",", $from_value);


			$sql = "INSERT INTO $table_name($array_col) VALUES($array_values)";
			$stmt = $this -> connection() -> prepare($sql);
			$stmt -> execute();

			if ($stmt) {
				return true;
			} else {
				return false;
			}
			
		}

		/**
		 * Find data by id
		 */
		public function find($id)
		{
			
		}

		/**
		 * single data delete
		 */
		public function delete($id)
		{
			
		}

		/**
		 * All data show
		 */
		public function all($tbl)
		{
			
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
		 * Change password / Update
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