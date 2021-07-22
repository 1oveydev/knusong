

<?php
	//Connect MYSQL
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die ("connect fail");
	$number = $_POST["number"];
	$title = $_POST["title"];
	$youtube = $_POST["youtube_link"];
	$content = $_POST["content"];
	$board_info = $_POST["board_info"];
	$date = date('Y-m-d H:i:s');

	$youtube = explode('=', $youtube);
	$youtube = $youtube[1];

	//if the file do not exist
	$query = "update ".$board_info." set title='$title', content='$content', youtube_link='$youtube', date='$date' where number=$number";
	$result = $connect->query($query);

	if($result)
	{
?>
		<script>
			alert("Post has been modified sucessfully.");
			location.replace("./view.php?number=<?=$number?>&board_info=<?=$board_info?>");
		</script>
<?php  
	}
	else
	{
		echo "fail";
	}
?>
