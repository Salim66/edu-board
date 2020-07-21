## Education Board Result System

This is a learning purpose project for student result calculation. We use some programming language here.

#### Language use

- HTML
- CSS
- javaScript
- jQuery
- PHP
- MySQL
- OOP
- PDO

#### Database Class Design

```php
require_once '../../config.php';
namespace Edu\Board\Support;
use PDO;

/**
 * Database Management
 */
class Database
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
	private function connection()
	{
		$this -> connection = new PDO("mysql:host=". $this -> host .";db_name=". $this -> db , $this -> user , $this -> pass );
	}



}
```