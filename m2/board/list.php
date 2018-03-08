<?php
	require_once("../dbconfig.php");
	
	/* 페이징 시작 */
	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	/* 검색 시작 */
	
	if(isset($_GET['searchColumn'])) {
		$searchColumn = $_GET['searchColumn'];
		$subString .= '&amp;searchColumn=' . $searchColumn;
	}
	if(isset($_GET['searchText'])) {
		$searchText = $_GET['searchText'];
		$subString .= '&amp;searchText=' . $searchText;
	}
	
	if(isset($searchColumn) && isset($searchText)) {
		$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
	} else {
		$searchSql = '';
	}
	
	/* 검색 끝 */
	
	$sql = 'select count(*) as cnt from board_free' . $searchSql;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; //전체 게시글의 수
	
	if(empty($allPost)) {
		$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';
	} else {

		$onePage = 15; // 한 페이지에 보여줄 게시글의 수.
		$allPage = ceil($allPost / $onePage); //전체 페이지의 수
		
		if($page < 1 && $page > $allPage) {
?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>
<?php
			exit;
		}
	
		$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
		$currentSection = ceil($page / $oneSection); //현재 섹션
		$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
		
		$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
		
		if($currentSection == $allSection) {
			$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
		} else {
			$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
		}
		
		$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
		$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
		
		$paging = '<ul>'; // 페이징을 저장할 변수
		
		//첫 페이지가 아니라면 처음 버튼을 생성
		if($page != 1) { 
			$paging .= '<li class="page page_start"><a href="./index.php?page=1' . $subString . '">처음</a></li>';
		}
		//첫 섹션이 아니라면 이전 버튼을 생성
		if($currentSection != 1) { 
			$paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . $subString . '">이전</a></li>';
		}
		
		for($i = $firstPage; $i <= $lastPage; $i++) {
			if($i == $page) {
				$paging .= '<li class="page current">' . $i . '</li>';
			} else {
				$paging .= '<li class="page"><a href="./index.php?page=' . $i . $subString . '">' . $i . '</a></li>';
			}
		}
		
		//마지막 섹션이 아니라면 다음 버튼을 생성
		if($currentSection != $allSection) { 
			$paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . $subString . '">다음</a></li>';
		}
		
		//마지막 페이지가 아니라면 끝 버튼을 생성
		if($page != $allPage) { 
			$paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . $subString . '">끝</a></li>';
		}
		$paging .= '</ul>';
		
		/* 페이징 끝 */
		
		
		$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
		
		$sql = 'select * from board_free' . $searchSql . ' order by b_no desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
		$result = $db->query($sql);
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
    /* 게시판 */
        .paging ul { list-style:none; }
        .paging li { float:left; padding-right:10px; }
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
                <h3>문의 게시판</h3>
                <div id="boardList">
                    <table>
                        <caption class="readHide"></caption>
                        <thead>
                            <tr>
                                <th scope="col" class="no">번호</th>
                                <th scope="col" class="title">제목</th>
                                <th scope="col" class="author">작성자</th>
                                <th scope="col" class="date">작성일</th>
                                <th scope="col" class="hit">조회</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if(isset($emptyData)) {
                                    echo $emptyData;
                                } else {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $datetime = explode(' ', $row['b_date']);
                                        $date = $datetime[0];
                                        $time = $datetime[1];
                                        if($date == Date('Y-m-d'))
                                            $row['b_date'] = $time;
                                        else
                                            $row['b_date'] = $date;
                                ?>
                                <tr>
                                    <td class="no"><?php echo $row['b_no']?></td>
                                    <td class="title">
                                        <a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
                                    </td>
                                    <td class="author"><?php echo $row['b_id']?></td>
                                    <td class="date"><?php echo $row['b_date']?></td>
                                    <td class="hit"><?php echo $row['b_hit']?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                    <div class="btnSet">
                        <a href="./write.php" class="btnWrite btn">글쓰기</a>
                    </div>
                    <div class="paging">
                        <?php echo $paging ?>
                    </div>
                    <div class="searchBox">
                        <form action="./list.php" method="get">
                            <select name="searchColumn">
                                <option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
                                <option <?php echo $searchColumn=='b_content'?'selected="selected"':null?> value="b_content">내용</option>
                                <option <?php echo $searchColumn=='b_id'?'selected="selected"':null?> value="b_id">작성자</option>
                            </select>
                            <input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
                            <button type="submit">검색</button>
                        </form>
                    </div>
                </div>
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