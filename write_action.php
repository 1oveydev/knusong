

<?php
	//Connect MYSQL
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("fail");

	//Set values
	$type = $_POST["type"];
	$type = "board_".$type;
	$type_for_back = "./".$type.".php";
	$id = $_POST["name"];
	$title = $_POST["title"];
	$youtube = $_POST["youtube_link"];
	$content = $_POST["content"];
	$date = date('Y-m-d H:i:s');

	$youtube = explode('=', $youtube);
	$youtube = $youtube[1];

	$youtube = explode('&', $youtube);
	$youtube = $youtube[0];

	$URL = './board_list.php';

	//INSERT info to DB
	$query = "INSERT INTO ".$type." (number, title, youtube_link, content, id, date, hit, star) VALUES (null, '$title', '$youtube', '$content', '$id', '$date', 0, 0)"; 
?>
	<script>location.href="<?php echo $type_for_back; ?>"</script>
<?php

	$result = $connect->query($query);

	mysqli_close($connect);
?>
