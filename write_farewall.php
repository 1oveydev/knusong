
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Post</title>
		<link rel="stylesheet" href="css/style_write.css">
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
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
	</head>
	<body>
	
	<style>
		*{
			font-family: 'Jua', sans-serif;
		}
	</style>
<?php
	session_start();
	$URL = "./board_list.php";

	// If user do not have SESSION back to $URL
	if(!isset($_SESSION['userid']))
	{
?>
		<script>
			alert("Login First!");
			location.replace("<?php echo $URL?>");
		</script>
<?php
	}
?>
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
		
		</body>
		<body>
			
		
	<div><br><br><br><br></div>
	<!-- Write new post -->
	<form method = "POST" action = "write_action.php" enctype = "multipart/form-data">
		<table align = "center" width = "850" border = "0">
			<tr>
				<td height = "20" colspan = "2" align = "center" bgcolor = "#ccc"><font color = "white" width = 30px id = "new_post">New Post</font></td>
			</tr>
			<tr>
				<td bgcolor = "white">
			<tr>
				<td id="written">Written by</td>
				<td>
					<input type = "hidden" name = "type" value = "farewall">
					<input type = "hidden" name = "name" value = "<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?>
				</td>
			</tr>

			<tr>
				<td id="title">Title</td>
				<td>
					<input id="title_blank" type = "text" name = "title" size = "83">
				</td>
			</tr>

			<tr>
				<td id="youtube">Youtube link</td>
				<td>
					<input id="youtube_link" type = "text" name = "youtube_link" size = "83" placeholder="예시) https://www.youtube.com/watch?v=G0xBz93e_pE">
				</td>
			</tr>

			<tr>
				<td id="content">Content</td>
				<td>
					<textarea  name = "content" cols = "85" rows = "15"></textarea>
				</td>
			</tr>
			<tr>
				<td class="btn_area" colspan = "2" align = "center">
					<button id="btn_submit">Submit</button>
					<button type="button" id="btn_back" onclick="javascript:history.back()">&nbsp&nbspBack&nbsp&nbsp</button>
				</td>
			</tr>
		</table>
	</form>
	<div><br><br></div>
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

	<div><br><br></div>
</body>
</html>
