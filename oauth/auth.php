<?php
require("OAuth.php");
class Images {
public static function getImages(){ 
$cc_key  = "dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz";
$cc_secret = "a3d93853ba3bad8a99a175e8ffa90a702cd08cfa";
$url = "http://yboss.yahooapis.com/ysearch/news,web,images";
$args = array();
$args["q"] = "sachin tendulkar";
if(array_key_exists("q",$_REQUEST) == true){
	$args["q"] = $_REQUEST["q"];
}
$args["format"] = "json";
 
$consumer = new OAuthConsumer($cc_key, $cc_secret);
$request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
$url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
$ch = curl_init();
$headers = array($request->to_header());
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$rsp = curl_exec($ch);
$results = json_decode($rsp);
$images = $results->{'bossresponse'}->{'images'};
foreach($images as $img){
	//var_dump($img);
	if(is_array($img)){
	foreach($img as $i){
		$u  = $i->{'clickurl'};
//		echo $u;
	}
	}
}
	
//var_dump($images);
return $images;;
}
}
?>

<html>
<body>
<?php
$img = new Images();
$images = Images::getImages();
foreach($images as $img){
	if(is_array($img)){
		foreach($img as $i){
			$url = $i->{'clickurl'};
			echo "<img src=\"".$url."\" />";
		}
	}
}
?>
</body>
</html>
