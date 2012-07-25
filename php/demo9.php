<?

$fname = "sample.xml";
$fd = fopen($fname, "r");

$content = fread($fd, filesize($fname));

$index=0;
if($_GET["index"] != NULL){
	$index = (int)$_GET["index"];
}

//echo $index;
$movies = new SimpleXMLElement($content);
echo $movies->movie[0]->characters->character[1]->name."</br>";
echo $movies->movie[0]->characters->character[1]->actor;
?>

