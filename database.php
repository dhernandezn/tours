<?php  
	define('DNSSQLSV','sqlsrv:Database=enjoy;Server=172.27.10.32');
	define('USERNAMESQLSV','sys_ctrlclient');
	define('PASSWORDSQLSV','Schelp..,#1234');

    define('DNSMYSQL','mysql:dbname=tours;host=127.0.0.1');
	define('USERNAMEMYSQL','dahn');
	define('PASSWORDMYSQL','555666');

	final class Databasesqlsrv
	{
		private static $dns			= DNSSQLSV;
		private static $username	= USERNAMESQLSV;
		private static $password	= PASSWORDSQLSV;
		private static $instance;
		
		private function __construct() { }
		
		/**
		* Crea una instancia de la clase PDO
		*
		* @access public static
		* @return object de la clase PDO
		*/
		public static function getInstance()
		{
			if (!isset(self::$instance))
			{
				self::$instance = new PDO(self::$dns, self::$username, self::$password);
				//self::$instance->exec("SET CHARACTER SET UTF8");
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$instance;
		}
		
		/**
		* Impide que la clase sea clonada
		*
		* @access public
		* @return string trigger_error
		*/
		public function __clone()
		{
			trigger_error('Clone is not allowed.', E_USER_ERROR);
		}
	}
    final class Databasemysql
	{
		private static $dns			= DNSMYSQL;
		private static $username	= USERNAMEMYSQL;
		private static $password	= PASSWORDMYSQL;
		private static $instance;
		
		private function __construct() { }
		
		/**
		* Crea una instancia de la clase PDO
		*
		* @access public static
		* @return object de la clase PDO
		*/
		public static function getInstance()
		{
			if (!isset(self::$instance))
			{
				self::$instance = new PDO(self::$dns, self::$username, self::$password);
				self::$instance->exec("SET CHARACTER SET utf8");
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$instance;
		}
		
		/**
		* Impide que la clase sea clonada
		*
		* @access public
		* @return string trigger_error
		*/
		public function __clone()
		{
			trigger_error('Clone is not allowed.', E_USER_ERROR);
		}
	}
?>