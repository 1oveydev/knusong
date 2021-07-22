

<?php
	//Connect MYSQL
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die ("connect fail");
	$board_info = $_GET["board_info"];
    $number = $_GET["number"];
    $query = "select hit, star from ".$board_info." where number=$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);
    $star = $rows['star'];
    $star = $star + 1;
    $hit = $rows['hit'];
    $hit = $hit - 1;

	//if the file do not exist
	$query = "update ".$board_info." set star='$star', hit='$hit' where number=$number";
	$result = $connect->query($query);
    mysqli_close($connect);
?>
    <script>
        history.back();
    </script>