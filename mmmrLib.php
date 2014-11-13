<?php
	function getMean($numArr){
		if (!is_array($numArr)) {
			return NULL;
		} else {
			return round((array_sum($numArr)/count($numArr)),3);
		}
	}
	
	function getMedian($numArr) {
		if (!is_array($numArr)) {
			return NULL;
		} else {
			sort($numArr);
			$count = count($numArr);
			$middle = ($count+1)/2;
			if (is_int($middle)) {
				return $numArr[$middle-1];
			} else {
				return round((($numArr[$middle-.5]+$numArr[$middle-1.5])/2),3);
			}
		}
	}
		
	function getMode($numArr) {
		if (!is_array($numArr)) {
			return NULL;
		} else {
			$countArr = array_count_values($numArr);
			arsort($countArr);
			$modeArr = array();
			foreach($countArr as $k => $v){
				if (count($modeArr) == 0) {
					$modeArr[] = $k;
					$maxCount = $v;
				} elseif ($v == $maxCount){
					$modeArr[] = $k;
				} else {
					break;
				}
			}
			if (count($modeArr)==1) {
				return $modeArr[0];
			} else {
				return $modeArr;
			}
		}
	}

	function getRange($numArr) {
		if (!is_array($numArr)) {
			return NULL;
		} else {
			sort($numArr);
			$count = count($numArr);
			return ($numArr[$count-1] - $numArr[0]);
		}
	}
?>