<?php
$apiKey = "YourAPIkey";

if (isset($_GET['text'])) {
    $searchText = $_GET['text'];

    // Attention! Here you have to set how many data you want to pull. By default, it pulls a maximum of 20 data.  Here ↴
    $searchUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($searchText) . "&maxResults=20&key=" . $apiKey;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $searchUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    // Convert API Answer to JSON 
    header('Content-Type: application/json');

    // Convert JSON data to PHP Array
    $data = json_decode($response, true);

    // get data
    $videoList = array();
	if (isset($data['items'])) {
		foreach ($data['items'] as $item) {
			if (isset($item['id']['videoId'])) {
				$videoId = $item['id']['videoId'];
				$videoTitle = $item['snippet']['title'];
				$videoLink = "https://www.youtube.com/watch?v=" . $videoId;
				$videoList[] = $videoTitle;
				$videoList[] = $videoLink;
			}
		}
	}

	/*$jsonString = "[[";
	for ($i = 0; $i < count($videoList); $i += 2) {
		$videoName = $videoList[$i];
		$videoLink = $videoList[$i + 1];
		$jsonString .= '"' . $videoName . '","' . $videoLink . '"';
		if ($i < count($videoList) - 2) {
			$jsonString .= ",";
		}
	}
	$jsonString .= "]]"; */ // Output Example: [[ "videoName", "videoLink", "videoName", "videoLink" ]]  
  // this output is usually used in Lua language.
  // echo $jsonString;

  // Alternative Method 
  echo json_encode($videoList);   // Output Example:  [{"videoName":"name","videoLink":"videoLink"},{"videoName":"name","videoLink":"videoLink"}]
  // this output is usually used in JavaScript language.

} else {
    header('HTTP/1.1 400 Bad Request');
    echo "Parameter Missing";
}
?>
