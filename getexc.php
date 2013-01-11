<?php
//get the q parameter from URL
$q=$_GET["q"];
$xml = simplexml_load_file('http://www.google.com/ig/api?stock=' . $q);
//find out which feed was selected
$infon = $xml->xpath("/xml_api_reply/finance");
?>

<html>
    <head></head>
    <body><table>
        <tr><td>Name: <?php print $infon[0]->company['data']; ?></td></tr>
		<tr><td>Open value: <?php print $infon[0]->open['data']; ?></td></tr>
		<tr><td>Last value: <?php print $infon[0]->last['data']; ?> <?php print $infon[0]->currency['data']; ?></td></tr>
		<tr><td>Market cap: <?php print $infon[0]->market_cap['data']; ?></td></tr>
		<tr><td>Change: <?php print $infon[0]->change['data']; ?></td></tr>
        </table>
    </body>
</html>
