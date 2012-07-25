<?
	$conn = mysql_connect("localhost","testuser","testpwd");

	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("college",$conn);
	$result = mysql_query("SELECT * FROM student");

	while($row = mysql_fetch_array($result)){
		//var_dump($row);
		echo $row["name"]."->".$row["age"]."</br>";
	}
	mysql_close($conn);
?>
