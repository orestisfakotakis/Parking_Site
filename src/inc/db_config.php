



<?php
$connection = mysqli_connect("localhost","root","","parkingtry_db");
    class db{
        //Properties
        public $dbhost = 'localhost';
       public $dbuser = 'root';
         public $dbpass = '';
         public $dbname = 'parkingtry_db';

        //Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname;";
            $dbcConnection = new PDO($mysql_connect_str,$this->dbuser,$this->dbpass);
            $dbcConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $dbcConnection;
        }
    }
	?>
