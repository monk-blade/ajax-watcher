<?php
//get the q parameter from URL
$q=$_GET["q"];
$xml = simplexml_load_file('http://maps.googleapis.com/maps/api/geocode/xml?address=' . $q . '&sensor=false');
$infon = $xml->xpath("/GeocodeResponse/result");
$infog = $xml->xpath("/GeocodeResponse/result/geometry/location");
$infob = $xml->xpath("/GeocodeResponse/result/geometry/viewpoint/bounds");
?>

<html>
    <head></head>
    <body>
		<?php if( $infon[0]->type == "natural_feature")
		{
			echo "Type : Natural Element(continent,river,mountain,..etc)\n" ;
		}
		elseif( $infon[0]->type == "administrative_area_level_1")
		{
			echo "Type : State(administrative level = 1)\n";
			
		}
		elseif($infon[0]->type == "locality")
		{
			echo "Type : Local city(administrative level = 2)</br>";
		
		}
		else
		{
			echo "Type : ";
			print $infon[0]->type[0];
			
		}
		
		?>
		<h4>Geo-logical position:</h4>
		<table><tr><td>
        Langtitude: </td> <td><?php print $infog[0]->lat; ?></tr></td><tr><td>
		Longtitude:</td> <td><?php print $infog[0]->lng; ?></tr></td>
		</table>
    </body>
</html>
