

<?php
	//Connect MYSQL
	$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db') or die("fail");

	$id=$_POST["id"];
	$pw=$_POST["pw"];
	$pwconfirm=$_POST["pwconfirm"];
	$name=$_POST["name"];
	$yy=$_POST["yy"];
	$mm=$_POST["mm"];
	$dd=$_POST["dd"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$date = date('Y-m-d H:i:s');
	$birth = $yy.$mm.$dd;

	echo $email."\n";
	echo $mobile;

	if($pw != $pwconfirm)
	{
?>
		<script>
			alert("password check");
			history.back();
		</script>
<?php
		exit;
	}

	if(empty($id) || empty($pw) || empty($name) || empty($birth) || empty($gender) || empty($email) || empty($mobile))
	{
?>
		<script>
			alert("모든 값을 입력해주세요");
			history.back();
		</script>
<?php
		exit;
	}


	//Check the id value exist or not
	$query = "select * from member where id ='$id'";
	$result = $connect->query($query);

	//If id value exist
	if(mysqli_num_rows($result)==1)
	{
?>
		<script>
			alert("This ID is already in use.");
			history.back();	
		</script>
<?php
		exit;
	}

	//Save user entered value in DB	
	//$query = "insert into member (id, pw, name, birth, gender, email, phone, date, permit) values ('$id', '$pw', '$name', '$birth', '$gender', '$email', '$phone', '$date', 0)";
	$query = "insert into member (id, pw, name, birth, gender, email, phone, date, permit) values ('$id', '$pw', '$name', '$birth', '$gender', '$email', '$mobile', '$date', 0)";
	$result = $connect->query($query);

	if($result)
	{
?>
		<script>
			alert('Successfully signed up!');
			location.replace("./main.php");
		</script>

<?php
	}
	else
	{
?>
		<script>
			alert("fail try again...");
			history.back();
		</script>
<?php
	}

	mysqli_close($connect);
?>


