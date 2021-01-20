<?php

/* 
 *  
 *   
 *  1.0 - Dates
 *	  1.1 - Reset date to follow standard date format on database YYYY-MM-DD
 *	   	  - Function name  : #reset_dmyt_to_ymdt();
 *    1.2 - Today with Beginning of time and end of last hour
 *		  - Function 	   : #start_date_time_end_date_last_hour_wctimeformat();
 *        -- Sample Output : 2020-07-13T16:00:00
 *        -- Start date    : 2021-01-06T16:00:00
 *        -- End date 	   : 
 *
 *    1.2 - Imagery
 *  7.0 - Footer
*/

 /**
 * Shout accept 1483228800
 * 
 * @param start date
 * @param end date
*/
function unixtsmtp_save_db_mysql($epoch){
	$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
	return $dt->format('Y-m-d H:i:s'); // output = 2017-01-01 00:00:00
}



/**
* Current Date
*/
function current_date_ymd(){

	$currentDateTime = date('Y-m-d');
    return $currentDateTime;

}

 /**
 * Retireve dates within Interval
 * 
 * @param start date
 * @param end date
*/
function dates_within_thirty_days($start_date, $end_date){

	/*
	* Trim date
	* Note   : it should be year-month-day.
	* Example : 2012-08-31
	*/

	$start_date = new DateTime($start_date);
	$end_date = new DateTime($end_date);
	$strt_d_frmt = $start_date->format('Y-m-d');
	$end_d_frmt = $end_date->format('Y-m-d');

	$begin = new DateTime($strt_d_frmt);
	$end = new DateTime($end_d_frmt);
	$end = $end->modify('+1 day');

	$interval = new DateInterval('P1D');
	$daterange = new DatePeriod($begin, $interval ,$end);

	foreach($daterange as $key => $date){
	   $data['thirty_days'][] = $date->format("Y-m-d");
	}

	return $data['thirty_days'];
}

function get_start_and_end_dates($start_date, $end_date){

	/*
	* Trim date
	* Note   : it should be year-month-day.
	* Example : 2012-08-31
	*/
	$data = [];

	$start_date = new DateTime($start_date);
	$end_date = new DateTime($end_date);
	$strt_d_frmt = $start_date->format('Y-m-d');
	$end_d_frmt = $end_date->format('Y-m-d');

	$begin = new DateTime($strt_d_frmt);
	$end = new DateTime($end_d_frmt);
	$end = $end->modify('+1 day');

	$interval = new DateInterval('P1D');
	$daterange = new DatePeriod($begin, $interval ,$end);

	foreach($daterange as $key => $date){
	   $data['dates'][] = $date->format("Y-m-d");
	}

	return $data['dates'];

}

function get_first_row_array($array, $parameter){

	$first_row = 0;

	if(is_array($array)){

		$to_reset_date = $array[$first_row]->date_created;

		$result = reset_date_ymt($to_reset_date);

	}else{

		$to_reset_date = $array[$first_row][$parameter];

		$result = reset_date_ymt($to_reset_date);

	}

	return $result;
}

function get_last_row_array($array, $parameter){

	$counts = count($array);

	$counts_substract = $counts-1;

	if(is_array($array)){

		$to_reset_date = $array[$counts_substract]->date_created;

		$result = reset_date_ymt($to_reset_date);

	}else{


		$to_reset_date = $array[$counts_substract][$parameter];

		$result = reset_date_ymt($to_reset_date);

	}

	return $result;

}

function get_first_array_object($object){

	$result = reset( $object ); // blue

	return $result;
}

function get_first_day_of_last_month(){

	$last_day_of_month = date('Y-m-d', strtotime('first day of previous month'));  // correct

	return $last_day_of_month;

}

 /**
 * 1.1 - Reset Date
 * 
 * Reset Date to follow standard date format on database YYYY-MM-DD
 * 
 * should accept date : 2020-07-13T07:34:33
 * 
 * @param start date
*/
function reset_date_ymt($date){

	$result = date("Y-m-d", strtotime($date));

	return $result;
 }

 /**
 * 1.1 - Reset Date
 * 
 * Reset Date to follow standard date format on database YYYY-MM-DD
 * 
 * should accept date : 2020-07-13T07:34:33
 * 
 * @param start date
*/
function reset_dmyt_to_ymdt($date){

	$result = date("Y-m-d", strtotime($date));

	return $result;
 }


 /**
 * 1.1 - Reset Date
 * 
 * Reset Date to follow standard date format on database YYYY-MM-DD
 * 
 * should accept date : 2020-07-13T07:34:33
 * 
 * @param start date
*/
function merge_duplicate_arrays($date){

	$result = date("Y-m-d", strtotime($date));

	return $result;
 }



 /**
 * 1.2 - start date with beginning time 
 * and end date with last hour
 * Description...
 * 
 * should accept date : 2020-07-13T07:34:33
 * 
 * @param start date
 * @param end date
 */
 function start_date_time_end_date_last_hour_wctimeformat($data){

 	$start_date = $data['start_date'] ?? '';
 	$end_date = $data['end_date'] ?? null;
 	
 	if($start_date){

		$reset_start_date = reset_dmyt_to_ymdt($start_date);

		$start = wp_gmtdate($reset_start_date, "+00 hour +00 minutes");

 	}

 	if($end_date){

 		$reset_start_date = reset_dmyt_to_ymdt($end_date);
 			
		$end = wp_gmtdate($reset_start_date, "+23 hour +59 minutes"); 
 	}
	
	$dates=[
		'start_date' => $start ?? '',
		'end_date' => $end ?? ''
	];

	// var_dump($dates);

	return $dates;
 }

 /**
 * Current Pages 
 *
 * 
 * @param start date
 * @param end date
 */

function url_for($script_path){
	if($script_path[0] != '/'){
		$script_path = "/" . $script_path;
	}
	return WWW_ROOT . $script_path;
}

function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
} 

function dispatch_status($meta_data, $dispatch_status_option)
{
	$option = $dispatch_status_option;

	$dispatch_status = "no assign";
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_mbh_dispatch_status")
		{
			if($dispatch_status == ""){
				$dispatch_status="select status";
			}else{
				foreach($option as $key => $opt){
					if($key == $value->value){
						$dispatch_status = $opt;
					}
				}
			}
		} 
	}
	return $dispatch_status;
}

/*
* To Do : 
* Sample format :
*	02/04/2019 03:26:00 - OPERATOR ASSIGNED
*	Assigned Operator: * Kerby Decierdo
*/
function notes_agent($meta_data, $order_id)
{	
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_mbh_notes_agent")
		{
			$shop_order_store_name = $value->value;
			$notes_agent['notes_agent']=[
				'order_id' => $order_id,
				'note_id' => $value->id,
				'key' => $value->key,
				'note_content' => $value->value,
			];
			if($shop_order_store_name == ""){
				$notes_agent['notes_agent'] = [
					'order_id' => $order_id,
					'note_id' => $value->id,
					'key' => $value->key,
					'note_content' => "write notes here",
				];
			} 
		} else {
			$notes_agent['notes_agent']=[
				'order_id' => 0,
				'note_id' => 0,
				'key' => '',
				'note_content' => 'write note here',
			];
		}
	}
	
	return $notes_agent['notes_agent'];
}

/*
*  Get the current index of the url like order.php
* 
*/
function current_page(){
	return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "" : "") 
	. "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

/*
*  Get the current index of the url like order.php
* 
*/
function is_page($current_page, $index){

	if( $current_page == $index ){
		return true;
	}	
	
}

/*
*  Domain is the site name
* 
*/
function is_page_header($current_page, $index ,$html_output=""){

	$html = "";

	if( $current_page == $index ){
		$html = $html_output;
	}	
	
	return html($html);
}

function get_meta_data2($meta_data)
{
	$data = array();
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_store_name")
		{	
			$data[] = $value->value;
		}

	}
	return $data;
}

function today_date_datepicker_format(){
	$currentDateTime = date('m/d/Y');
    return $currentDateTime;
}

function tomorrowDate(){

	$datetime = new DateTime('tomorrow');
	$date = $datetime->format('m-d-Y');
	return $date;
}

/* today date */
function current_date(){
	$currentDateTime = date('Y-m-d H:i:s');
	$date = DateTime::createFromFormat('Y-m-d', $currentDateTime);
	return $date->format('m-d-Y');
}

function month_day_year_numeric($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('m-d-Y ');
}

/* format May-20-2019 */
function month_day_year($date){

	$date_set = "";

	if(!empty($date)){
		$strtotime = strtotime($date);
		$date_str = date('Y-m-d', $strtotime);
		$date = DateTime::createFromFormat('Y-m-d', $date_str);
		$date_set = $date->format('M-d-Y');
	}else{
		$date_set = "no date available";
	}

	return $date_set;
}

function month_day_year_plain($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('M d Y');
}

function month_day_year_time($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('M-d-Y');
}

function date_time_format($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('h:i A');
}

function epoch_to_human_read_date($epoch_timestamp)
{
	$time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	// the output will 2019-03-05
	// then you are now safe to crate output date format for human readable
	$date = DateTime::createFromFormat('Y-m-d', $time_stamp);
	return $date->format('M-d-Y');
}

function epoch_to_human_read_date_no_dash($epoch_timestamp)
{
	// $time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	// the output will 2019-03-05
	// then you are now safe to crate output date format for human readable
	$date = DateTime::createFromFormat('Y-m-d', $epoch_timestamp);
	return $date->format('M d Y');
}

function epoch_to_human_read_date_datepicker($epoch_timestamp)
{
	$time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	$date = DateTime::createFromFormat('Y-m-d', $time_stamp);
	return $date->format('m/d/Y');
}

function phil_money_currency_format($amount_array)
{	
	return "₱ ".number_format($amount_array, 2, '.', ',');
}

function amount_decimal($decimal){
	return number_format($decimal, 2, '.', ',');
}

function currencyConverter($fromCurrency,$toCurrency,$amount) {
	$fromCurrency = urlencode($fromCurrency);
	$toCurrency = urlencode($toCurrency);
	$url = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
	$get = file_get_contents($url);
	$data = preg_split('/\D\s(.*?)\s=\s/',$get);
	$exhangeRate = (float) substr($data[0],0,7);
	$convertedAmount = $amount*$exhangeRate;
	return "$ ".number_format($convertedAmount, 2, '.', ',');
}

function clean_comma($string)
{
	return str_replace($string);
}

function debug($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request(){
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function wp_gmtdate($or_start_date, $add_hours = ""){
	$totime_or = strtotime($or_start_date);
	$add_hours_time = strtotime($add_hours, $totime_or);
	return gmdate("Y-m-d\TH:i:s", $add_hours_time);
}

function dd_monthchar_yy($dd_start_date){
	$totime_or = strtotime($dd_start_date);
	$date = date('j F, Y', $totime_or);
	return $date;
}

function convert_char_to_ymd($char_date){
	$startotime_date = strtotime($char_date);
	$date = date('Y-m-d', $startotime_date );
	return $date;
}

function show_delivery_date($dd_start_date, $dd_end_date){

	$format = 'Y-m-d';
	$totimestart = strtotime($dd_start_date);
	$date_start = date('Y-m-d', $totimestart);
	$date_start_dd = DateTime::createFromFormat($format, $date_start);
	$dd_start_date_frmt = $date_start_dd->format('Y-m-d');
	$dd_start_date_dt = new DateTime( $dd_start_date_frmt );

	$totimeend= strtotime($dd_end_date);
	$date_end = date('Y-m-d', $totimeend);
	$date_end_dd = DateTime::createFromFormat($format, $date_end);
	$dd_end_date_frmt = $date_end_dd->format('Y-m-d');
	$dd_end_date_dt = new DateTime( $dd_end_date_frmt );
	$period = new DatePeriod( $dd_start_date_dt, new DateInterval('P1D'), $dd_end_date_dt );
	return $period;
}

/*
* Return the value
* @parameter $order->meta_data
*
*/
function meta_data_parameter($meta_data, $parameter){

	$data=[];

	// if($meta_data){

	// 	if($meta_data){
	// 		foreach($meta_data as $key => $value)
	// 		{
	// 			if($value->key==$parameter)
	// 			{	
	// 				$data = $value->value;
	// 			}
	// 		}
	// 	}

	// } 

	foreach($meta_data as $key => $value)
	{

		if($value->key==$parameter)
		{	

			$data = $value->value;
		}
	}

	return $data;

	// if( is_array( $meta_data ) ){

	// 	echo "help me Lord this is array";

	// 	if($meta_data){
	// 		foreach($meta_data as $key => $value)
	// 		{
	// 			if($value->key==$parameter)
	// 			{	
	// 				$data = $value->value;
	// 			}
	// 		}
	// 	}


	// }else{

	// 	echo "help me Lord this is other";

	// 	if($meta_data){
	// 		foreach($meta_data as $key => $value)
	// 		{
	// 			if($value['key']==$parameter)
	// 			{	
	// 				$data = $value['value'];
	// 			}
	// 		}
	// 	}

	// 	exit();

	// }

	return $data;
}

function site_domain_public($paraemter){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
	    $link = "https"; 
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
	} else {
	  	$link = "http"; 
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
	}
	return $link.'/public'.$paraemter;
}

function html_view($parameter)
{
	echo $parameter;
	return $parameter;
}

function array_kshift(&$arr)
{
  list($k) = array_keys($arr);
  $r  = array($k=>$arr[$k]);
  unset($arr[$k]);
  return $r;
}

/**
   * Multi-array search
   *
   * @param array $array
   * @param array $search
   * @return array
   */
  function multi_array_search($array, $search)
  {
    // Create the result array
    $result = array();

    // Iterate over each array element
    foreach ($array as $key => $value)
    {

      // Iterate over each search condition
      foreach ($search as $k => $v)
      {

        // If the array element does not meet the search condition then continue to the next element
        if (!isset($value[$k]) || $value[$k] != $v)
        {
          continue 2;
        }

      }

      // Add the array element's key to the result array
      $result[] = $key;

    }

    // Return the result array
    return $result;

  }

	function person_title(){
?>
	<div class="input-group input-group-sm mb-3">
	  <div class="input-group-prepend ">
	  	  <label class="input-group-text" for="inputGroupSelect01"> <small class="text-muted"> Title </small></label>
	  </div>
	  <select id="extTitle" class="form-control-sm custom-select">
	  	<?php 
	  		$output = "";
	  		foreach(Order::TITLE_PERSON as $key => $row){
	  			$output .= "<option value='$key'>".$row."</option>";
	  		}
	  		html($output);
	  	?>
	  </select>
	</div>
<?php }
	function store_type(){
?>
	<div class="input-group input-group-sm mb-3">
	  <div class="input-group-prepend ">
	  	  <label class="input-group-text" for="inputGroupSelect01"> <small class="text-muted"> Title </small></label>
	  </div>
	  <select id="extStoreType" class="store_type form-control-sm custom-select" id="inputGroupSelect01">
	  	<?php 
	  		$output = "";
	  		foreach(Order::STORE_TYPE as $key => $row){
	  			$output .= "<option value='$key'>".$row."</option>";
	  		}
	  		html($output);
	  	?>
	  </select>
	</div>
<?php		
	}

	// function entity_status_text(){
	// 	$status_entity = Order::STATUS_ENTITY;
	// 	$a = $status_entity['A'];
	// 	$t = $status_entity['T'];
	// 	$p = $status_entity['P'];
	// 	$s = $status_entity['S'];
 //  		$output = "";
 //  		$output = '<h6 id="textActive" data-entity-active-text='.$a.' class="card-title m-1">
 //  			Entity Status : &nbsp; <span class="badge badge-success">Active</span> 
 //  			</h6>';
 //  		$output = '<h6 id="textTemporaryInActive" data-entity-active-text='.$t.' class="card-title m-1">
 //  			Entity Status : &nbsp; <span class="badge badge-danger">Temporary Inactive</span> 
 //  			</h6>';
 //  		$output = '<h6 id="textPermanentInActive" data-entity-active-text='.$p.' class="card-title m-1">
 //  			Entity Status : &nbsp; <span class="badge badge-danger">Permanent Inactive</span> 
 //  			</h6>';
 //  		html($output);
	// }

	function entity_status(){
	// id="entityStatus"
	?>
	<form action="" method="post">
  		<div class="form-group">
			<div class="entityStatus input-group input-group-sm mb-3">
			  	<select id="extEntityStatus" class="form-control-sm custom-select" id="inputGroupSelect01">
			  	<?php 
			  		$output = "";
			  		foreach(Order::STATUS_ENTITY as $key => $row){
			  			$output .= "<option value='$key' data-entity-title='$row' >".$row."</option>";
			  		}
			  		html($output);
			  	?>
			    </select>
				 <div class="input-group-prepend ">
				  	 <button type="button" id="entityStatusButton" class="btn btn-warning btn-sm">Change Status</button>
				 </div>
			</div>
		</div>
	</form>
<?php } 

	function temp_inactive(){
	?>
		<select class="tempInActive form-control" multiple style="height: 100pt">
			<?php 
		  		$output = "";
		  		foreach(Order::TEMP_INACTIVE as $key => $row){
		  			$output .= "<option value='$key' data-entity-inactive-desc='$row' >".$row."</option>";
		  		}
		  		html($output);
	  		?>
		</select>
	<?php
	}

	function permanent_inactive(){
	?>
		<select class="permanentInActive form-control" multiple style="height: 100pt">
			<?php 
		  		$output = "";
		  		foreach(Order::PERMANENT_INACTIVE as $key => $row){
		  			$output .= "<option value='$key'>".$row."</option>";
		  		}
		  		html($output);
	  		?>
		</select>
	<?php
	}

	function country_select_plus_populate(){
		
	}
	
	function get_string_between($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}
	
	function first_dot($param){

		list($first_occurrence) = explode('.', $param);

		return $first_occurrence;
		
	}

	function last_dot($param){

		$filename = substr(strrchr($param, "."), 1);

	 	return $filename;

	}

	/*
	* datetime format on mysql
	*/
	function db_timestamp_format($date){

		$date_reset = date('Y-m-d H:i:s', $date );

		$date_time = DateTime::createFromFormat('Y-m-d H:i:s', $date_reset);

		return $date_time;
	}


	/*
	* datetime format on mysql
	*/
	function db_today_timestamp_format(){
		$date_reset = date('Y-m-d H:i:s');
		$date_time = DateTime::createFromFormat('Y-m-d H:i:s', $date_reset);
		return $date_time->format('Y-m-d H:i:s');
	}

	function check_count( $parameter ){
		return count( $parameter );
	}
?>