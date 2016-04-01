<?php
class DB{
	private $sql = '';
	private $db = null;
	private static $instance = null;

	private function __construct(){
		error_reporting();
		require("./DBconfig.php");
		$db = @new mysqli($config['host'],$config['user'],$config['pwd'],$config['database']);
		if($db->connect_errno){
			printf("<b style='color:red'>Sorry,you can not connect to the database.And the error is:[%d]%s</b>",$db->connect_errno,$db->connect_error);
		}
		$db->query('set names '.$config['charset']);
		$this->db = $db;
	}

	public static function getInstance(){
		if(!(self::$instance instanceof self)){

			self::$instance = new self();
		}
		return self::$instance;
	}

	public  function query($sql){
		$this->sql = $sql;
		$result = $this->db->query($sql);
		return $result;
	} 

	public function select($arr,$table,$where = '1=1'){
		$sql = 'select ';
		foreach ($arr as $key => $value) {
			$sql .= $value;
		}
		$sql .= ' from '.$table.' where '.$where;
		$result = $this->query($sql);
		$data = [];
		while($arr = $result->fetch_array(MYSQLI_ASSOC)){
			$data[] = $arr;
		}
		return $data;
	}


	public function lastQuery(){
		return $this->sql;
	}

}

/*$db = DB::getInstance();
$aa = $db->select(['*'],'stu');
echo $DB->lastQuery();
echo"<ul>";
foreach($aa as $k => $v){
	foreach($v as $value){
		echo "<li>$value</li>";	
	}
}
echo "</ul>";*/