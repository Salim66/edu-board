<?php 


	namespace Edu\Board\Controller;

	use Edu\Board\Support\Database;


	/**
	 * User Management
	 */
	class User extends Database
	{

		public function createUser($data)
		{
			$data = $this -> create('users', [
				'name' => $data['name'], 
				'email' => $data['email'], 
				'cell' => $data['cell'],
				'role' => $data['role'], 

			]);

			if ($data == true) {
				return "<p class='alert alert-success'>Data added successfull !<button class='close' data-dismiss='alert' >&times;</button></p>";
			}
		}
		
		/**
		 * Change password
		 */
		public function passwordChange($user_id, $new_pass)
		{
			$this -> update('users', $user_id, [
				'pass' => password_hash($new_pass, PASSWORD_DEFAULT),
			]);

			return "<p class='alert alert-success'>Password change successfull !<button class='close' data-dismiss='alert' >&times;</button></p>";
		}


	}










 ?>