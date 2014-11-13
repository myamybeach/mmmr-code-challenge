<?php

include('mmmrLib.php');

error_reporting( E_ERROR );
function handleError($errno, $errstr,$error_file,$error_line)
{
	print json_encode(array(
		"error" => array(
			"code" => $errno,
			"message"=>$errstr
		)
	));
	die();
}
set_error_handler("handleError");
	
	if (!$_POST) {
		print json_encode(array(
			"error" => array(
				"code" => "404",
				"message"=> "Method GET not available on this endpoint"
			)
		));
		die();
	}
	$json = $_POST["numbers"];
	$jsonObj = json_decode($json);
	$numbers = $jsonObj->numbers;


	$mean = getMean($numbers);
	if (is_null($mean)) $mean = '';
	$median = getMedian($numbers);
	if (is_null($median)) $median = '';
	$mode = getMode($numbers);
	if (is_null($mode)) $mode = '';
	$range = getRange($numbers);
	if (is_null($range)) $range = '';

	print json_encode(array(
		"results" => array(
			"mean" => $mean,
			"median" => $median,
			"mode" => $mode,
			"range" => $range
		)
	));

?>