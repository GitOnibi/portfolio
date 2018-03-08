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
<title>회원가입</title>
<script type="text/javascript" src="./script.js"></script>
<link rel="stylesheet" href="./hd.css">
<link rel="stylesheet" href="./subhd.css">
<link rel="stylesheet" href="./grid.css">
<style>
    /* 초기화 */    
    * { margin:0; padding:0; }
    html, body { width:100%; height:100%; }
    a { text-decoration:none; }
    ul { list-style:none; }
    img { border:0; }
    .ck { display:none; }
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
        width:200px; height:50px;
        margin-left:50px;
        line-height:50px;
        font-weight:600;
        color:#2b2b2b;
    }
	#fuserid, #fname, #fpasswd, #fpasswd_re {
        display:block;
        clear:both;
        float:left;
        width:200px; height:40px;
        margin-left:50px;
    }
	#form_wrap #pw_label {
        line-height:50px;
    }
	#ck_btn1 {
        display:block;
        float:left;
        width:80px; height:40px;
		text-align:center; line-height:40px;
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
	.radio_frame {
        clear:both;
        padding-top:40px;
    }
	#form_wrap .radio_frame label {
        display:block;
        clear:none;
        float:left;
        width:30px;
        margin-top:0px;
        line-height:20px;
    }
	#form_wrap .radio_frame input[type=radio] {
        display:block;
        clear:none;
        float:left;
        width:30px;  
        margin-top:0;
        line-height:20px;
    }
    #form_wrap #email_box {
        margin-top:0px;
    }
	#form_wrap #email_box label {
        display:block;
        clear:both;
        float:left;
        width:200px; height:40px;
        margin-top:0px;
        line-height:40px;
        color:#2b2b2b;
        font-weight:600;
    }
	#form_wrap #email_box input {
        display:block;
        clear:both;
        float:left;
        width:200px; height:40px;
        margin-top:0px; margin-left:50px;
    }
</style>
<link rel="stylesheet" href="substyle.css">
<link rel="stylesheet" href="./ft.css">
<link rel="stylesheet" href="./popmenu.css">
<script>
function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("Input your ID");
		user_form.fuserid.focus();
		return false;
	} else if(user_form.fname.value=="") {
		alert("Input your Name");
		user_form.fname.focus();
		return false;
	} else if(user_form.fpasswd.value=="") {
		alert("Input Password");
		user_form.fpasswd.focus();
		return false;
	} else if(user_form.fpasswd_re.value=="") {
		alert("Input Password one more");
		user_form.fpasswd_re.focus();
		return false;
	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[Password] not match, please rewrite your PW");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
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
                <h3 class="login_title">컬투플라워 회원가입</h3>
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
                <form name="user_form" action="add_db.php" method="post" onsubmit="return chk_input()">
                    <label for="fuserid">ID</label>
                    <input type="text" name="fuserid" id="fuserid" size="12" maxlength="12" onblur="if(fuserid.value!='') chk_id();">
                    <input type="button" name="button" value="ID check" id="ck_btn1" onclick="chk_id();">
                    <script>
                    function chk_id() {
                        if(user_form.fuserid.value=='') {
                            alert('Input ID');
                            user_form.fuserid.focus();
                        } else {
                            window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin','width=400,height=200');
                        }
                    }
                    </script>
                    <label for="fname">Name</label>
                    <input type="text" name="fname" id="fname" size="12" maxlength="10">
                    <label for="fpasswd">Password</label>
                    <input type="password" name="fpasswd" id="fpasswd" size="12" maxlength="10">
                    <label for="fpassword_re" id="pw_label">Confirming Password</label>
                    <input type="password" name="fpasswd_re" id="fpasswd_re" size="12" maxlength="10" onblur="chk_passwd()">
                    <div class="radio_frame">
                        <label for="" style="clear:both; width:50px">Sex</label>
                        <input type="radio" name="fsex" value="m" id="man" checked>
                        <label for="man" style="margin-left:0px;">Man</label> 
                        <input type="radio" name="fsex" value="w" id="woman">
                        <label for="woman" style="margin-left:0px;">Woman</label>
                    </div>
                    <div class="radio_frame" id="email_box">
                        <label for="femail">E-mail</label>
                        <input type="text" name="femail" size="30" maxlength="30">
                    </div>
                    <div id="btn_frame">
                        <input type="submit" name="smt" value="가입하기"> 
                        <input type="reset" name="rst" value="다시작성">
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
        <ul class="popmenu">
            <li class="popitem">
                <input type="checkbox" id="collap_ck1" class="ck" checked/>
                <a href="sub1.html">계절꽃</a>
                <label for="collap_ck1">▼</label>
                <ul class="subwrap">
                    <li><a href="sub1_1.html">개업/이전</a></li>
                    <li><a href="sub1_1.html">승진/축하</a></li>
                    <li><a href="sub1_1.html">사랑고백</a></li>
                </ul>
            </li>
            <li class="popitem">
                <input type="checkbox" id="collap_ck2" class="ck" checked/>
                <a href="sub2.html">꽃바구니</a>
                <label for="collap_ck2">▼</label>
                <ul class="subwrap">
                    <li><a href="sub2_1.html">개업/이전</a></li>
                    <li><a href="sub2_1.html">승진/축하</a></li>
                    <li><a href="sub2_1.html">사랑고백</a></li>
                </ul>
            </li>
            <li class="popitem">
                <input type="checkbox" id="collap_ck3" class="ck" checked/>
                <a href="sub3.html">꽃다발</a>
                <label for="collap_ck3">▼</label>
                <ul class="subwrap">
                    <li><a href="sub2_1.html">개업/이전</a></li>
                    <li><a href="sub2_1.html">승진/축하</a></li>
                    <li><a href="sub2_1.html">사랑고백</a></li>
                </ul>
            </li>
            <li class="popitem">
                <input type="checkbox" id="collap_ck4" class="ck" checked/>
                <a href="sub4.html">미니블룸</a>
                <label for="collap_ck4">▼</label>
                <ul class="subwrap">
                    <li><a href="sub2_1.html">개업/이전</a></li>
                    <li><a href="sub2_1.html">승진/축하</a></li>
                    <li><a href="sub2_1.html">사랑고백</a></li>
                </ul>
            </li>
            <li class="popiconwrap">
                <ul>
                    <li class="popicon">
                        <a href="tel:010-4020-0394" class="popicon1"></a>
                    </li>
                    <li class="popicon">
                        <a href="sms:010-4020-0394" class="popicon2"></a>
                    </li>
                    <li class="popicon">
                        <a href="mailto:hicuri@naver.com" class="popicon3"></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>