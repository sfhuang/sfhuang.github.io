<?php
session_start();

require_once '/facebook/src/Facebook/autoload.php';

$APPID='658780054160575';
$APPSECRET='287383df33d475ebe36eb5315cd6d6d4';

$fb = new Facebook\Facebook([
  		'app_id' => '658780054160575',
  		'app_secret' => '287383df33d475ebe36eb5315cd6d6d4',
		'default_graph_version' => 'v2.5'
  ]);

$fbApp = new Facebook\FacebookApp($APPID, $APPSECRET);
$request = new Facebook\FacebookRequest($fbApp, '658780054160575|5Qm64mmJbioHRutblHzcquR21Q0', 'GET', '/people2?fields=likes');

// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();
$result['0']['like_count']=$graphNode->getField('likes');
//echo $graphNode->getField('likes');
//echo ";";

$request = new Facebook\FacebookRequest($fbApp, '658780054160575|5Qm64mmJbioHRutblHzcquR21Q0', 'GET', '/IlluPlanet?fields=likes');

// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();
$result['0']['like_count2']=$graphNode->getField('likes');
//echo $graphNode->getField('likes');

echo json_encode($result);

?>