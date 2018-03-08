<?
	include "session.php";

	if($ses_userid != "") {
		echo "<script>
		location.replace(login.php);
		</script>";
		die;
	}
?>
<html lang="ko">
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
    <title>Cultwo-Flower</title>
    <script type="text/javascript" src="./script.js"></script>
    <link rel="stylesheet" href="./hd.css">
    <link rel="stylesheet" href="./subhd.css">
    <link rel="stylesheet" href="./grid.css">
    <link rel="stylesheet" href="./substyle.css">
    <link rel="stylesheet" href="./ft.css">
    <link rel="stylesheet" href="./popmenu.css">
    <title> 로그인 </title>
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
    /* 폼부분 */
        #form_wrap {
            width:100%;
            margin:0 auto;
            padding-top:50px;
        }
        #form_wrap label {
            display:block;
            clear:both;
            float:left;
            width:40px; height:50px;
            margin-top:30px; margin-left:50px;
            line-height:50px;
            font-weight:600;
            color:#2b2b2b;
        }
        #fuserid, #fpasswd {
            display:block;
            float:left;
            width:200px; height:40px;
            margin-top:30px;
        }
        #btn_frame {
            clear:both;
            width:100%;
            padding-top:50px;
            padding-bottom:100px;
        }
        #btn_frame input {
            display:block;
            width:33.33%; height:40px;
            background:#2b2b2b;
            margin-top:30px;
            text-align:center; line-height:36px;
            border:2px solid rgba(255,255,255,0.5);
            border-radius:10px;
            box-sizing:border-box;
            color:#fff;
        }
        #btn_frame input:nth-last-of-type(1) {
            float:left; margin-left:50px;
        }
        #btn_frame input:nth-last-of-type(2) {
            float:right; margin-right:50px;
        }
    </style>
<script>
    function chk_logform() {
        if(login_form.fuserid.value == "") {
            alert('Input ID');
            login_form.fuserid.focus();
            return false;
        } else if(login_form.fpasswd.value=="") {
            alert('Input Password');
            login_form.fpasswd.focus();
            return false;
        } else {
            return true;
        }
    }
</script>
</head>
<body>
    <div id="contain">
        <input type="checkbox" id="sub_collap_ck" class="ck">
        <header id="hd">
            <div class="hdbtnwrap">
                <h3 class="login_title">컬투플라워 로그인</h3>
                <a href="index.html" class="homebtn"></a>
                <label for="sub_collap_ck" class="menubtn"></label>
                <ul class="sub_collap">
                    <li class="grid12-3 first">
                        <a href="sub1.html">계절꽃</a>
                    </li>
                    <li class="grid12-3">
                        <a href="sub2.html">꽃바구니</a>
                    </li>
                    <li class="grid12-3">
                        <a href="sub3.html">꽃다발</a>
                    </li>
                    <li class="grid12-3 last">
                        <a href="sub4.html">미니블룸</a>
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
                        <a href="login_form.php">로그인</a>
                        <span> / </span>
                        <a href="join.html">회원가입</a>
                    </li>
                    <li class="grid12-4">
                        <a href="cart.html">장바구니</a>
                    </li>
                    <li class="grid12-4 last">
                        <a href="logstics.html">배송조회</a>
                    </li>
                </ul>
            </div>
        </header>
        <figure id="visual">
            <div id="form_wrap">
                <form name="login_form" action="login.php" method="post" onsubmit="return chk_logform();">
                    <label for="fuserid">ID</label>
                    <input type="text" name="fuserid" id="fuserid" size="20" title="아이디 입력"><br /><br />
                    <label for="fpasswd">PW</label>
                    <input type="password" name="fpasswd" id="fpasswd" size="20" title="패스워드 입력"><br /><br />
                    <div id="btn_frame">
                        <input type="submit" name="submit" value="LogIn">
                        <input type="Button" value="SignIn" onClick="location.href='http://dope4.dothome.co.kr/add_form.php'">
                    </div>
                </form>
            </div>
        </figure>
        <footer id="ft">
            <nav id="fnb">
                <ul class="icon_wrap">
                    <li class="col-3">
                        <a href="sub1.html" class="icon1"></a>
                    </li>
                    <li class="col-3">
                        <a href="sub2.html" class="icon2"></a>
                    </li>
                    <li class="col-3">
                        <a href="sub3.html" class="icon3"></a>
                    </li>
                    <li class="col-3">
                        <a href="sub4.html" class="icon4"></a>
                    </li>
                    <li class="col-3">
                        <a href="login_form.php" class="icon5"></a>
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
                    <a href="sub1.html" class="icon1"></a>
                </li>
                <li class="popicon">
                    <a href="sub2.html" class="icon2"></a>
                </li>
                <li class="popicon">
                    <a href="sub3.html" class="icon3"></a>
                </li>
                <li class="popicon">
                    <a href="sub4.html" class="icon4"></a>
                </li>
                <li class="popicon">
                    <a href="login_form.php" class="icon5"></a>
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
                    <a href="./board/list.php" class="bbs">QnA게시판</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>