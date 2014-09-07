<!DOCTYPE html>

<head>
<title>FlakPresident|Profile</title>

<link rel="stylesheet" href="css/profile.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=News+Cycle|Bad+Script|Mr+De+Haviland|Exo|Dancing+Script|Playfair+Display+SC|Sunshiney' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo|Muli|Oxygen' rel='stylesheet' type='text/css'>

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5 maximum-scale=1.5">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="icon" type="image/logo.png" href="images/logo.png">
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41827000-2', 'auto');
  ga('send', 'pageview');

</script>
</head>

<?php 

include 'connect.php';

$idP = $_REQUEST['id'];
$tablename = $_REQUEST['politicalParty'];
$voted = $_REQUEST['voted'];
$sql = "Select * From $tablename WHERE id = '$idP'";
$myData = mysql_query($sql,$con);
$record= mysql_fetch_array($myData);
$imgURL = $record['imgURL'];
$candiName = $record['candidateName'];
$votes = $record['votes'];
$DateOfBirth = $record['DateOfBirth'];
$Education = $record['Education'];
$LastJob= $record['LastJob'];
$specialAchivement= $record['SpecialAchievement'];
$Religion= $record['Religion'];
$stand= $record['StandOnCommonIssues'];
$presidentialGoals= $record['PresidentialGoals'];


$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addres= $_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip)){
    $IP = $http_client_ip;
}else if(!empty($http_x_forwarded_for)){
    $IP = $http_x_forwarded_for;
}else {
    $IP = $remote_addres;
}

$checkIP = "SELECT * FROM IpCollection WHERE IpAddress='$IP'";
$checkIPQuery = mysql_query($checkIP,$con);

if(!$recordIP = mysql_fetch_array($checkIPQuery)){
    $myDataIPID = "INSERT INTO IpCollection (IpAddress) VALUES ('$IP')";
    $myIPRecord = mysql_query($myDataIPID,$con);
}

echo "<body id='$tablename'>";
echo "<a href='index.php'><header><div id='left'></div><div id='right'></div><div id='title'>Flak A President<div></header></a>";
echo "<div id='pictureHolder'>";
echo "<img id='imagePlace'src=".$imgURL.">";
echo "</div>";

echo "<div id='first".$tablename."'>";

echo "<div id='name'>". $candiName ."</div>";

echo "<div id ='party'>".$tablename."</div>";

 echo "<div id='votes'> Total Votes: ".$record['percentageVote']."%</div>";

echo "</div>";
echo "<div id='buttonHolder'>";
if($recordIP['VoteStatus']!=TRUE){
    
    if($voted==TRUE){
         $votes++;  
         $sqlupdateVote = "UPDATE $tablename SET votes= '$votes' WHERE candidateName= '$candiName'";
         mysql_query($sqlupdateVote, $con);
         $myDataIPID = "UPDATE IpCollection SET VoteStatus = '$voted' WHERE IpAddress = '$IP'";
         $myIPRecord = mysql_query($myDataIPID,$con);
         echo "<div id='button'>Voted</div>";
  }else{
        echo "<div><form onclick ='this.disabled' action='' method='post'><input id='button' type='submit' value='Vote!' name='addVote' onclick ='this.disabled'/></form></div>";
    }
}
echo "</div>";
if($tablename!='Independent'){
echo "<div id='Logo".$tablename."'></div>";  
 }
 

    echo "<div id='second".$tablename."'>";
        echo "<div id='letters'>";
             echo "<p id='dateOfBirth'>Date of Birth:<p id='lettersTwo'>".$DateOfBirth."</p></p>";
             echo "<p id='religion'>Religion: <p id='lettersTwo'>".$Religion."</p></p>";
             echo "<p id='education'>Education: <p id='lettersTwo'>".$Education."</p></p>";      
             echo "<p id='specialAchievement'>Special Achievement: <p id='lettersTwo'>".$specialAchivement."</p></p>";
        echo "</div>";
    echo "</div>";

echo "<div id='third".$tablename."'>";
    echo "<div id='letters'>";
      echo "<p id='lastJob' align='left'>Last Job: <p id='lettersTwo'>".$LastJob."</p></p>";
      echo "<p id='stand' align='left'>Stand On Common Issues: <p id='lettersTwo'>".$stand."</p></p>";
      echo "<p id='presidentialGoals' align='left'>Presidential Goals:<p id='lettersTwo'>".$presidentialGoals."</p></p>";
    echo "</div>";
echo "</div>";

include 'footer.php';   

    if(isset($_POST['addVote'])){
               
           $votes++;
           $voted="TRUE";
           $myDataIPID = "UPDATE IpCollection SET VoteStatus = '$voted' WHERE IpAddress = '$IP'";
           $myIPRecord = mysql_query($myDataIPID,$con);
    }
            $sqlupdateVote = "UPDATE $tablename SET votes= '$votes' WHERE candidateName= '$candiName'";
            
             mysql_query($sqlupdateVote, $con);
mysql_close($con);
?>
</body>