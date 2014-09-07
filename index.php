
<?php

	include 'header.php';
?>
<body> 
<?php
    
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
    
    include 'connect.php';
$checkIP = "SELECT * FROM IpCollection WHERE IpAddress='$IP'";
$checkIPQuery = mysql_query($checkIP,$con);

if(!$recordIP = mysql_fetch_array($checkIPQuery)){
    $myDataIPID = "INSERT INTO IpCollection (IpAddress) VALUES ('$IP')";
    $myIPRecord = mysql_query($myDataIPID,$con);
}
 ?>
 <style>
     header{
        font-family: 'Playfair Display SC', serif;
     }
 </style>
	 <header>
        <div id="headerOne"></div>
        <div id="headerTwo"></div>       
        <div id="Republican"></div>
        <div id="Democrats"></div>  
        <h1 id="title">Welcome</h1>
        <h1 id="title2">Flak A President</h1>
    </header>
    <div id="content">
		<div>
				<?php include 'connect.php';?>
				
				<br><?php include 'retrieveData.php';?>						
		</div>

		
	<aside id="Ads"><div id="adsVerticalOne"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- flakapresident4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6993710836252551"
     data-ad-slot="7793605221"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br><br><br><br><br><br></div>
<div id="adsVerticaltwo"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- falkapresident5 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6993710836252551"
     data-ad-slot="3583731621"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
</aside>
	
	</div>
	
<?php include 'footer.php'?>

<?php 


?>
</body>