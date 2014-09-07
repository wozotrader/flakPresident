<?php 

    include 'connect.php';
    
    $sqlQuote = "SELECT * FROM QUOTES ORDER bY 'QuoteBy' ASC";
    $myQuoteData = mysql_query($sqlQuote, $con);
    $quoteArray= NULL;
    $resultArray= NULL;
    $row =0;
    $column = 0;
    $index=0;
while ($record = mysql_fetch_array($myQuoteData)){
        for ($row=0;$row<=1;$row++){
                $quoteArray[$index][0] = $record['Quote'];
                 $quoteArray[$index][1] = $record['QuoteBy'];
        }
                $index++;
}
   $indexRandom = NULL;
                
                   for($randomRow=0;$randomRow<12;$randomRow++){ 
                    $indexRandom[$randomRow] = mt_rand(0, 51);
                     }
                    $resultArray= array_unique($indexRandom);

?>