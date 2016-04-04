<?php

class Util{
	public $path = '';
	public function upload($name){
		$allow = array('gif','png','jpg');
		$path = './upload';
		$hz = array_pop(explode('.', $_FILES[$name]['name']));
		if(!in_array($hz, $allow)){
			echo "<script>alert('文件不符合格式要求');window.history.back(-1);</script>";
			return flase;
		}
		$filename = time().".".$hz;
		if(is_uploaded_file($_FILES[$name]['tmp_name'])){
			if(!move_uploaded_file($_FILES[$name]['tmp_name'], $path.'/'.$filename)){
				echo "<script>alert('文件上传失败');window.history.back(-1);</script>";
			}
		}
		$this->path =  $path.'/'.$filename;
	}

	public function addData($file,$data){
		$this->upload($file);
		require("DB.class.php");
		$db = DB::getInstance();
		$res = $db->query("insert into stu(stu,beauti,score) values('{$data}','{$this->path}',1400)");
		if($res){
			echo "<script>alert('插入成功');window.location.href='/select.html'</script>";
		}
	}
}
error_reporting(E_ALL^E_NOTICE);
if($_POST['pwd']!='phpssjs1dyy'){
	echo "<script>alert('邀请码错误');window.location.href='/select.html'</script>";
	return false;
}
$util = new Util();
$util->addData('myfile',$_POST['name']);