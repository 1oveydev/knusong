
<?php
	//Connect MYSQL & get INFO using $number
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("connect fail");
	$id = $_GET["id"];
	$number = $_GET["number"];
	$board_info = $_GET["board_info"];
	
	$query = "select title, youtube_link, content, id, date, hit, star from ".$board_info." where number=$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);

	$title = $rows['title'];
	$content = $rows['content'];
	$usrid = $rows['id'];

	session_start();

	$URL = "./".$board_info.".php";

	//Check SESSION userid with number's userid
	if($_SESSION['userid']==$usrid)
	{
		//Delete Post
		$query = "delete from ".$board_info." WHERE number=$number";
		$result = $connect->query($query);
?>
		<script>
				alert("<?php echo "The post successfully deleted."?>");
				location.replace("<?php echo $URL?>");
		</script>
<?php
	}
	else
	{
?>
			<script>
				alert("Permission Denied.");
				history.back();
			</script>
<?php
	}
?>
