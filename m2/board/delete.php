<?php
	require_once("../dbconfig.php");

	//$_GET['bno']이 있어야만 글삭제가 가능함.
	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=divice-width, initial-scale=1.0, user-scalable=no" />
    <!-- subject=홈페이지 주제 -->
    <meta name="subject" content="꽃" />
    <!-- title=홈페이지 이름 -->
    <meta name="title" content="컬투플라워" />
    <!-- author=홈페이지 제작자 -->
    <meta name="author" content="RYU" />
    <!-- keyword=홈페이지 키워드 -->
    <meta name="keywords" content="꽃 꽃배달 꽃선물 컬투플라워" />
    <!-- description=홈페이지 설명문 -->
    <meta name="description" content="전국 꽃배달 및 꽃선물은 컬투플라워와 함께" />
	<title>게시판</title>
    <script type="text/javascript" src="../script.js"></script>
    <link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
    <link rel="stylesheet" href="../hd.css">
    <link rel="stylesheet" href="../subhd.css">
    <link rel="stylesheet" href="../grid.css">
	<style>
    /* 초기화 */    
        * { margin:0; padding:0; }
        html, body { width:100%; height:100%; }
        a { text-decoration:none; }
        ul { list-style:none; }
        img { border:0; }
        .ck { display:none; }  
    /* grid common */
        .first { margin-left:2%; border-left:0px; }
        .last { margin-right:2%; border-right:0px; }
    /* header 추가 */
        .login_title {
            text-align:center; line-height:100px;
            font-size:1.5em; font-weight:bold;
            color:#fff;
        }
    /* delete 영역 */
	</style>
    <link rel="stylesheet" href="../substyle.css">
    <link rel="stylesheet" href="../ft.css">
    <link rel="stylesheet" href="../popmenu.css">
</head>
<body>
    <div id="contain">
        <input type="checkbox" id="sub_collap_ck" class="ck">
        <header id="hd">
            <div class="hdbtnwrap">
                <h3 class="login_title">QnA</h3>
                <a href="../index.html" class="homebtn"></a>
                <label for="sub_collap_ck" class="menubtn"></label>
                <ul class="sub_collap">
                    <li class="grid12-3 first">
                        <a href="../sub1.html">계절꽃</a>
                    </li>
                    <li class="grid12-3">
                        <a href="../sub2.html">꽃바구니</a>
                    </li>
                    <li class="grid12-3">
                        <a href="../sub3.html">꽃다발</a>
                    </li>
                    <li class="grid12-3 last">
                        <a href="../sub4.html">미니블룸</a>
                    </li>
                    <li class="grid12-4 first">
                        <a href="tel:010-4020-0394">전 화</a>
                    </li>
                    <li class="grid12-4">
                        <a href="sms:010-4020-0394">문 자</a>
                    </li>
                    <li class="grid12-4 last">
                        <a href="mailto:hicuri@naver.com">메 일</a>
                    </li>
                    <li class="grid12-4 first">
                        <a href="../login_form.php">로그인</a>
                        <span> / </span>
                        <a href="../join.html">회원가입</a>
                    </li>
                    <li class="grid12-4">
                        <a href="../cart.html">장바구니</a>
                    </li>
                    <li class="grid12-4 last">
                        <a href="../logstics.html">배송조회</a>
                    </li>
                </ul>
            </div>
        </header>
        <figure id="visual">
            <article class="boardArticle">
                <h3>자유게시판 글삭제</h3>
                <?php
                    if(isset($bNo)) {
                        $sql = 'select count(b_no) as cnt from board_free where b_no = ' . $bNo;
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                        if(empty($row['cnt'])) {
                ?>
                <script>
                    alert('글이 존재하지 않습니다.');
                    history.back();
                </script>
                <?php
                    exit;
                        }

                        $sql = 'select b_title from board_free where b_no = ' . $bNo;
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                ?>
                <div id="boardDelete">
                    <form action="./delete_update.php" method="post">
                        <input type="hidden" name="bno" value="<?php echo $bNo?>">
                        <table>
                            <caption class="readHide">게시판 글삭제</caption>
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">글삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">글 제목</th>
                                    <td><?php echo $row['b_title']?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="bPassword">비밀번호</label></th>
                                    <td><input type="password" name="bPassword" id="bPassword"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="btnSet">
                            <button type="submit" class="btnSubmit btn">삭제</button>
                            <a href="./list.php" class="btnList btn">목록</a>
                        </div>
                    </form>
                </div>
            <?php
                //$bno이 없다면 삭제 실패
                } else {
            ?>
                <script>
                    alert('정상적인 경로를 이용해주세요.');
                    history.back();
                </script>
            <?php
                    exit;
                }
            ?>
            </article>
        </figure>
        <footer id="ft">
            <nav id="fnb">
                <ul class="icon_wrap">
                    <li class="col-3">
                        <a href="../sub1.html" class="icon1"></a>
                    </li>
                    <li class="col-3">
                        <a href="../sub2.html" class="icon2"></a>
                    </li>
                    <li class="col-3">
                        <a href="../sub3.html" class="icon3"></a>
                    </li>
                    <li class="col-3">
                        <a href="../sub4.html" class="icon4"></a>
                    </li>
                    <li class="col-3">
                        <a href="../login_form.php" class="icon5"></a>
                    </li>
                    <li class="col-3">
                        <a href="tel:010-4020-0394" class="icon6"></a>
                    </li>
                    <li class="col-3">
                        <a href="sms:010-4020-0394" class="icon7"></a>
                    </li>
                    <li class="col-3">
                        <a href="mailto:hicuri@naver.com" class="icon8"></a>
                    </li>
                </ul>
            </nav>
            <p class="copyrights">Designed by RYU</p>
        </footer>
        <input type="checkbox" id="pop_ck" class="ck">
        <label for="pop_ck" class="poplabel">+</label>
        <div class="popmenu">
            <ul class="popiconwrap">
                <li class="popicon">
                    <a href="../sub1.html" class="icon1"></a>
                </li>
                <li class="popicon">
                    <a href="../sub2.html" class="icon2"></a>
                </li>
                <li class="popicon">
                    <a href="../sub3.html" class="icon3"></a>
                </li>
                <li class="popicon">
                    <a href="../sub4.html" class="icon4"></a>
                </li>
                <li class="popicon">
                    <a href="../login_form.php" class="icon5"></a>
                </li>
                <li class="popicon">
                    <a href="tel:010-4020-0394" class="icon6"></a>
                </li>
                <li class="popicon">
                    <a href="sms:010-4020-0394" class="icon7"></a>
                </li>
                <li class="popicon">
                    <a href="mailto:hicuri@naver.com" class="icon8"></a>
                </li>
                <li>
                    <a href="./list.php" class="bbs">QnA게시판</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>