<?php
class Rank
{
	private static $K=32;

	function queryScore($stu){
		$sql="SELECT * FROM stu WHERE `id` = {$stu}";
		$db = DB::getInstance();
		$info=$db->query($sql);
		$info = $info->fetch_array();
		return $info['score'];
	}

	function updateScore($Ra,$stu){
		$db = DB::getInstance();
		$db->query("UPDATE `stu` SET `score` = $Ra WHERE `id` = $stu");
	}

	function expect($Ra,$Rb){
		$Ea=1/(1+pow(10,($Rb-$Ra)/400));
		return $Ea;
	}

	function calculateScore($Ra,$Ea,$num){
		$Ra=$Ra+$this::$K*($num-$Ea);
		return $Ra;
	}

	function selectStu(){
		require("DB.class.php");
		$stu1=@intval($_POST['stu1']);
		$stu2=@intval($_POST['stu2']);
		$victoryid=@intval($_POST['id']);
		return $this->getScore($stu1,$stu2,$victoryid);
	}

	function getScore($stu1,$stu2,$victoryid){

		$Ra=$this->queryScore($stu1);
		$Rb=$this->queryScore($stu2);
		if($Ra & $Rb){

		$Ea=$this->expect($Ra,$Rb);
		$Eb=$this->expect($Rb,$Ra);

		$Ra=$this->calculateScore($Ra,$Ea,$victoryid);
		$Rb=$this->calculateScore($Rb,$Eb,1-$victoryid);
		$Rab=array($Ra,$Rb);

		$this->updateScore($Ra,$stu1);
		$this->updateScore($Rb,$stu2);

		echo json_encode($Rab);
		}
		else{
			return false;
		}
	}
}
$rank = new Rank();
$rank->selectStu();
