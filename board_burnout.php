<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Burn-out</title>
    <!-- Bootstrap -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles_board.css" rel="stylesheet" />
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_board.css">
    <!-- <style>
        #container {
            width: 70%;
            margin: 0 auto; /* 가로로 중앙에 배치 */
            padding-top: 10%; /* 테두리와 내용 사이의 패딩 여백 */
        }
        #list {
            text-align: center;
        }

        #write {
            text-align: right;
        }

        /* Bootstrap 수정 */
        .table > thead {
            background-color: #b3c6ff;
        }
        .table > thead > tr > th {
            text-align: center;
        }
        .table-hover > tbody > tr:hover {
            background-color: #e6ecff;
        }
        .table > tbody > tr > td {
            text-align: center;
        }
        .table > tbody > tr > #title {
            text-align: left;
        }
        div > #paging {
                      text-align: center;
        }
        .hit {
            animation-name: blink;
            animation-duration: 1.5s;
            animation-timing-function: ease;
            animation-iteration-count: infinite;
            /* 위 속성들을 한 줄로 표기하기 */
            /* -webkit-animation: blink 1.5s ease infinite; */
        }

        /* 애니메이션 지점 설정하기 */
        /* 익스플로러 10 이상, 최신 모던 브라우저에서 지원 */
        @keyframes blink {
            from {color: white;}
            30% {color: yellow;}
            to {color: red; font-weight: bold;}
            /* 0% {color:white;}
            30% {color: yellow;}
            100% {color:red; font-weight: bold;} */
        }
    </style> -->
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

        <header class="masthead2">
        <div class="container">
            <div class="masthead2-subheading">Burn Out, 무기력함</div>
            <div class="masthead2-heading text-uppercase">잠시 전부 내려놓고 스스로를 믿어요.</div>
        </div>
    </header>
        
<div id="container">
    <br>
    

<?php
		// connect MYSQL
		$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db') or die ("connect fail");
		$query ="select * from board_burnout order by number desc";
		$result = $connect->query($query);
		$total = mysqli_num_rows($result);
?>
    <div class="board_list_wrap">
        <table class="board_list">
            <thead>
            <tr>
                <td width="10%">번호</td>
                <td width="40%">제목</td>
                <td width="10%">작성자</td>
                <td width="20%">작성일</td>
                <td width="10%">조회수</td>
                <td width="10%">추천수</td>
            </tr>
            </thead>
            <tbody>
            <c:forEach var="article" items="${articles}" varStatus="status">
<?php
			while($rows = mysqli_fetch_assoc($result)) //Repeate number of DB rows
			{ 
?>			
                <tr>
                    <td><?php echo $rows['number']?></td>
                    <td id="title">
                        <c:if test="${article.depth > 0}">
                            &nbsp;&nbsp;
                        </c:if>
                        <a href="./view.php?number=<?php echo $rows['number']?>&board_info=board_burnout"><?php echo $rows['title']?></a>
                    </td>
                    <td><?php echo $rows['id']?></td>
                    <td><?php echo $rows['date']?></td>
                    <td><?php echo $rows['hit']?></td>
                    <td><?php echo $rows['star']?></td>
                <tr>
<?php
					$total--;
			}
?>
            </c:forEach>
            </tbody>
        </table>

    </div>
    <button id="btn_write" type="button"  onclick="location.href='./write_burnout.php' ">Post</button>
</div>
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