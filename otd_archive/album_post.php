<?php

# OTD_ARCHIVE CODE IS SPARSE BELOW LINE 88
## ALMOST ALL HTML/JS BELOW HERE IS TAKEN DIRECTLY FROM OTD.KR
### HTML/JS HAS NOT YET BEEN FULLY STRIPPED OF UNNECESSARY COMPONENTS
####
##### 
###### SECTIONS WITH OTD_ARCHIVE CODE:
##### 
#### LINE 423 -> 492 (PHP)
### After extracting needed values, they are inserted where needed within the sea of HTML
## Search for <?php to find them
#


include 'db.php';

# grab post ID from URL
$post_id = $_GET['post_id'];

$schema = 'album_posts';
$table = 'posts';

# fetch post
$query = "SELECT * FROM $schema.$table WHERE post_id = $post_id";
$result = pg_query($conn, $query);
if (!$result) {
    echo "Invalid post ID supplied";
    exit;
}


if ($result) {
    # fetch post from result
    $row = pg_fetch_assoc($result);
    
    # extract necessary data from row
	# these values are inserted where needed, within the sea of HTML
	# search for <?php echo to find them
    if ($row) {
        $post_date = $row['post_date'];
        $post_title = $row['post_title'];
        $author_name = $row['author_name'];
        $author_id = $row['author_id'];
        $post_contents = $row['contents'];

		# fixing some incorrect src/href attribs

        # REPLACED WITH BELOW -- $post_contents = preg_replace('/src=["\'](\/|(\.\.\/))([^"\']+?)["\']/', 'src="./$3"', $post_contents);
        # REPLACED WITH BELOW -- $post_contents = preg_replace('/href=["\'](\/|(\.\.\/))([^"\']+?)["\']/', 'href="./$3"', $post_contents);

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
		
		# $search is replaced with $replace
        $post_contents = str_replace($search, $replace, $post_contents);
    }
}
?>


<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<!--meta http-equiv="page-enter" content="blendtrans(duration=0.5)"/>
<meta http-equiv="page-exit" content="blendtrans(duration=0.5)"/-->
<meta name="Keywords" content="오티디, OTD, 커스텀 키보드, 356, LIMKB">
<meta name="Description" content="오티디, OTD, 커스텀 키보드, 356, LIMKB">

<link rel="icon" href="./img/otd.ico">
<title>OTD [on the desk]</title>
<link rel="stylesheet" href="./album_post_files/style.css" type="text/css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="all" href="/gn/css/ie-fix.css">
<![endif]-->
<link rel="alternate stylesheet" type="text/css" href="./album_post_files/left_on.css" title="style1" media="screen" disabled="">
<link rel="alternate stylesheet" type="text/css" href="./album_post_files/left_off.css" title="style2" media="screen" disabled="">
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
//-->
</script>


<!--<script src="/gn/js/PNG.js" type="text/javascript"></script>-->



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
</script><script type="text/javascript" src="./album_post_files/otd_base.js.download"></script><script type="text/javascript" src="./album_post_files/common.js.download"></script><script type="text/javascript" src="./album_post_files/ui.core.js.download"></script><script type="text/javascript" src="./album_post_files/ui.draggable.js.download"></script><link rel="stylesheet" type="text/css" media="all" href="./album_post_files/gallery.css"><script type="text/javascript">
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


</script><style type="text/css">.highslide img {cursor: url(./highslide/graphics/index.htmlzoomin.cur), pointer !important;}

@media (max-width: 1290px) {
    .header-text {
        font-size: 90%; /* Adjust the font size as needed */
    }
}

@media (max-width: 1165px) {
    .header-text {
        font-size: 80%; /* Adjust the font size as needed */
    }
}</style></head>





<!--<script type="text/javascript" src="../js/jquery.js"></script>-->



<body topmargin="0" leftmargin="0">
<div class="header" style="z-index: 999999; position: fixed; top: 0; left: 0; width: 100%; background-color: #f1f1f1; padding: 10px; text-align: center; border-bottom: 2px solid black;">
    <h1 class="header-text">This website is a clone of OTD.KR - it only exists to maintain the historical information that OTD once housed, and to act as a monument to this incredible, passionate community. Nothing presented here is the original work of kbdarchive.org</h1>
	<h1 class="header-text">❤️ 길을 열어주셔서 감사합니다 ❤️</h1>
</div>
<a name="otd_top"></a>
<script type="text/javascript" src="./album_post_files/otd.js.download"></script>
<script type="text/javascript" src="./album_post_files/otd_base.js.download"></script>

<div id="bodyWrap">
	<div id="btnWrap">
		<div id="wrapper">  
			
			<div id="header" style="margin-top: 57px;">
				<h1 class="otd-logo"><a href="file:///E:/otd%20backup/otd/www.otd.kr/index-2.html"><img src="./album_post_files/otd_logo.gif" alt="Otd [On the desk]"></a></h1>

				<div class="login-set" style="width:600px;">
					
<script type="text/javascript" src="./album_post_files/capslock.js.download"></script><div id="capslock_info" style="display:none; position:absolute;"><img src="file:///E:/otd%20backup/otd/www.otd.kr/img/capslock.gif"></div>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
</script>


<!-- 로그인 전 외부로그인 시작 -->
<form name="fhead" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" style="margin:0px;">
<input type="hidden" name="url" value="%2Fbbs%2Fboard.php%3Fbo_table%3Dalbum%26wr_id%3D203696">
<input type="hidden" name="chk" value="Y">

<div class="login-box">
	<div class="login-set">
		<label for="sId"><img src="./album_post_files/txt_id.gif" alt="아이디"></label><input name="mb_id" id="sId" type="text" class="ed main" maxlength="20" required="" itemname="아이디" value="아이디" style="background-image: url(&quot;../js/wrest.gif&quot;); background-position: right top; background-repeat: no-repeat;">

		<div id="pw1">
			<label for="sPass"><img src="./album_post_files/txt_pw.gif" alt="비밀번호"></label><input type="text" id="sPass" class="ed main" maxlength="20" required="" itemname="패스워드" value="패스워드" style="background-image: url(&quot;../js/wrest.gif&quot;); background-position: right top; background-repeat: no-repeat;">
		</div>
		<div id="pw2" style="display:none;">
			<label for="outlogin_mb_password"><img src="./album_post_files/txt_pw.gif" alt="비밀번호"></label><input name="mb_password" id="outlogin_mb_password" type="password" class="ed main" maxlength="20" itemname="패스워드">
		</div>
		<input type="image" class="img" src="./album_post_files/txt_login.gif" alt="로그인">
		

		<div class="login-option">
			<input type="checkbox" class="id-save" name="auto_login" id="idSave" value="1" onclick="if (this.checked) { if (confirm(&#39;자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n\공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?&#39;)) { this.checked = true; } else { this.checked = false; } }" style="margin-top:3px; margin-right:3px;"> <label for="idSave">auto</label>
			<a href="javascript:win_password_forget();"><img src="./album_post_files/txt_find.gif" alt="ID/PASS 찾기"></a>
			<a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/register.html"><img src="./album_post_files/txt_join.gif" alt="회원가입"></a>
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
					<a href=""><img src="./album_post_files/gnb_menuoff01.gif" alt="Community(커뮤니티)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>
				</li>
								<li>
					<a href=""><img src="./album_post_files/gnb_menuoff03.gif" alt="Otd Info(소식&amp;정보)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;,&#39;Fcategory&#39;,&#39;&#39;,&#39;show&#39;)"></a>

				</li>
				<li>
					<a href=""><img src="./album_post_files/gnb_menuoff04.gif" alt="Forum(포럼)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>

				</li>
				<li>
					<a href=""><img src="./album_post_files/gnb_menuoff05.gif" alt="Tip &amp; Tech(팁&amp;테크)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>

				</li>
				<li>
					<a href=""><img src="./album_post_files/gnb_menuoff06.gif" alt="Diary(다이어리)" onmouseover="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;show&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)" onmouseout="MM_showHideLayers(&#39;gnbSub01&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub02&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub03&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub04&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub05&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub06&#39;,&#39;&#39;,&#39;hide&#39;,&#39;gnbSub07&#39;,&#39;&#39;,&#39;hide&#39;)"></a>

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
.sub4 a { color:#3784B7 !important; font-weight:bold !important; 	background:url("./gn/css/bul_sub_menu_on.gif") no-repeat 4px 3px !important;}
</style>
<h3 class="board-title">Album <span class="kor">사진앨범</span></h3>
<pre class="board-sub">사진이나 이미지 파일을 자유롭게 올리는 게시판 입니다
저작권 관련 문제가 발생할 수 있는 이미지는 업로드를 삼가하여 주시고, 퍼온 자료는 출처를 반드시 명시하여 주시기 바랍니다.
</pre><script language="javascript" src="./album_post_files/sideview.js.download"></script>
<script type="text/javascript" src="./album_post_files/ajax.js.download"></script>
<!-- 
    1 ) Reference to the file containing the javascript. 
    This file must be located on your server. 
-->

<script type="text/javascript" src="./album_post_files/highslide-with-gallery.js.download"></script>


<!-- 
    2) Initialize the hs object and optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
	hs.graphicsDir = '../highslide/graphics/index.html';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.wrapperClassName = 'dark borderless floating-caption';
	hs.fadeInOut = true;
	hs.dimmingOpacity = .75;

	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .6,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>

<!-- 
    3) These CSS-styles are necessary for the script to work. You may also put
    them in an external CSS-file. See the webpage for documentation.
-->
<link rel="stylesheet" type="text/css" href="./album_post_files/highslide.css">


<div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<!-- 게시글 보기 시작 -->
<table width="100%" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="./album_post_files/icon_date.gif" align="absmiddle" border="0">
    <span style="color:#888888;"><?php echo $post_date; ?></span>
    </div>

    <!-- 링크 버튼 -->
    <div style="float:right;">
            
        <a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board7df8.html?bo_table=album&amp;page="><img src="./album_post_files/btn_list.gif" border="0" align="absmiddle"></a>                         </div>
</div>

<div style="border:1px solid #ddd; clear:both; height:34px; background:url(../skin/board/basic_album_aqua/img/title_bg.gif) repeat-x;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
        <td style="padding:8px 0 0 10px;">
            <div style="color:#505050; font-size:13px; font-weight:bold; word-break:break-all;"><?php echo $post_title; ?></div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width="120">
                                </td>
    </tr>
    </tbody></table>
</div>
<div style="height:3px; background:url(../skin/board/basic_album_aqua/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>

<script language="JavaScript">
function show_link_surl(){
	var s = prompt('아래 주소를 복사하세요.','http://l.otd.kr/VDPFB3I5');
}
</script>
<div style="border:1px solid #ddd; clear:both; height:30px; background:url(../skin/board/basic_album_aqua/img/title_bg.gif) repeat-x;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
        <td style="padding:8px 10 0 10px;">
            <div style="color:#797979; font-size:11px; word-break:break-all; text-align:right;"></div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width="120">           
            <a href="javascript:show_link_surl();" style="letter-spacing:0;" title="주소 복사"><img src="./album_post_files/url_copy.gif" border="0" align="absmiddle"></a>
        </td>
    </tr>
    </tbody></table>
</div>
<div style="height:3px; background:url(../skin/board/basic_album_aqua/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="fix-table">
<tbody><tr>
    <td height="30" background="./album_post_files/view_dot.gif" style="color:#888;">
        <div style="float:left;">
        &nbsp;글쓴이 : 
        <a href="album.php?user_search=<?php echo $author_id;?>" title="[<?php echo $author_id;?>]<?php echo $author_name;?>"><span class="member"><?php echo $author_name;?></span></a>        </div>
        <div style="float:right;">
        <img src="./album_post_files/icon_view.gif" border="0" align="absmiddle"> 조회 : 456                        &nbsp;
        </div>
    </td>
</tr>

<tr> 
    <td height="150" style="word-break:break-all; padding:10px;" class="view-img">
        <span id="writeContents">
            <?php echo $post_contents;?>
        </span>
 
</td>
</tr>
</tbody></table>
<br>

<!-- 코멘트 리스트 -->
<div id="commentContents">

<?php

# fetching comments for this post
$comment_query = "SELECT * FROM $schema.comments WHERE post_id = $post_id ORDER BY comment_order ASC";
$comment_result = pg_query($conn, $comment_query);

# for each comment
while ($row = pg_fetch_assoc($comment_result)) {
	# extracting necessary data from comment row
    $comment_author_name = $row['comment_author_name'];
    $comment_author_id = $row['comment_author_id'];
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_content = nl2br($comment_content);
    $comment_reply_level = $row['reply_level'];
    $comment_reply_level = intval($comment_reply_level);

	# creating html for each comment
	echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tbody><tr>
		<td style="background:url(&#39;./album_post_files/icon_reply.gif&#39;) no-repeat 95% 2px;">
		';
		# adjusting HTML depending on reply_level. element width increased by 20px for each extra reply_level
		if ($comment_reply_level !== 0) {
			$reply_level_width = 20*$comment_reply_level;
			echo '<div style="width:'.$reply_level_width.'px; height:1px;font-size:1px;line-height:1;"></div>';
		}
	echo '
		</td>
		<td width="100%">

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td height="1" colspan="3" bgcolor="#dddddd"></td><td>
			</td></tr>
			<tr>
				<td height="1" colspan="3"></td>
			</tr>
			<tr>
				<td valign="top">
					<div style="height:28px; background:url(../skin/board/basic_album_aqua/img/co_title_bg.gif); clear:both; line-height:28px;">
						<div style="float:left; margin:2px 0 0 2px;">
							<strong><a href="album.php?user_search='.$comment_author_id.'" title="['.$comment_author_id.']'.$comment_author_name.'"><span class="member">'.$comment_author_name.'</span></a></strong>
							<span style="color:#888888; font-size:11px;">'.$comment_date.'</span>
						</div>

						<div style="float:right; margin:2px 0 0 2px;">
																															&nbsp;
						</div>
					</div>

					<!-- 코멘트 출력 -->
					<div class="comment-cont">'.$comment_content.'<div>
						

						<span id="edit_203697" style="display:none;"></span><!-- 수정 -->
						<span id="reply_203697" style="display:none;"></span><!-- 답변 -->
					</div>
					<input type="hidden" id="secret_comment_203697" value="">
					<textarea id="save_comment_203697" style="display:none;">시원하고 한적해보이는 풍경입니다.
	저도 아이들 시험 끝나면 함께 다녀와야겠네요!</textarea>
				</td>
			</tr>
			<tr>
				<td height="5" colspan="3"></td>
			</tr>
			</tbody>
	</table>
		</td>
	</tr>
	</tbody></table>';
}
?>
</div>
<!-- 코멘트 리스트 -->


<script language="javascript"> var g4_cf_filter = 'jjanglive, Jjanglive, sharemany, .jpg, .avi,     '; </script>
<script language="javascript" src="./album_post_files/filter.js.download"></script>
<script language="javascript" src="./album_post_files/md5.js.download"></script>

<div style="height:1px; line-height:1px; font-size:1px; background-color:#ddd; clear:both;">&nbsp;</div>

<div style="clear:both; height:43px;">
    <div style="float:left; margin-top:10px;">
            </div>

    <!-- 링크 버튼 -->
    <div style="float:right; margin-top:10px;">
            
        <a href=""><img src="./album_post_files/btn_list.gif" border="0" align="absmiddle"></a>                         </div>
</div>


</td></tr></tbody></table><br>

<script language="JavaScript">
function file_download(link, file) {
        document.location.href=link;
}
</script>

<script language="JavaScript" src="./album_post_files/board.js.download"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(713);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->

<link rel="stylesheet" type="text/css" media="all" href="./album_post_files/basic_board.css">

<!-- 게시판 목록 시작 -->

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
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/gn/otdGuide.html">OTD 이용안내</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/gn/policy_stip.html">이용약관</a></li>
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/gn/policy_course.html">개인정보취급방침</a></li>
							<!--<li><a href="javascript:alert('준비중입니다.');">청소년보호</a></li>-->
							<li><a href="file:///E:/otd%20backup/otd/www.otd.kr/gn/otdEmail.html">이메일무단수집거부</a></li>
							<li><a href="">제휴문의</a></li>
							<li class="last"><a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/board63a8.html?bo_table=to_admin">운영자에게</a></li>
						</ul>
						<div class="hide" style="margin-tpp:5px;">
							<br>
							<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.0/kr/"><img alt="Creative Commons License" style="border-width:0; vertical-align:middle;" src:="http://i.creativecommons.org/l/by-nc-sa/2.0/kr/80x15.png" src="./album_post_files/index.html"></a> 이 저작물은 <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.0/kr/">크리에이티브 커먼즈 저작자표시-비영리-동일조건변경허락 2.0 대한민국 라이선스</a>에 따라 이용할 수 있습니다.
						</div>
						<p class="copyright">
							copyright © 2008-2011 <span class="corp">OTD</span>. All rights reserved.<a href="./album_post_files/index.html" accesskey="m"></a>
							
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

		<div id="topbar" style="top: 110px;">
			<h2 class="quick-title">SIDE MENU</h2>
			<dl>
				<dd class="otd-wiki">
					<a target="_blank" href="file:///E:/otd%20backup/otd/www.otd.kr/gn/wiki.html">
						<strong>Otd <em>Wiki</em></strong>
						<span>무엇이든 물어보세요!</span>
					</a>
				</dd>
				<dd class="otd-lotto">
					<a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardf259.html?bo_table=otd_lotto" title="OTD 로또 참여하기">
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
			<a href="javascript:setActiveStyleSheet(&#39;style2&#39;);"><img src="./album_post_files/left_menu_off.gif" alt="왼쪽메뉴 숨기기" title="왼쪽메뉴 숨기기"></a><br>
			<a href="javascript:setActiveStyleSheet(&#39;style1&#39;);"><img src="./album_post_files/left_menu_on.gif" alt="왼쪽메뉴 펼치기" title="왼쪽메뉴 펼치기"></a>
		</div>
		<script type="text/javascript" src="./album_post_files/left.js.download"></script>

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
<script language="javascript" src="./album_post_files/wrest.js.download"></script>

<!-- 새창 대신 사용하는 iframe -->
<iframe width="0" height="0" name="hiddenframe" style="display:none;" src="./album_post_files/saved_resource(1).html"></iframe>

<a href="file:///E:/otd%20backup/otd/www.otd.kr/bbs/boardfd84.html#otd_end"></a>




<script type="text/javascript">
var toggle = 1;
document.ondblclick = function(event){
if(window.event) EventStatus = window.event.srcElement.tagName; else EventStatus = event.target.tagName; if(EventStatus!='INPUT'&&EventStatus!='TEXTAREA'){
if(toggle==1) toggle=99999; else toggle=1;	window.scrollTo(0,toggle)}
//	history.back();
}
</script>
<div class="highslide-container" style="padding: 0px; border: none; margin: 0px; position: absolute; left: 0px; top: 0px; width: 100%; z-index: 1001; direction: ltr;"><a class="highslide-loading" title="Click to cancel" href="javascript:;" style="position: absolute; top: -9999px; opacity: 0.75; z-index: 1;">Loading...</a><div style="display: none;"></div><div class="highslide-viewport" style="padding: 0px; border: none; margin: 0px;"></div><table cellspacing="0" style="padding: 0px; border: none; margin: 0px; visibility: hidden; position: absolute; border-collapse: collapse; width: 0px;"><tbody style="padding: 0px; border: none; margin: 0px;"><tr style="padding: 0px; border: none; margin: 0px; height: auto;"><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td></tr><tr style="padding: 0px; border: none; margin: 0px; height: auto;"><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td><td class="drop-shadow highslide-outline" style="z-index: 9999; padding: 0px; border: none; margin: 0px; position: relative;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td></tr><tr style="padding: 0px; border: none; margin: 0px; height: auto;"><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px;"></td></tr></tbody></table></div></body><!-- Mirrored from www.otd.kr/bbs/board.php?bo_table=album&wr_id=203696 by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jun 2021 01:24:20 GMT --></html>