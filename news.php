<?php
if (isset($_GET['query']) && $_GET['query'] != '') {
  $url = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI';
  $query_fields = [
    	    'autoCorrect' => 'true',
    	    'pageNumber' => 1,
    	    'pageSize' => 10,
    	    'safeSearch' => 'false',
    	    'q' => $_GET['query']
  ];

  $curl = curl_init($url . '?' . http_build_query($query_fields));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    	    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
    	    'X-RapidAPI-Key: 5f62119cdamshda7acf3b93dac29p12af08jsn973582af7c05'
  ]);
  $response = json_decode(curl_exec($curl), true);
  curl_close($curl);

  $news = $response['value'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News Searcher</title>
</head>
<body>
  <form action="" method="get">
    	    <label for="query">Enter your query string:</label>
    	    <input id="query" type="text" name="query" />
    	    <br />
    	    <button type="submit" name="submit">Search</button>
  </form>
  <br />
  <?php
  if (!empty($news)) {
    	    echo '<b>News by Your query:</b>';
    	    foreach ($news as $post) {
        	   echo '<h3>' . $post['title'] . '</h3>';
        	   echo '<a href="' . $post['url'] . '">Source</a>';
        	   echo '<p>Date Published: ' . $post['datePublished'] . '</p>';
        	   echo '<p>' . $post['body'] .'</p>';
        	   echo '<hr>';
    	    }
  }
  ?>
</body>
</html>
