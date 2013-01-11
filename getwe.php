<?php
//get the q parameter from URL
$q=$_GET["q"];
$xml = simplexml_load_file('http://www.google.com/ig/api?weather=' . $q);
$information = $xml->xpath("/xml_api_reply/weather/forecast_information");
$current = $xml->xpath("/xml_api_reply/weather/current_conditions");
$forecast_list = $xml->xpath("/xml_api_reply/weather/forecast_conditions");
?>
<html>
    <head>
        
    </head>
    <body>
        <?php print $information[0]->city['data'];?>
        <h2>Today's weather</h2>
        <div class="weather">	
<table><tr><td>		
            <img src="<?php print 'http://www.google.com' . $current[0]->icon['data']?>" alt="weather"?></td>
            <span class="condition">
            <td><?php print $current[0]->temp_f['data'] ?>&deg; F,</td>
            <td><?php print $current[0]->condition['data'] ?> </td>
			<tr>
			
            </span>
			</table>
        </div>
        <h2>Next 5 day's forecast</h2>
		<table>
        <?php foreach ($forecast_list as $forecast) : ?>
        
            <tr><td><img src="<?php print 'http://www.google.com' . $forecast->icon['data']?>" alt="weather"?></td>
            <td><?php print $forecast->day_of_week['data']; ?></td>
            <span class="condition">
	            <td><?php print $forecast->low['data'] ?>&deg; F - <?php print $forecast->high['data'] ?>&deg; F,</td>
	            <td><?php print $forecast->condition['data'] ?></td>
            </span>
			</tr>
        <?php endforeach ?>
		</table>
    </body>
</html>