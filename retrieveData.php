<?php

include 'connect.php';
include 'voteCalculation.php';

$sql = "Select * From Democrat ORDER BY `votes` DESC";
$myData = mysql_query($sql,$con);
$sqlTwo = "Select * From Republican ORDER BY `votes` DESC";
$myDataTwo = mysql_query($sqlTwo,$con);
$sqlThree = "Select * From Independent ORDER BY `votes` DESC";
$myDataThree = mysql_query($sqlThree,$con);
$tableOne = mysql_field_table($myData, 0);
$tableTwo = mysql_field_table($myDataTwo, 0);
$tableThree = mysql_field_table($myDataThree, 0);
$indexRow=0;


include 'quotesProcess.php';
?>
<div align="center"><?php include 'adscript2.php';?><?php include 'adscript.php';?></div>
<?php echo "<table align='center'>"; ?>
<br>
<tr>
 <style>
     #PartyTitle{
    font-family: 'Mr De Haviland', cursive;
     }
 </style>
<th id="PartyTitle"><h1 id="one">Democrat</h1></th>
<th id="PartyTitle"><h1 id="two">Independent</h1></th>
<th id="PartyTitle"><h1 id="three">Republican</h1></th>
</tr> 
<tr>
    <th></th>
    <th><p>Touch or click the photo to learn more about a candidate or click the "vote" button to vote!. </p></th>
</tr>
<style>
    #button{
    font-family: 'Muli', sans-serif;
    }
    #quoteBy{
        font-family: 'Mr De Haviland', cursive;
    }
</style>
<?php 
$indexQuote =0;
$indexAds = 0;
while (($record = mysql_fetch_array($myData)) | ($recordTwo = mysql_fetch_array($myDataTwo)) | $recordThree = mysql_fetch_array($myDataThree))
{

echo"<tr>";

if($record!=NULL){
$id= $record['id'];
echo "<td><br><a href='profile.php?id=$id&politicalParty=$tableOne'><img id='imagePlace' src=".$record['imgURL']."></a><br>";
$id= $record['id'];
$votes = $record['votes'];
$candiName = $record['candidateName'];
echo $candiName. "<br>". $record['politicalParty'] ."<br> Popular Vote ".$record['percentageVote']."%<br>";
if($recordIP['VoteStatus']!=TRUE){
echo "<form action='profile.php?id=$id&politicalParty=$tableOne&voted=TRUE' method='post'><input id='button' type='submit' value='Vote!' name='$candiName'/></form><br></td>";
    }else{
     echo "<p id='Voted' align='center'>You already Voted</p>";
    }
}
else{
	echo "<td> </td>";
}
if($recordThree!=NULL){
$id= $recordThree['id'];
echo "<td><br><a href='profile.php?id=$id&politicalParty=$tableThree'><img id='imagePlace' src=".$recordThree['imgURL']."></a><br>";
echo $recordThree['candidateName'] . "<br> ". $recordThree['politicalParty'] ."<br>Popular Vote ".$recordThree['percentageVote']."%<br>";
if($recordIP['VoteStatus']!=TRUE){
echo "<form action='profile.php?id=$id&politicalParty=$tableThree&voted=TRUE' method='post'><input id='button' type='submit' value='Vote!' name='addVoteTo'". $record['candidateName']." /></form><br></td>";
}else{
     echo "<p id='Voted' align='center'>You already Voted</p>";
    }
}
else{
	echo "<td> </td>";
}
if($recordTwo!=NULL){
$id= $recordTwo['id'];
echo "<td><br><a href='profile.php?id=$id&politicalParty=$tableTwo'><img id='imagePlace' src=".$recordTwo['imgURL']."></a><br>";
echo $recordTwo['candidateName'] . " <br> ". $recordTwo['politicalParty'] ."<br>Popular Vote ".$recordTwo['percentageVote']."%<br>";
if($recordIP['VoteStatus']!=TRUE){
echo "<form action='profile.php?id=$id&politicalParty=$tableTwo&voted=TRUE' method='post'><input id='button' type='submit' value='Vote!' name='addVoteTo'".$recordThree['candidateName'] ."/></form><br></td>";
}else{
     echo "<p id='Voted' align='center'>You already Voted</p>";
    }
}
else{
	echo "<td> </td>";
}

echo"</tr>";
if($indexQuote==3){
   echo "<tr>"; 
    if($record!=null){
           if($resultArray[$indexRow]!=NULL){
                 echo "<td><br><br><div id='quote'><q>".$quoteArray[$resultArray[$indexRow]][0]."</q></div>";
                 echo "<br><div id='quoteBy'> ".$quoteArray[$resultArray[$indexRow]][1]."</div></td>";
                 $indexRow++;
            }
    }else{
    echo "<td></td>";
    }
    if($recordThree!=null){
           if($resultArray[$indexRow]!=NULL){
                      
                 echo "<td><br><br><div id='quote'><q>".$quoteArray[$resultArray[$indexRow]][0]."</q></div>";
                 echo "<br><div id='quoteBy'> ".$quoteArray[$resultArray[$indexRow]][1]."</div></td>";
                 $indexRow++;
            }
    }else{
    echo "<td></td>";
    } 
    if($recordTwo!=null){
           if($resultArray[$indexRow]!=NULL){  
                 echo "<td><br><br><div id='quote'><q>".$quoteArray[$resultArray[$indexRow]][0]."</q></div>";
                 echo "<br><div id='quoteBy'> ".$quoteArray[$resultArray[$indexRow]][1]."</div></td>";
                 $indexRow++;
            }
           
    }else{
    echo "<td></td>";
    }
 echo"</tr>";
 $indexQuote=0;
}
else{

$indexQuote++;
}
}

echo"</table>";

mysql_close($con);

?>
