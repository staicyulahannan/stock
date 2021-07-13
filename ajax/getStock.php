<?php
include_once '../config.php';
$r = new stdClass();
$r->status 	= 'error';
$idArr = array();
$_ = $_GET;

if(isset($_['key'])){
	$key = $_['key'];
	if($key){
		 $r->result = $db->query('select * from 30_nse_stocks_info where name like "'.$key.'%" limit 0, 10')->fetchAll(PDO::FETCH_OBJ);
		 $r->status 	= 'success';
	}
}
ob_clean(); 
header('content-type:application/json');
echo json_encode($r);
exit;
?>