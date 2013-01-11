<?php
//get the q parameter from URL
$q=$_GET["q"];
$xml = simplexml_load_file('http://www.google.com/ig/api?movies=' . $q);
print $xml;
//find out which feed was selected
$infon = $xml->xpath("/xml_api_reply/movies");
$infom = $xml->xpath("/xml_api_reply/movies/movie");
?> 
<html>
    <head></head>
    <body>
        In <?php print $infon[0]->location['data']; ?> City,</br>
		Ongoing movies...
		<table>
		<?php foreach ($infom as $movm) : ?>
        <div>
			<tr><td>  Name:<?php print $movm->title['data']; ?> </td></tr>
		   <tr><td>Genre:<?php print $movm->genre['data']; ?> </td></tr>
		   <tr><td>Rating:<?php print $movm->reviews_rating_percent['data']; ?> /100 </td></tr>
        </div>
        <?php endforeach ?>
		</table>
    </body>
</html>
