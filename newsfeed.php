<?php 

// Set feed URL
$url = 'http://www.faroo.com/api?q=KEYWORDS&start=1&length=10&l=en&src=news&f=xml&key=APIKEY';

// Load file or output error message
$xml = simplexml_load_file($url) or ve("feed not loading");

echo "<div class='newsfeed'>";

foreach($xml->result as $result) 
{ 
	// Create DIV for each individual story
	echo "<div class='newsfeed-story'>";
	// Create heading for each entry title with counter
	echo "<p class='newsfeed-headline'><a href=".$result->url . " target='_blank'>";
  // Show title
  echo $result->title."<br/></a></p>";
  // Show link
  echo "<p class='newsfeed-link'>".$result->domain."</p>";

  // Set timezone 
  date_default_timezone_set('America/New_York');

  // Show date and time of each story 
  // Formatting used: F j, Y g:i A outputted as "December 10, 2015 3:34 PM" 
  echo "<p class='newsfeed-date'>" . date("F j, Y g:i A", strtotime($result->firstPublished)) . "</p>";

  // Close newsfeed-story DIV
  echo "</div>";

} // End loop
echo "</div>"; 
// Close newsfeed DIV


?>
