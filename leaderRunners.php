<?php

include 'connect.php';


$sql = "Select * From Democrat ORDER BY `votes` DESC limit 1";
$myData = mysql_query($sql,$con);
$sqlTwo = "Select * From Republican ORDER BY `votes` DESC limit 1";
$myDataTwo = mysql_query($sqlTwo,$con);
$sqlThree = "Select * From Independent ORDER BY `votes` DESC limit 1";
$myDataThree = mysql_query($sqlThree,$con);
$tableOne = mysql_field_table($myData, 0);
$tableTwo = mysql_field_table($myDataTwo, 0);
$tableThree = mysql_field_table($myDataThree, 0);
					
echo "<table align=center>"; ?>

<tr>
<th id="PartyTitle"><h1>Winner Democrat</h1></th>
<th id="PartyTitle"><h1>Winner Independent</h1></th>
<th id="PartyTitle"><h1>Winner Republican</h1></th>
</tr> 
<?php 

while (($record = mysql_fetch_array($myData)) | ($recordTwo = mysql_fetch_array($myDataTwo)) | $recordThree = mysql_fetch_array($myDataThree))
{

echo"<tr>";

if($record!=NULL){
$id= $record['id'];
echo "<td><a href='profile.php?id=$id&politicalParty=$tableOne'><img id='imagePlace' src=".$record['imgURL']."></a>";
echo "<br>". $record['candidateName'] . " | ". $record['politicalParty'] ."<br>Percantage ".$record['percentageVote']."%</td>";
}
else{
	echo "<td> </td>";
}
if($recordThree!=NULL){
$id= $recordThree['id'];
echo "<td><a href='profile.php?id=$id&politicalParty=$tableThree'><img id='imagePlace' src=".$recordThree['imgURL']."></a>";
echo "<br>". $recordThree['candidateName'] . " | ". $recordThree['politicalParty'] ."<br>Percantage ".$recordThree['percentageVote']."%</td>";
}
else{
	echo "<td> </td>";
}
if($recordTwo!=NULL){
$id= $recordTwo['id'];
echo "<td><a href='profile.php?id=$id&politicalParty=$tableTwo'><img id='imagePlace' src=".$recordTwo['imgURL']."></a>";
echo "<br>". $recordTwo['candidateName'] . " | ". $recordTwo['politicalParty'] ."<br>Percantage ".$recordTwo['percentageVote']."%</td>";
}
else{
	echo "<td> </td>";
}
echo"</tr>";

}
echo"</table>";

mysql_close(); 
?>
