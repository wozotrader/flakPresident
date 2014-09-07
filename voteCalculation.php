<?php
set_time_limit(0);

function processPercentage($data)
{
	$tableName = $data;
include 'connect.php';
$sqlOne = "SELECT * FROM $tableName";
$sqltwo = "SELECT * FROM $tableName";
	$myData = mysql_query($sqlOne,$con);
	$myDataTwo = mysql_query($sqltwo,$con);	


while ( $recordTwo= mysql_fetch_array($myData)){
		
		while ( $recordOne= mysql_fetch_array($myDataTwo)){
			$totalVotes += $recordOne['votes'];
		}
		
		$id = $recordTwo['id'];
		$votes = $recordTwo['votes'];
		$percentageVote = (($votes/$totalVotes)*100);
		$sqlupdatePercentageVote = "UPDATE $tableName SET percentageVote = '$percentageVote' WHERE id= '$id'";
		mysql_query($sqlupdatePercentageVote, $con);
		
	}
unset($sqlOne,$tableName,$sqltwo,$myData,$myDataTwo,$recordTwo,$totalVotes,$recordOne,$id,$votes,$percentageVote,$sqlupdatePercentageVote);

   

}//end of function
 	$table = "Democrat";
	processPercentage($table);
	 	$tableTwo = "Independent";
	processPercentage($tableTwo);
	 	$tableThree = "Republican";
	processPercentage($tableThree);

 ?>
