<?php
//get the q parameter from URL
$q=$_GET["q"];
$xml = simpleXML_load_file('http://www.worldweatheronline.com/feed/tz.ashx?key=9440d80116084530122403&q=' . $q . '&format=xml',"SimpleXMLElement",LIBXML_NOCDATA);
$infon = $xml->xpath("/data/request");
$infos = $xml->xpath("/data/time_zone");

?>
<?php
if($infon[0]->query)
{
echo "<html>
    <head></head>
    <body><table align=center>
	
        <tr><td>Name: </td><td>" ;
		print $infon[0]->query; 
		echo "</td></tr><tr><td>	Current time: </td><td>" ;
		print $infos[0]->localtime ; 
		echo "</td></tr><tr><td>	UTC timezone: </td><td>";
		print $infos[0]->utcOffset; 
		echo "</td></tr></table>	
    </body>
</html>";
}
else{

}
?>


