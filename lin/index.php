
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>DECO1800/7180 Week 5 Workshop Exercise 4 Example</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<section id="records">
			<?php

				function getYear($year) {
					if ($year) {
						preg_match('/[\d]{4}/', $year, $matches);
						return $matches[0];
					}
				}

				// PHP errors are hidden by default, but we can turn them on
				ini_set("display_errors", 1);
				error_reporting(E_ALL ^ E_NOTICE);

				// Concatenate an API URL including all parameters inline
				$api_url = 'https://www.data.qld.gov.au/api/3/action/datastore_search?resource_id=9eaeeceb-e8e3-49a1-928a-4df76b059c2d&limit=1000';

				$data = file_get_contents($api_url);

				/* 
				*	Decode the JSON provided by the API
				*	"true" decodes the JSON as an array rather than an object
				*/
				$data = json_decode($data, true);

				// print_r outputs the array in a readable format. Remove the comment to see what it looks like
				//echo "<pre>" . print_r($data, true) . "</pre>";

				// Check if $data is an array that we can iterate over

				if(is_array($data)) {

					// Iterate over the records in the array
	
					foreach($data["result"]["records"] as $recordKey => $recordValue) {
	
						//echo "<pre>" . print_r($recordValue, true) . "</pre>";
	
						// Specify variables for specific data
	
						$recordTitle = $recordValue["dc:title"];
						$recordImage = $recordValue["150_pixel_jpg"];
						$recordDescription = $recordValue["dc:description"];
						$recordYear = getYear($recordValue["dcterms:temporal"]);
						
	
						if($recordTitle && $recordImage && $recordDescription) {
	
							// Output HTML for a record with variables included
	
							echo "
							<section class='record'>
								<h2>" . $recordTitle . "</h2>
								<h3>" . $recordYear . "</h3>
								<img src='" . $recordImage . "'>
								<p>" . $recordDescription . "</p>
							</section>";
	
	
						}
	
					}
	
				}
			?>
		</section>
	</body>
</html>