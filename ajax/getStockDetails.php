<?php
include_once '../config.php';
$r = new stdClass();
$r->status 	= 'error';
$idArr = array();
$_ = $_GET;

if(isset($_['id'])){
	$id = $_['id'];
	if($id){
		 $result = $db->query('select * from 30_nse_stocks_info where id='.$id)->fetch(PDO::FETCH_OBJ);
		 $r->txt = '<div class="stock-search-result"><div class="name-st">'.$result->name.'</div>
		 <div class="row"><div class="col-md-4"><span class="feild">Market Cap</span><span class="det-value">₹'.$result->market_cap.'</span></div>
		 <div class="col-md-4"><span class="feild">Dividend Yield</span><span class="det-value">'.$result->yield.' %</span></div>
		 <div class="col-md-4"><span class="feild">Debt Eqality</span><span class="det-value">'.$result->debt_to_equity.' %</span></div>
		 <div class="col-md-4"><span class="feild">Current Price</span><span class="det-value">₹ '.$result->current_market_price.'</span></div>
		 <div class="col-md-4"><span class="feild">Roce</span><span class="det-value">'.$result->roce.' %</span></div>
		 <div class="col-md-4"><span class="feild">Eps</span><span class="det-value">₹ '.$result->eps.'</span></div>
		 <div class="col-md-4"><span class="feild">Stock P/E</span><span class="det-value">'.$result->stock.' %</span></div>
		 <div class="col-md-4"><span class="feild">Roe</span><span class="det-value">'.$result->roe_previous_annum.' %</span></div>
		 <div class="col-md-4"><span class="feild">Reserve</span><span class="det-value">₹ '.$result->reserve.'</span></div>
		 <div class="col-md-4"><span class="feild">Debt</span><span class="det-value"> ₹'.$result->debt.'</span></div>
		 </div></div>';
		 $r->status 	= 'success';
	}
}
ob_clean(); 
header('content-type:application/json');
echo json_encode($r);
exit;
?>