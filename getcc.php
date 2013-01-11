<?php
//get the q parameter from URL
$amt=$_GET['val'];
$cr1=$_GET['cur1'];
$cr2=$_GET['cur2'];
$url = "http://www.google.com/ig/calculator?hl=en&q=$amt$cr1=?$cr2";
$ch = curl_init();
$timeout = 0;
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$rawdata = curl_exec($ch);
curl_close($ch);
$data = explode('"', $rawdata);
$data = explode(' ', $data['3']);
$var = $data['0'];
?> 
<html>
    <head></head>
    <body>
        <?php print $amt ;?> <?php print $cr1 ;?> = 
<?php print $var;?> <?php print $cr2;
?>
    </body>
</html>
