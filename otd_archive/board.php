<?php

# OTD_ARCHIVE CODE IS SPARSE BELOW LINE 114
## ALMOST ALL HTML/JS BELOW HERE IS TAKEN DIRECTLY FROM OTD.KR
### HTML/JS HAS NOT YET BEEN FULLY STRIPPED OF UNNECESSARY COMPONENTS
####
##### 
###### SECTIONS WITH OTD_ARCHIVE CODE:
##### 
#### LINE 423 -> 492 (PHP)
### LINE 491 -> 534 (PHP)
## LINE 554 -> 570 (PHP) 
# LINE 607 -> 639 (JS)

include 'db.php';

# number of posts per page
$limit = 15;


# fetch options from URL
$page_number = $_GET['page'] ?? 1;
$user_search = $_GET['user_search'] ?? '';
$content_search = $_GET['content_search'] ?? '';
$title_search = $_GET['title_search'] ?? '';
$dn_search = $_GET['dn_search'] ?? '';

# sql setup
$board = 'board1';
$schema = 'main_posts';
$table = 'posts';


# for swapping background colours
$background_integer = 1;


# setting SQL query for number of posts for current search, depending on URL options
# setting base urls for page buttons, depending on URL options

# USER ID search
if ($user_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE author_id = '$user_search' AND board = '$board'";
	$url = 'board.php?user_search='.$user_search.'&';
}
# DISPLAY NAME search
if ($dn_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE author_name = '$dn_search' AND board = '$board'";
	$url = 'board.php?dn_search='.$user_search.'&';
}
# TITLE+CONTENT search
if ($content_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE contents ILIKE '%$content_search%' OR post_title ILIKE '%$content_search%' AND board = '$board'";
	$url = 'board.php?content_search='.$content_search.'&';
}
# TITLE search
if ($title_search !== '') {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE post_title ILIKE '%$title_search%' AND board = '$board'";
	$url = 'board.php?title_search='.$title_search.'&';
# NO SEARCH
} else {
	$total_posts_query = "SELECT COUNT(*) FROM $schema.$table WHERE board = '$board'";
	$url = 'board.php?';
}


# fetch number of posts for current search
$total_posts_result = pg_query($conn, $total_posts_query);
$total_posts = pg_fetch_result($total_posts_result, 0, 0);

#$user_search = preg_replace('/\p{C}+/u', '', $user_search);



# calculate number of pages, based on current number of posts per page
$offset = ($page_number*$limit)-$limit;
$total_pages = ceil($total_posts/$limit);


# set SQL query for current page of posts, depending on current URL options + limit/offset

# USER ID search
if ($user_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE author_id = '$user_search' AND board = '$board' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
# DISPLAY NAME search
if ($dn_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE author_name = '$dn_search' AND board = '$board' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
# TITLE+CONTENT search
if ($content_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE contents ILIKE '%$content_search%' OR post_title ILIKE '%$content_search%' AND board = '$board' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
}
# TITLE search
if ($title_search !== '') {
	$query = "SELECT * FROM $schema.$table WHERE post_title ILIKE '%$title_search%' AND board = '$board' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
# NO SEARCH
} else {
	$query = "SELECT * FROM $schema.$table WHERE board = '$board' ORDER BY post_id DESC LIMIT $limit OFFSET $offset";
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


</script></head>





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
			<!--<div id="search" class="lotto" style="margin-top: 57px;"> 
				<div class="otd-url">
<form name="surl" method="POST" style="margin:0px" onsubmit="return url_ok(this);">
	<table width="280" cellspacing="0" cellpadding="0" border="0">
		<tbody><tr>
			<td width="80">
				<strong style="color:#487CB6;font-size:11px;letter-spacing:-1px;">짧은주소 변환 &nbsp;</strong>
			</td>
			<td width="160">
				<script language="JavaScript">
					function url_ok(f){		
						if(!f.oriurl.value){
							alert('변환할 주소를 입력하세요');
							f.oriurl.focus();
							return false;
						}
						if(!urlcheck()){
							f.oriurl.focus();
							return false;
						}
						f.target="_framesub";
						f.submit();
					}
					function urlcheck(){
						var f = document.surl;
						if(f.oriurl.value.match(/(http|ftp):\/\/[!#-9A-~]+\.+[a-z0-9]/i)){
							return true;
						}else{
							alert("주소입력에 오류가 있습니다");
							return false;
						}
					}

				</script>
				<input type="text" name="oriurl" class="search" style="width:100%;display:block;">
			</td>
			<td width="40">
				<input type="image" src="./album_board_files/btn_search2.gif" alt="검색">
			</td>
		</tr>
	</tbody></table>
</form>
<iframe width="0" height="0" frameborder="0" name="_framesub" src="./album_board_files/saved_resource.html"></iframe>
</div>				<span class="otddo"></span>
								
				<div class="otd-search">
					<form name="fsearchbox" method="get" onsubmit="return fsearchbox_submit(this);" style="margin:0px;">
					<input type="hidden" name="sfl" value="wr_subject||wr_content">
					<input type="hidden" name="sop" value="and">
						
						<input name="stx" type="text" class="search">
						<input type="image" src="./album_board_files/btn_search.gif" alt="검색">
						
					</form>
				</div>

				<script language="JavaScript">
				function fsearchbox_submit(f)
				{
					if (f.stx.value.length < 2) {
						alert("검색어는 두글자 이상 입력하십시오.");
						f.stx.select();
						f.stx.focus();
						return false;
					}

					// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
					var cnt = 0;
					for (var i=0; i<f.stx.value.length; i++) {
						if (f.stx.value.charAt(i) == ' ')
							cnt++;
					}

					if (cnt > 1) {
						alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
						f.stx.select();
						f.stx.focus();
						return false;
					}

					f.action = "search.html";
					return true;
				}
				</script>
							</div>

                        
			--><div id="header" style="margin-top: 57px;">
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
					<a href="board.php"><img src="./album_board_files/gnb_menuoff01.gif" alt="Community(커뮤니티)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>
					<!--<div id="gnbSub01" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)">
						<ul class="gnb-sub-list">
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board4a29.html?bo_table=c_notice">Notice</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board3c47.html?bo_table=board1">Freeboard</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boarddaa7.html?bo_table=pds">PDS</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board7528.html?bo_table=realtime_market">RealTime Market</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardb9d1.html?bo_table=board3">Market</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardc14f.html?bo_table=album">Album</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardf259.html?bo_table=otd_lotto">OTD LOTTO</a></li>
						</ul>
					</div>-->
				</li>
								<li>
					<a href=""><img src="./album_board_files/gnb_menuoff03.gif" alt="Otd Info(소식&amp;정보)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>
					<!--<div id="gnbSub03" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)">
						<ul class="gnb-sub-list">
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardcda8.html?bo_table=product_news">Product news</a></li>
							<li><a href="../bbs/board.php?bo_table=preview">Preview</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board3276.html?bo_table=review">Review</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board197d.html?bo_table=market_info">Market Info</a></li>
						</ul>
					</div>-->
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff04.gif" alt="Forum(포럼)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
					<!--<div id="gnbSub04" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)">
						<ul class="gnb-sub-list">
							<li><a href="../bbs/board.php?bo_table=nagapump">naga의 뽐뿌방</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board662c.html?bo_table=f3">늙은델의<br>cryo is yellowing</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board0b64.html?bo_table=f8">스카페이스의<br>ColorHolic</a></li>
							<li class="last"><a href="../bbs/board.php?bo_table=merry">merry의<br>small is better</a></li>
						</ul>
					</div>-->
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff05.gif" alt="Tip &amp; Tech(팁&amp;테크)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
					<!--<div id="gnbSub05" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)">
						<ul class="gnb-sub-list">
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board9496.html?bo_table=TT">Tip &amp; Tech</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board494a.html?bo_table=FAQ">FAQ</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board6b3d.html?bo_table=qa">Q &amp; A</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board859d.html?bo_table=Aquacompany">Otd Studio</a></li>
						</ul>
					</div>-->
				</li>
				<li>
					<a href=""><img src="./album_board_files/gnb_menuoff06.gif" alt="Diary(다이어리)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>
					<!--<div id="gnbSub06" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)">
						<ul class="gnb-sub-list">
														<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boarda7f9.html?bo_table=di_sadnova">노바의<br>게임덕후 라이프</a></li>
							
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board9204.html?bo_table=di_tourdeotd">베이론의<br>Tour de OTD</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardb34b.html?bo_table=di_zerorock">제로록의<br>제로바로 노닥노닥</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board1a29.html?bo_table=blind_drunk">찌니의<br>오늘도 헤롱헤롱</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board76b5.html?bo_table=di_bebuts">비벗의<br>All That Music</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardd79d.html?bo_table=di_ppomppu">힘빠의<br>내 손 안의 세상</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board9853.html?bo_table=f1">넓은책상의<br>Storyline</a></li>
						</ul>
					</div>-->
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
.sub1 a { color:#3784B7 !important; font-weight:bold !important; 	background:url("./gn/images/bul_sub_menu_on.gif") no-repeat 4px 3px !important;}
</style>
<h3 class="board-title">Freeboard <span class="kor">자유게시판</span></h3>
<pre class="board-sub">자유롭게 글을 남기는 공간입니다.
이미지 파일은 Album 게시판을, 자료는 PDS 게시판을 이용해주시면 감사하겠습니다.
</pre><script language="javascript" src="./album_board_files/sideview.js.download"></script>

<link rel="stylesheet" type="text/css" media="all" href="./album_board_files/basic_board.css">

<!-- 게시판 목록 시작 -->
<table width="100%" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td>

    <!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
    <div class="board_top">
        <div>
		   <table width="100%" height="29" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr align="center">
				<td width="2"><img src="skin/board/basic/img/tab_on_notice_left.gif" height="29"></td>
								<td background="skin/board/basic/img/tab_on_bg.gif" style="padding:4 15 0 15" nowrap="">
								<a href="board3c47.html?bo_table=board1"><b>전체</b></a></td>
								<td width="2"><img src="skin/board/basic/img/tab_on_right.gif" height="29"></td><td width="100%" background="skin/board/basic/img/tab_bg.gif" style="padding:4 15 0 15" nowrap=""></td>			</tr>
		   </tbody></table>
        </div>
        <div class="board_total">
            <img src="skin/board/basic/img/icon_total.gif" align="absmiddle" border="0">
            <span style="color:#888888; font-weight:bold;">Total 39,639</span>
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
    <colgroup><col width="60">
        <col>
    <col width="110">
    <col width="40">
    <col width="50">
            </colgroup><tbody><tr>
        <th>번호</th>
                <th>제&nbsp;&nbsp;&nbsp;목</th>
        <th>글쓴이</th>
        <th><a href="../gn/bbs/boardde20.html?bo_table=board1&amp;sop=and&amp;sst=wr_datetime&amp;sod=desc&amp;sfl=&amp;stx=&amp;page=1">날짜</a></th>
        <th><a href="../gn/bbs/board46bf.html?bo_table=board1&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;page=1">조회</a></th>
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
    $date_full = $row['post_date'];
    $date_parts = explode(' : ', $date_full)[1];
    $date_short = DateTime::createFromFormat('y-m-d H:i', $date_parts)->format('Y-m-d');

	# calculate a 'post number'
    $post_number = $total_posts-(($page_number-1)*$limit)-$post_counter;

	# fetch post title
    $post_title = $row['post_title'];


	# create html for each post

    echo '<tr class="bg'.$background_integer.'">';
	if ($background_integer == 1) {
		$background_integer = 0;
	} else {
		$background_integer = 1;
	}
    echo '<td class="num">'.$post_number.'</td>';
    echo '<td class="subject">';
    echo '<a href="board_post.php?post_id='.$row['post_id'].'">'.$post_title.'</a> 
    <a href="board_post.php?post_id='.$row['post_id'].'"></td>';
    #comment count
    #echo <span class="comment">(6)</span></a>             
    echo '<td class="name">
    <a href="board.php?user_search='.$row['author_id'].'" title="['.$row['author_id'].']'.$row['author_name'].'">
    <span class="member">';
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
    <select name="sfl" id="searchOption">
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
    const selectElement = document.getElementById('searchOption');
    const inputValue = document.querySelector('#searchForm input[name="stx"]').value;

    // Determine the URL based on the selected option
    let url;
    switch (selectElement.value) {
      	case 'wr_subject':
			url = 'board.php?title_search=' + encodeURIComponent(inputValue);
			break;
      	case 'wr_content':
			url = 'board.php?content_search=' + encodeURIComponent(inputValue);
			break;
    	case 'mb_id,1':
			url = 'board.php?user_search=' + encodeURIComponent(inputValue);
			break;
	  	case 'dn':
			url = 'board.php?dn_search=' + encodeURIComponent(inputValue);
			break;

      default:
        // Handle other cases or provide a default URL
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