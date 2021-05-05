<?php
//----------GET data with CURL--------------------------------------------

//1. Initialize
$curl = curl_init();

//2. Set Options
$url1 = "http://jsonplaceholder.typicode.com/photos?_start=50&_limit=50";

// URL to send the request to
curl_setopt($curl, CURLOPT_URL, $url1);
// Return instead of outputting directly
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 3. Execute the request and fetch the response. Check for errors.
$output = curl_exec($curl);

if ($e = curl_error($curl)) {
  echo $e;
} else {
  $decoded = json_decode($output);
}

// 4. Close the curl handle
curl_close($curl);


//---------POST data with CURL--------------------------------------------

$url2 = "http://jsonplaceholder.typicode.com/posts?_start=50&_limit=50";
$post_data = array(
  'query' => 'foo',
  'test' => 'bar',
);

// 2. Initialize
$ch = curl_init();

// 3. Set Options
// URL to send the request to
curl_setopt($ch, CURLOPT_URL, $url2);
// Return instead of outputting directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// POST request
curl_setopt($ch, CURLOPT_POST, 1);
// Adding the POST variables to the request
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// 3. Execute the request and fetch the response. Check for errors.
$output2 = curl_exec($ch);

if ($output2 === FALSE) {
  echo "cURL error: " . curl_error($ch);
}

// 4. Close the curl handle
curl_close($ch);

// 5. Display raw output
print_r($output2)

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>    
      <?php foreach($decoded as $image) {
         echo '<img id="' . $image->id . '" src="' . $image->url . '" alt=""/><br/>';
      } ?>
    </body>
</html>
