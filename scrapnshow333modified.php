<html>
<head>
<!-- style for result content-->
<style>

.divforresults{
font-family: arial,sans-serif;
border: 2px solid gray;
padding: 10px;
border-width: 0px 0px 0.5px 0px;
cursor: pointer;
}

p,h3,h4{

margin : 5;

}
<!-- end -->
</style>

<style>
    body{
			
		}
		.info, .success, .warning, .error, .validation {
			border: 1px solid;
			margin: -5px;
			padding: 10px 5px 10px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
			font-weight : bold;
			
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12.5px;
			
			height :auto;
			border-radius: 3px 3px 10px 3px;
			border-width: 3px 3px 3px 3px;
			margin : 10px;
		}
		.info {
			color: #00529B;
			background-color: #BDE5F8;
			<!--background-image: url('https://i.imgur.com/ilgqWuX.png');-->
			
			border-width: 3px 3px 3px 10px;
			padding: 10px 5px 10px 10px;
			
			
			
			
		}
		.success {
			color: #4F8A10;
			background-color: #DFF2BF;
			background-image: url('https://i.imgur.com/Q9BGTuy.png');
		}
		.warning {
			color: #9F6000;
			background-color: #FEEFB3;
			background-image: url('https://i.imgur.com/Z8q7ww7.png');
		}
		.error{
			color: #D8000C;
			background-color: #FFBABA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
		}
		.validation{
			color: #D63301;
			background-color: #FFCCBA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
		}
		</style>
</head>
    <body>
<?php //merge common
/* 
localhost\MT\Working\ok\Merge_All.php
*/
//hide all errors
/* error_reporting(0);
ini_set('display_errors', 0); */

require 'simple_html_dom.php';

$query = '';

/*AJAX  */
if(isset($_POST['user_query'])  && isset($_POST['user_filter']))
{
$query = $_POST['user_query'];
$filter = $_POST['user_filter'];
//echo "query string: $query <br/>";
//echo "filter id: $filter";
} else {
  echo "<h3>Some Error Occured , Sorry for Inconvinience </h3>";
}
/* $query = "realme narzo"; */
$querym = str_replace(' ', '%20', $query);
 

?>
<?php //flipkart scrap
/* 
localhost\MT\Working\Google\scrapnshow.php
*/
//require 'simple_html_dom.php';
//$query = "samsung";
//$querym = str_replace(' ', '%20', $query);
///echo "input : ".$query."<br>"; 
?>
<?php //scrapnshow bohut mehnat

$html =  file_get_html('https://www.google.com/search?tbm=shop&q='.$querym); 
//echo $html;

$az = $html->find('div[class="xcR77"]');

$na=0;
foreach($az as $nodes){	$na++;	} // calculate how many product and store int in na to prevent indexoutofbound


$z=0; //to solve cant read plaintext on null exceptions in below code
				for ($x= 0; $x< $na ; $x++)
				{
					if(($html->find('div[class="xcR77"]',$x)) != null)
					{
						if(($html->find('div[class="xcR77"]',$x)->find('div[class="P8xhZc"]',0)) != null  )
						{
					
							$name[$x] = $html->find('div[class="xcR77"]',$x)->find('div[class="P8xhZc"]',0)->find('a',0)->plaintext;//name
							$price[$x] = $html->find('div[class="xcR77"]',$x)->find('div[class="dD8iuc"]',0)->plaintext;//price
							//$rating[$x] = "hello";//$html->find('div[class="s-result-item s-asin sg-col-0-of-12 sg-col-16-of-20 sg-col sg-col-12-of-16"]',$z)->find('span[class="a-icon-alt"]',0)->plaintext;//rating
							//$company[$x] = " Amazon ";
							$url[$x] =  $html->find('div[class="xcR77"]',$x)->find('div[class="P8xhZc"]',0)->find('a',0)->href;//url
							//echo $url[x];
							$price = str_replace('₹', '', $price);
							$price = str_replace('.00', '', $price);
							$price = str_replace(',', '', $price);
							//var_dump ($price);
							strval($name[$x]);//convert to string
							//strval($rating[$x]);//convert to string
							strval($url[$x]);//convert to string
							//echo $url[$x].":::::      0     ::::: ";
							
						    $url[$x] = str_replace("/url?q=", '',$url[$x]); // changed 20 march 2022 
							//echo $url[$x].":::::      1     ::::: ";
							//$variable = substr($variable, 0, strpos($variable, "is"))
							$url[$x] = str_replace("&", '',$url[$x]);
							$url[$x] = str_replace("amp;", '',$url[$x]);
							//echo $url[$x].":::::      2     ::::: ";
							//$url[$x] = substr($url[$x], 0, strpos($url[$x], "sa="))
							$url[$x] = strstr($url[$x], 'sa=', true);
							//echo $url[$x].":::::   1    :::::";
							//$url[$x] = strstr($url[$x], '%', true);
							//echo $url[$x];
							
							//$url[$x] = substr($url[$x], 0, strpos($url[$x], "%3")); // changed 20 march 2022
							//echo $url[$x].":::::      3     ::::: ";
							//echo "457568496986078-07-7-9685679569569 34636";
							//echo $url[$x];
							//$url[$x] = "https://www.amazon.in".$url[$x];

							
							
									if($name[$x] != '' && $price[$x] != '' )
									{
										//put into array
										$y=0;
										//echo $url[$x].":::::      space     ::::: ";
										//$resultArray[$name[$x]][$price[$x]][$y] = $rating[$x] ;
										//$resultArray[$name[$x]][$price[$x]][$y] = $company[$x] ;
										$resultArray[$name[$x]][$price[$x]][$y] = $url[$x] ;
										
										
									}

							
						}
					}
							$z++;
				
				}
			

$z=0;

//print_r($resultArray);
if($filter == '1')
{
array_multisort($price, SORT_DESC, $name, SORT_DESC, $resultArray);
}
else
{
    array_multisort($price, SORT_ASC, $name, SORT_DESC, $resultArray);
}
//var_dump($price);
?>

<?php // print meta data about product like quantity , query etc

echo '<div class="divforresults" style="background-color: #622569; color:white">';
echo "<b>Input </b>: ".$query."<br>";
echo "<b> total product found </b>: ".($na-4)."&nbsp;&nbsp;"; 
echo '</div>';

?>


<?php // print or echo data to main screen after comparing product name[$x] to $query string

$query = strtoupper($query); //convert query to uppercase
$query= str_replace(' ', '', $query); //remove blanks spaces

for($x = 0 ; $x < 100  ; $x++ ) 
{
	if(isset($name[$x]) != false )
	{
		$temp = strtoupper($name[$x]); //convert each product name to uppercase and store it in temp
		$temp = str_replace(' ', '', $temp); //remove all blank spaces from temp

			if(strpos($temp, $query) !== false) //check whteher query string comes in the product name string (as a part of it)(order should be proper)
			{
			  
			echo '<div class="divforresults" href="'.$resultArray[$name[$x]][$price[$x]][0].'">'; 
			echo '<p><h4><a href="'.$resultArray[$name[$x]][$price[$x]][0].'" target="_blank" style="color: #065FD4;">'.$name[$x].'</a></h4></p>';
			echo '<p><h4>'.$price[$x].'</h4></p>';
			//echo '<p>'.$resultArray[$name[$x]][$price[$x]][0].'</p>';
			//echo '<p>'.$resultArray[$name[$x]][$price[$x]][0].'</p>';
			echo '</div>';
			
			}
			else
			{
				
			}
	}
}


?>
</body>
</html>