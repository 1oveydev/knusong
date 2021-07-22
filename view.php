

<link rel="stylesheet" href="css/style_view.css">
	

<?php
	//Connect MYSQL
	$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db') or die("connect fail");
	$number = $_GET['number'];
	$board_info = $_GET['board_info'];
	session_start();

	//Check SESSION
	if(!isset($_SESSION['userid']))
	{
?>
		<script>
			alert("Login First!");
			history.back();
		</script>
<?php
		exit;
	}

	//add hit=hit+1 for view count
	$hit = "update ".$board_info." set hit=hit+1 where number=$number";
	$connect->query($hit);
	$query = "select title, youtube_link, content, id, date, hit, star from ".$board_info." where number =$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);
?>
<!-- Simple style -->
<style>
	table
	{
		width: 80%;
		border: 1px solid #444444;
	}
	th, td
	{
		border: 1px solid #444444;
		padding: 15px;
	}
	
	*{
		font-family: 'Jua', sans-serif;
	}


</style>

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles2.css" rel="stylesheet" />
        <link href="css/style_music.css" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
</head>

	
<body>
        <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="./homepage.php"><img src="logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./logout.php"><Strong>로그아웃</Strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="http://155.230.52.54:8080/homepage.php#portfolio"><Strong>오늘의 키워드</Strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="http://155.230.52.54:8080/homepage.php#about"><Strong>추천 플레이리스트</Strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="http://155.230.52.54:8080/homepage.php#contact"><Strong>랜덤 픽!</Strong></a></li>
                    </ul>
                </div>
            </div>
        </nav>
		

	<h1><br><br></h1>
	<!-- Table start -->
	<table style="border:none" align=center>
		<tr class=stagger-item align=center>
			<td style="border:1px; solid #6E7783; border-radius:15px;box-shadow: inset 0 0 8px #6E7783;" class=stagger-item colspan="6" id="title"><strong><?php echo $rows['title']?></strong></td>
		</tr>
		<tr class=stagger-item align=center >
			<td style="width:200px;border:1px; solid #77AAAD; border-radius:15px;box-shadow: inset 0 0 8px #77AAAD;" bgcolor="#77AAAD">Written by</td>
			<td style="width:800px;border:1px; solid #d1d1cf; border-radius:15px;box-shadow: inset 0 0 8px #d1d1cf;"><?php echo $rows['id']?></td>
			<td style="width:100px;border:1px; solid #9DC3C1; border-radius:15px;box-shadow: inset 0 0 8px #9DC3C1;" bgcolor="#9DC3C1">조회수</td>
			<td style="width:200px;border:1px; solid #d1d1cf; border-radius:15px;box-shadow: inset 0 0 8px #d1d1cf;"><?php echo $rows['hit']?></td>
			<td style="width:180px;border:1px; solid #D8E6E7; border-radius:15px;box-shadow: inset 0 0 8px #D8E6E7;" bgcolor="#eee8aa">추천수&nbsp<form method="POST" action="like_proc.php?board_info=<?=$board_info?>&number=<?=$number?>"><input type="submit" id="btn_r" style="font-size:15px;" id="btn_r" value="추천하기♥""/></form>
		</td>
			<td style="width:200px;border:1px; solid #d1d1cf; border-radius:15px;box-shadow: inset 0 0 8px #d1d1cf;"><?php echo $rows['star']?></td>
		</tr>
		<tr class=stagger-item align=center>
			<td style="border:1px; solid #d1d1cf; border-radius:15px;box-shadow: inset 0 0 8px #d1d1cf;word-wrap:break-word;word-break:break-all;" colspan="6" valign="top" height="500">
			<br>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $rows['youtube_link']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br>
				<br>
				<?php echo $rows['content']?>
			</td>
		</tr>
        <!-- <tr align=center>
            <td style="width:100px" bgcolor="#AEAEAE">조회수</td>
			<td><?php echo $rows['hit']?></td>
			<td style="width:100px" bgcolor="#AEAEAE">추천수</td>
			<td><?php echo $rows['star']?></td>
        </tr> -->
		

	</table>
	<!-- Table end -->


	<!-- Modify & Delete -->
	<br>
	<center>
		<button id="btn" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>&board_info=<?=$board_info?>'">&nbsp&nbspModify&nbsp&nbsp</button>
		<button id="btn" onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>&board_info=<?=$board_info?>'">&nbsp&nbspDelete&nbsp&nbsp</button>
<?php
	$board_info = $board_info.".php";
?>

		<button type="button" id="btn" onclick="location.href='<?=$board_info?>'">&nbsp&nbspBack&nbsp&nbsp</button>
	</center>

	<!-- Footer-->
<footer class="footer py-4">
            <div class="container">
                <div class="row align-items-bottom">
                    <div class="col-lg-4 text-lg-start">Copyright &copy;<br> KNU/HACKATHON TEAM 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

