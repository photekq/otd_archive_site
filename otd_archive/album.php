<?php

# OTD_ARCHIVE CODE IS SPARSE BELOW LINE 101
## ALMOST ALL HTML/JS BELOW HERE IS TAKEN DIRECTLY FROM OTD.KR
### HTML/JS HAS NOT YET BEEN FULLY STRIPPED OF UNNECESSARY COMPONENTS
####
##### 
###### SECTIONS WITH OTD_ARCHIVE CODE:
##### 
#### LINE 187 -> 191 (HTML/CSS)
### LINE 368 -> 508 (PHP)
## LINE 525 -> 641 (PHP)
# LINE 578 -> 608 (JS)

include 'db.php';

# number of posts per page
$limit = 12;


# fetch options from URL
$page_number = $_GET['page'] ?? 1;
$user_search = $_GET['user_search'] ?? '';
$content_search = $_GET['content_search'] ?? '';
$title_search = $_GET['title_search'] ?? '';
$dn_search = $_GET['dn_search'] ?? '';

# sql setup
$schema = 'album_posts';
$table = 'posts';

# for swapping background colours
$background_integer = 1;



# setting SQL query for number of posts for current search, depending on URL options
# setting base urls for page buttons, depending on URL options

# USER ID search
if ($user_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE author_id = '$user_search'";
	$url = 'album.php?user_search='.$user_search.'&';
}
# DISPLAY NAME search
if ($dn_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE author_name = '$dn_search'";
	$url = 'album.php?dn_search='.$user_search.'&';
}
# TITLE+CONTENT search
if ($content_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE contents ILIKE '%$content_search%' OR post_title ILIKE '%$content_search%'";
	$url = 'album.php?content_search='.$content_search.'&';
}
# TITLE search
if ($title_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE post_title ILIKE '%$title_search%'";
	$url = 'album.php?title_search='.$title_search.'&';
# NO SEARCH
} else {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table";
	$url = 'album.php?';
}

# fetch number of posts for current search
$total_posts_result = pg_query($conn, $total_posts_query);
$total_posts = pg_fetch_result($total_posts_result, 0, 0);

# calculate number of pages, based on current number of posts per page
$offset = ($page_number*$limit)-$limit;
$total_pages = ceil($total_posts/$limit);

# set SQL query for current page of posts, depending on current URL options + limit/offset
if ($user_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE author_id = '$user_search' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
if ($dn_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE author_name = '$dn_search' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
if ($content_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE contents ILIKE '%$content_search%' OR post_title ILIKE '%$content_search%' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
if ($title_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE post_title ILIKE '%$title_search%' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
} else {
	$query = "SELECT * FROM $schema.$table ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}

# fetch posts for current page
$result = pg_query($conn, $query);
if (!$result) {
    echo "Query failed";
    exit;
}


### calculations for page buttons
$visible_pages = 10;
$first_page = max($page_number - floor($visible_pages / 2), 1);
$last_page = min($first_page + $visible_pages - 1, $total_pages);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<meta name="Keywords" content="오티디, OTD, 커스텀 키보드, 356, LIMKB">
<meta name="Description" content="오티디, OTD, 커스텀 키보드, 356, LIMKB">

<link rel="icon" href="./img/otd.ico">
<title>OTD [on the desk]</title>
<link rel="stylesheet" href="./album_board_files/style.css" type="text/css">
<link rel="alternate stylesheet" type="text/css" href="./album_board_files/left_on.css" title="style1" media="screen" disabled="">
<link rel="alternate stylesheet" type="text/css" href="./album_board_files/left_off.css" title="style2" media="screen" disabled="">
<script type="text/javascript">
<!--
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3)
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) {
	v=args[i+2];
	if (obj.style) {
			obj=obj.style;
			v=(v=='show')?'block':(v=='hide')?'none':v;
		}
	obj.display=v;
	}
}
</script>




<!--// 단축키 스크립트 -->
<script language="javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var g4_path      = "..";
var g4_bbs       = "bbs";
var g4_bbs_img   = "img";
var g4_url       = "../gn/index.html";
var g4_is_member = "";
var g4_is_admin  = "";
var g4_bo_table  = "album";
var g4_sca       = "";
var g4_charset   = "utf-8";
var g4_cookie_domain = "";
var g4_is_gecko  = navigator.userAgent.toLowerCase().indexOf("gecko") != -1;
var g4_is_ie     = navigator.userAgent.toLowerCase().indexOf("msie") != -1;
</script><script type="text/javascript" src="./album_board_files/otd_base.js.download"></script><script type="text/javascript" src="./album_board_files/common.js.download"></script><script type="text/javascript" src="./album_board_files/ui.core.js.download"></script><script type="text/javascript" src="./album_board_files/ui.draggable.js.download"></script><link rel="stylesheet" type="text/css" media="all" href="./album_board_files/gallery.css"><script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function($){

		gallery();
		//setInterval(realtime_market, 3000);
/*
		function MarketMsgHandler(data) {
			alert(data);
		}

		function realtime_market() {
			$.post("../test.ajax.php?bo_table=board3", MarketMsgHandler);
		}

		realtime_market();

	jQuery(function() {
		jQuery("#dragChat").draggable();
	});
*/

	});


</script>
</head>





<!--<script type="text/javascript" src="../js/jquery.js"></script>-->



<body topmargin="0" leftmargin="0">
<div class="header" style="z-index: 999999; position: fixed; top: 0; left: 0; width: 100%; background-color: #f1f1f1; padding: 10px; text-align: center; border-bottom: 2px solid black;">
    <h1>This website is a clone of OTD.KR - it only exists to maintain the historical information that OTD once housed, and to act as a monument to this incredible, passionate community. Nothing presented here is the original work of kbdarchive.org</h1>
	<h1>❤️ 길을 열어주셔서 감사합니다 ❤️</h1>
</div>

<a name="otd_top"></a>
<script type="text/javascript" src="./album_board_files/otd.js.download"></script>
<script type="text/javascript" src="./album_board_files/otd_base.js.download"></script>

<div id="bodyWrap">
	<div id="btnWrap">
		<div id="wrapper">  
			<div id="header" style="margin-top: 57px;">
				<h1 class="otd-logo"><a href="index.php"><img src="./album_board_files/otd_logo.gif" alt="Otd [On the desk]"></a></h1>

				<div class="login-set" style="width:600px;">
					
<script type="text/javascript" src="./album_board_files/capslock.js.download"></script><div id="capslock_info" style="display:none; position:absolute;"><img src="./img/capslock.gif"></div>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
function chkReset(f) 
{
    if (bReset) { if ( f.mb_id.value == '아이디' ) f.mb_id.value = ''; bReset = false; }
    document.getElementById("pw1").style.display = "none";
    document.getElementById("pw2").style.display = "";
}
</script>


<!-- 로그인 전 외부로그인 시작 -->
<form name="fhead" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" style="margin:0px;">
<input type="hidden" name="url" value="%2Fbbs%2Fboard.php%3Fbo_table%3Dalbum">
<input type="hidden" name="chk" value="Y">

<div class="login-box">
	<div class="login-set">
		<label for="sId"><img src="./album_board_files/txt_id.gif" alt="아이디"></label><input name="mb_id" id="sId" type="text" class="ed main" maxlength="20" required="" itemname="아이디" value="아이디" onmouseover="chkReset(this.form);" onfocus="chkReset(this.form);" style="background-image: url(&quot;./js/wrest.gif&quot;); background-position: right top; background-repeat: no-repeat;">

		<div id="pw1">
			<label for="sPass"><img src="./album_board_files/txt_pw.gif" alt="비밀번호"></label><input type="text" id="sPass" class="ed main" maxlength="20" required="" itemname="패스워드" value="패스워드" onmouseover="chkReset(this.form);" onfocus="chkReset(this.form);" style="background-image: url(&quot;./js/wrest.gif&quot;); background-position: right top; background-repeat: no-repeat;">
		</div>
		<div id="pw2" style="display:none;">
			<label for="outlogin_mb_password"><img src="./album_board_files/txt_pw.gif" alt="비밀번호"></label><input name="mb_password" id="outlogin_mb_password" type="password" class="ed main" maxlength="20" itemname="패스워드" onmouseover="chkReset(this.form);" onfocus="chkReset(this.form);" onkeypress="check_capslock(event, &#39;outlogin_mb_password&#39;);">
		</div>
		<input type="image" class="img" src="./album_board_files/txt_login.gif" alt="로그인">
		

		<div class="login-option">
			<input type="checkbox" class="id-save" name="auto_login" id="idSave" value="1">auto</label>
			<img src="./album_board_files/txt_find.gif" alt="ID/PASS 찾기">
			<img src="./album_board_files/txt_join.gif" alt="회원가입">
		</div>
	</div>
</div>
</form>


<!-- 로그인 전 외부로그인 끝 -->				</div>
			</div>

			<hr>

			<div id="containerWrap">
				<div id="container">
					<div id="Gnb">
						<div class="gap"></div>
<ul class="Gnb-menu">
				<li>
					<a href="album.php"><img src="./album_board_files/gnb_menuoff01.gif" alt="Community(커뮤니티)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>
				</li>
								<li>
					<a href=""><img src="./album_board_files/gnb_menuoff03.gif" alt="Otd Info(소식&amp;정보)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff04.gif" alt="Forum(포럼)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff05.gif" alt="Tip &amp; Tech(팁&amp;테크)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff06.gif" alt="Diary(다이어리)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
				</li>
							</ul>
						<script type="text/javascript">
							jQuery('#Gnb ul.M-nav li ul.community li a').addClass("selected");
						</script>
					</div>

					<div id="sidebar">
						<div class="left-menu-wrap">
	<h2 class="sub-title">Community</h2>
	<ul class="sub-menu">
		<li class="sub5"><a href="">Notice</a></li>
		<li class="sub1"><a href="board.php">Freeboard</a></li>
		<li class="sub2"><a href="">PDS</a></li>
		<li class="sub3"><a href="">Market</a></li>
		<li class="sub4"><a href="album.php">Album</a></li>
		<li class="sub6 last"><a href="">OTD LOTTO</a></li>
	</ul>
</div>											</div>
					<div id="content">
<style type="text/css">
.sub4 a { color:#3784B7 !important; font-weight:bold !important; 	background:url("./gn/images/bul_sub_menu_on.gif") no-repeat 4px 3px !important;}
</style>
<h3 class="board-title">Album <span class="kor">사진앨범</span></h3>
<pre class="board-sub">사진이나 이미지 파일을 자유롭게 올리는 게시판 입니다
저작권 관련 문제가 발생할 수 있는 이미지는 업로드를 삼가하여 주시고, 퍼온 자료는 출처를 반드시 명시하여 주시기 바랍니다.
</pre>

<link rel="stylesheet" type="text/css" media="all" href="./album_board_files/basic_board.css">

<!-- 게시판 목록 시작 -->
<table width="100%" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td>

    <!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
    <div class="board_top">
        <div>
		   <table width="100%" height="29" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr align="center">
				<td width="2"><img src="./album_board_files/tab_on_notice_left.gif" height="29"></td>
								<td background="./album_board_files/tab_on_bg.gif" style="padding:4 15 0 15" nowrap="">
								<a href="album.php"><b>전체</b></a></td>
								<td width="2"><img src="./album_board_files/tab_on_right.gif" height="29"></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[제품/정물]">제품/정물</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[모임/인물]">모임/인물</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[일상/풍경]">일상/풍경</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[책상/인증]">책상/인증</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[조립수기]">조립수기</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="2"><img src="./album_board_files/tab_off_left.gif"></td>
										 <td background="./album_board_files/tab_off_bg.gif" style="padding:4 15 0 15" nowrap="">
										 <a href="album.php?title_search=[기타]">기타</a></td>
										 <td width="2"><img src="./album_board_files/tab_off_right.gif" '=""></td><td width="100%" background="./album_board_files/tab_bg.gif" style="padding:4 15 0 15" nowrap=""></td>			</tr>
		   </tbody></table>
        </div>

        <div class="board_total">
            <img src="./album_board_files/icon_total.gif" align="absmiddle" border="0">
            <span style="color:#888888; font-weight:bold;">Total 8,495</span>
                                </div>
    </div>

    <!-- 제목 -->
    <form name="fboardlist" method="post">
    <input type="hidden" name="bo_table" value="album">
    <input type="hidden" name="sfl" value="">
    <input type="hidden" name="stx" value="">
    <input type="hidden" name="spt" value="">
    <input type="hidden" name="page" value="1">
    <input type="hidden" name="sw" value="">

    <table cellspacing="0" cellpadding="0" class="board_list">
    <colgroup><col width="50">
        <col width="10">
    <col width="110">
    <col>
    <col width="90">
    <col width="40">
    <col width="40">
            </colgroup><tbody><tr>
        <th>번호</th>
                <th>&nbsp;&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;&nbsp;</th>
        <th>제&nbsp;&nbsp;&nbsp;목</th>
        <th>글쓴이</th>
        <th>날짜</a></th>
        <th>조회</a></th>
                    </tr>

                

<?php
#####
# setting up variables to hold post values,
# and altering/fixing scraped data
#####

# used for the post number to the left of each post
$post_counter = 0;



# for each post retrieved
while ($row = pg_fetch_assoc($result)) {
	# alter date format
	$date_full = $row['post_date']; # FORMAT -> "작성일 : 08-07-07 16:41"
    $date_parts = explode(' : ', $date_full)[1];
    $date_short = DateTime::createFromFormat('y-m-d H:i', $date_parts)->format('Y-m-d'); # FORMAT -> YYYY-MM-DD

	# calculate a 'post number'
    $post_number = $total_posts-(($page_number-1)*$limit)-$post_counter;
	
	# fetch post content
    $post_content = $row['contents'];

	# create shortened version of content with no HTML tags, for text preview section
    $stripped_content = strip_tags($post_content);
    if (mb_strlen($stripped_content) > 200) {
        $shortened_text = mb_substr($stripped_content, 0, 200) . '...';
    } else {
        $shortened_text = $stripped_content;
    }

	# grab post category + title
    $post_category_title = $row['post_title'];

	# separate category + title
    $first_title_pattern = '/^\[(.*?)\]/';
	# check if category is present
    if (preg_match($first_title_pattern, $post_category_title)) {
        $title_pattern = '/^\[(.*?)\]\s*(.*?)$/';

        preg_match($title_pattern, $post_category_title, $matches);
        $post_category = $matches[1];
        $post_title = $matches[2];
	# if no category is present
    } else {
        $post_category = ""; // No category
        $post_title = $post_category_title; // Title
    }



	$search = array(
		'src="http://otd.kr',
		'src="https://otd.kr',
		'src="http://www.otd.kr',
		'src="https://www.otd.kr',
		'src="/',
		'src="../',
		'href="http://otd.kr',
		'href="https://otd.kr',
		'href="http://www.otd.kr',
		'href="https://www.otd.kr',
		'href="/',
		'href="../'
	);
	
	$replace = array(
		'src=".',
		'src=".',
		'src=".',
		'src=".',
		'src="./',
		'src="./',
		'href=".',
		'href=".',
		'href=".',
		'href=".',
		'href="./',
		'href="./'
	);

	# Fixing some incorrect img/a src/href attributes - $search gets replaced with $replace
	$post_content = str_replace($search, $replace, $post_content);

    # REPLACED WITH ABOVE -- $post_content = preg_replace('/src=["\'](\/|(\.\.\/))([^"\']+?)["\']/', 'src="./$3"', $post_content);
    # REPLACED WITH ABOVE -- $post_content = preg_replace('/href=["\'](\/|(\.\.\/))([^"\']+?)["\']/', 'href="./$3"', $post_content);
	

    # fetch first image src attribute from post content,
	# then alter URL from .jpg/.png/.etc -> .thumb.png for corresponding thumbnail

    $first_img_pattern = '/src=[\'"](.*?\.(jpg|jpeg|png))[\'"]/i';
    if (preg_match($first_img_pattern, $post_content, $matches)) {
        $first_image_src = $matches[1];
        $pathInfo = pathinfo($first_image_src);
        $directory = $pathInfo['dirname'];
        $filename = $pathInfo['filename'];

        $first_image_thumb = $directory . '/' . $filename . '.thumb.png';
	# if no match found, post has no images (rare but possible)
    } else {
        $first_image_src = '';
        $first_image_thumb = '';
    }


	#####
	#####
	# CREATING POSTS
	#####
	#####



	# iterate through every post, create every post
    echo '<tr class="bg'.$background_integer.'">';
	// alternate between background colours
	if ($background_integer == 1) {
		$background_integer = 0;
	} else {
		$background_integer = 1;
	}
    echo '<td class="num">'.$post_number.'</td>';
    echo '<td class="hit"></td>';
    # FOR FUTURE REF - add <a href=post></a> here
    echo '<td class="hit"><a href=""><img src="'.$first_image_thumb.'" border="0" style="border:1 #E7E7E7 solid" onmouseover="this.style.filter=&#39;alpha(opacity=70)&#39;" onmouseout="this.style.filter=&#39;&#39;"></a></td>';
    echo '<td class="subject">';
	if ($post_category !== '') {
    	echo '<span class="small">[<a href="album_post.php?post_id='.$row['post_id'].'">'.$post_category.'</a>]</span>&nbsp;<a href="album_post.php?post_id='.$row['post_id'].'">'.$post_title.'</a> <a href="album_post.php?post_id='.$row['post_id'].'">';
	} else {
		echo '<span class="small">[<a href="album_post.php?post_id='.$row['post_id'].'"> - </a>]</span>&nbsp;<a href="album_post.php?post_id='.$row['post_id'].'">'.$post_title.'</a> <a href="album_post.php?post_id='.$row['post_id'].'">';
	}
	# FOR FUTURE REF - comment count goes here
    #echo <span class="comment">(6)</span></a>             
    echo '<br><font color="#AAAAAA">'.$shortened_text.'</font></td>';
    echo '<td class="name"><a href="album.php?user_search='.$row['author_id'].'" title="['.$row['author_id'].']'.$row['author_name'].'"><span class="member">';
    echo $row['author_name'].'</span></a></td><td class="datetime">'.$date_short.'</td><td class="hit">-</td></tr>';
    $post_counter += 1;
}
?>
    </tbody></table>
    </form>

    <div class="board_button">
        <div style="float:left;">
                        </div>

        <div style="float:right;">
                </div>
    </div>

    <!-- 페이지 -->


    <div class="board_page">

    <?php if ($page_number > 1): ?>
        <a href="<?php echo $url; ?>page=1"><img src="./album_board_files/page_begin.gif" border="0" align="absmiddle" title="처음"></a> &nbsp;
        <a href="<?php echo $url; ?>page=<?php echo ($first_page-1); ?>"><img src="./album_board_files/page_prev.gif" border="0" align="absmiddle" title="이전"></a> &nbsp;
    <?php endif; ?>

    <?php for ($i = $first_page; $i <= $last_page; $i++): ?>
        <?php if ($i == $page_number): ?>
            &nbsp;<b><?php echo $i; ?></b>  
        <?php else: ?>
            &nbsp;<a href="<?php echo $url; ?>page=<?php echo $i; ?>"><?php echo $i; ?></a> 
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page_number < $total_pages): ?>
        <a href="<?php echo $url; ?>page=<?php echo ($last_page+1); ?>"><img src="./album_board_files/page_next.gif" border="0" align="absmiddle" title="처음"></a> &nbsp;
        <a href="<?php echo $url; ?>page=<?php echo ($total_pages); ?>"><img src="./album_board_files/page_end.gif" border="0" align="absmiddle" title="이전"></a> &nbsp;
    <?php endif; ?>
    
    
 
</div>

    <!-- 검색 -->
<div class="board_search">
  <form name="fsearch" method="get" id="searchForm">
    <input type="hidden" name="bo_table" value="album">
    <input type="hidden" name="sca" value="">
    <select name="sfl" id="search_option">
      <option value="wr_subject">title</option>
      <option value="wr_content">title + content</option>
      <option value="mb_id,1">user id</option>
	  <option value="dn">display name</option>
    </select>
    <input
      name="stx"
      class="stx"
      itemname="검색어"
      required=""
      value=""
      style="background-image: url(&quot;./js/wrest.gif&quot;); background-position: right top; background-repeat: no-repeat;"
    >
    <input
      type="image"
      src="./album_board_files/btn_search(1).gif"
      border="0"
      align="absmiddle"
      onclick="submitForm(event)"
    >
  </form>
</div>

</td></tr></tbody></table>

<script>
  function submitForm(event) {
    event.preventDefault(); // Prevent default form submission

    // Get selected option and input value
    const searchOption = document.getElementById('search_option');
    const inputValue = document.querySelector('#searchForm input[name="stx"]').value;

    // Determine the URL based on the selected option
    let url;
    switch (searchOption.value) {
      	case 'wr_subject':
			url = 'album.php?title_search=' + encodeURIComponent(inputValue);
			break;
      	case 'wr_content':
			url = 'album.php?content_search=' + encodeURIComponent(inputValue);
			break;
    	case 'mb_id,1':
			url = 'album.php?user_search=' + encodeURIComponent(inputValue);
			break;
	  	case 'dn':
			url = 'album.php?dn_search=' + encodeURIComponent(inputValue);
			break;

      	default:
        	break;
    }

    // Open the new page
    window.location.href = url;
  }
</script>

<script language="JavaScript">
/*
if ('') document.fcategory.sca.value = '';
if ('') {
    document.fsearch.sfl.value = '';

    if ('and' == 'and') 
        document.fsearch.sop[0].checked = true;

    if ('and' == 'or')
        document.fsearch.sop[1].checked = true;
} else {
    document.fsearch.sop[0].checked = true;
}
*/
</script>

<!-- 게시판 목록 끝 -->
					</div><!--// #content -->
				</div><!--// #container -->

				<hr>

				<div id="footer">
					<div class="otddo">
						OTD lotto 누적포인트 : <strong>1,799</strong> point
					</div>
					<div class="foot-line">
						<ul class="guide-menu">
							<li><a href="">OTD 이용안내</a></li>
							<li><a href="">이용약관</a></li>
							<li><a href="">개인정보취급방침</a></li>
							<!--<li><a href="javascript:alert('준비중입니다.');">청소년보호</a></li>-->
							<li><a href="">이메일무단수집거부</a></li>
							<li><a href="">제휴문의</a></li>
							<li class="last"><a href="">운영자에게</a></li>
						</ul>
						<div class="hide" style="margin-tpp:5px;">
							<br>
							<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.0/kr/"><img alt="Creative Commons License" style="border-width:0; vertical-align:middle;" src:="http://i.creativecommons.org/l/by-nc-sa/2.0/kr/80x15.png" src="./album_board_files/index.html"></a> 이 저작물은 <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.0/kr/">크리에이티브 커먼즈 저작자표시-비영리-동일조건변경허락 2.0 대한민국 라이선스</a>에 따라 이용할 수 있습니다.
						</div>
						<p class="copyright">
							copyright © 2008-2011 <span class="corp">OTD</span>. All rights reserved.<a href="./album_board_files/index.html" accesskey="m"></a>
							
						</p>
					</div>
<script>
function link_target()
{
    if (document.getElementById('writeContents')) {
        var target = '_blank';
        var link = document.getElementById('writeContents').getElementsByTagName("a");
        for(i=0;i<link.length;i++) {
            link[i].target = target;
        }
    }
}
link_target();
</script>					</div>
			</div><!--// #containerWrap -->

		</div><!--// #wrapper -->

		<div id="topbar" style="top: 402px;">
			<h2 class="quick-title">SIDE MENU</h2>
			<dl>
				<dd class="otd-wiki">
					<a target="_blank" href="">
						<strong>Otd <em>Wiki</em></strong>
						<span>무엇이든 물어보세요!</span>
					</a>
				</dd>
				<dd class="otd-lotto">
					<a href="" title="OTD 로또 참여하기">
						<strong>Otd <div>Lotto</div></strong>
						<span>누적 포인트</span>
						<em>1,799 p</em>
					</a>
				</dd>
				<dd class="otd-wiki">
					<a href="JavaScript:winOpen(&#39;../gn/talk.html&#39;,&#39;500&#39;,&#39;785&#39;,&#39;no&#39;);" title="OTD 로또 참여하기">
						<strong>Otd <em>Chat</em></strong>
						<span>강냉이 <b>Beta</b> !</span>
					</a>
				</dd>
<script language="JavaScript">
function setCookie(name, value, expiredays){ 
	var todayDate = new Date(); 
	todayDate.setDate(todayDate.getDate() + expiredays); 
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
}
function chk_hands(val){
	var f=document.handf;
	var val = 0;
	var val2 = 0;
	if(f.hands.checked) val2=1;
	if(val2 != val){
		setCookie("hans_point", val2 , 356);
		history.go(0);
	}
}
</script>
				<form name="handf">
				<dd class="otd-lotto">
					<a href="Javascript:;">
					<!-- a href="javascript:onClick=winOpen('/gn/talk.php','500','490','no');" title="OTD 로또 참여하기" -->
						<strong>Otd <div>Hands</div></strong>
						<span><input type="checkbox" name="hands" id="h1" value="Y" onclick="chk_hands();"><label for="h1"><b>켜기</b></label></span>
					</a>
				</dd>
				</form>

			</dl>
		</div><!--//#topbar-->

		<div id="leftMenu">
			<a href="javascript:setActiveStyleSheet(&#39;style2&#39;);"><img src="./album_board_files/left_menu_off.gif" alt="왼쪽메뉴 숨기기" title="왼쪽메뉴 숨기기"></a><br>
			<a href="javascript:setActiveStyleSheet(&#39;style1&#39;);"><img src="./album_board_files/left_menu_on.gif" alt="왼쪽메뉴 펼치기" title="왼쪽메뉴 펼치기"></a>
		</div>
		<script type="text/javascript" src="./album_board_files/left.js.download"></script>

	</div><!--// #btnWrap -->
</div><!--// #bodyWrap -->
<script type="text/javascript">
function winOpen(url,width,height,scroll){
	px=(screen.width - width) / 2;
	py=(screen.height - height) / 2; 
	var now = new Date();
	var openwin = window.open(url,'win'+now.getHours()+now.getSeconds(),'width='+width+',height='+height+',scrollbars='+scroll+',top='+py+',left='+px);	
}
</script>
<!-- 사용스킨 : basic_album_aqua -->
<script language="javascript" src="./album_board_files/wrest.js.download"></script>

<!-- 새창 대신 사용하는 iframe -->
<iframe width="0" height="0" name="hiddenframe" style="display:none;" src="./album_board_files/saved_resource(1).html"></iframe>

<a href=""></a>




<script type="text/javascript">
var toggle = 1;
document.ondblclick = function(event){
if(window.event) EventStatus = window.event.srcElement.tagName; else EventStatus = event.target.tagName; if(EventStatus!='INPUT'&&EventStatus!='TEXTAREA'){
if(toggle==1) toggle=99999; else toggle=1;	window.scrollTo(0,toggle)}
//	history.back();
}
</script>
</body></html>