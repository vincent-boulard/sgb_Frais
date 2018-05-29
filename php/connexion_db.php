<?php
    // $user = "root";
    // $pass="";

    // class Database extends mysqli
    // {
    //     public function prepare($query)
    //     {
    //         return new PreparedRequest($query);
    //     }
    // }

    // class PreparedRequest extends mysqli_stmt
    // {
    //     public function __construct ($query) # contructeur
    //     {
    //         $pattern = '/:[A-z]/';
    //         $replacement = '?';
    //         $this->paramsOrder = preg_match($pattern, $query);
    //         $newQuery = preg_replace($pattern, $replacement, $query);
    //         parent::__construct($newQuery);
    //     }

    //     public function execute($params)
    //     {
    //         $newParams = array();
    //         foreach ($params as $key => $value) {
    //             for ($i=0; $i < count($this->paramsOrder); $i++) {
    //                 if ($this->paramsOrder[$i] === $key) $newParams[$i] = $value;
    //             }
    //         }
    //         parent::bind_param('s', $params);
    //         return parent::execute();
    //     }
    // }

    $ip=explode(".",$_SERVER['SERVER_ADDR']);

	switch ($ip[0]) {
		case 127 :
		case '::1' :
		//local
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "gsb";
			$port='3306';
			break;
			
		case 172 :
		case 10 :
		//prod SISR
			$host = "127.0.0.1";
			$user = "root";
			$password = "Iroise29";
			$dbname = "gsbBoulard";
			$port='3306';
			break;
			
		default :
			exit ("Serveur non reconnu...");
			break;
	}

    $db = new mysqli($host, $user, $password, $dbname, $port);
    $db->set_charset('utf8');

    // $db = new PDO('mysql:host=localhost;dbname=gsb', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>
