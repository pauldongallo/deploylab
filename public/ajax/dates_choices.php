<?php

require_once('../../private/initialize.php');

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

	if( isset( $_POST['one_week'])){

		$datetime = new DateTime('tomorrow');
		$date_tomorrow = $datetime->format('Y-m-d H:i:s');
		$one_week = date('Y-m-d', strtotime( $date_tomorrow. ' + 6 days'));
		$one_week_mdy = month_day_year_numeric($one_week);

		$data['one_week']=[
			'temp_inactive_calendar' => $one_week_mdy
		];

	}elseif( isset( $_POST['two_week'] ) ){

		$datetime = new DateTime('tomorrow');
		$date_tomorrow = $datetime->format('Y-m-d H:i:s');
		$two_week = date('Y-m-d', strtotime( $date_tomorrow. ' + 12 days'));
		$two_week_mdy = month_day_year_numeric($two_week);

		$data['two_week']=[
			'temp_inactive_calendar' => $two_week_mdy
		];
	}

	html(json_encode($data, true));
}