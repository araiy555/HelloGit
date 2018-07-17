<?php
session_start();
require('dbconnect.php');
// ログイン状態チェック
if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
	$_SESSION['time'] = time();
	$sql=sprintf('SELECT * FROM members WHERE id=%d',
	mysql_real_escape_string($_SESSION['id']));
	$record = mysql_query($sql) or die(mysql_query());
	$member = mysql_fetch_assoc($record);
}else{
	header('Location: login.php');
}
?>
<?php

try {

    // 接続
    $pdo = new PDO('mysql:dbname=earthwork_sample;charset=utf8;host=mysql5027.xserver.jp', 'earthwork_earth', 'q1w2e3r4', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // SQL実行に失敗した場合にもPDOExceptionを投げる
    ]);

    // 画像データを1次元配列として取得
    // 取り扱いやすいが，画像サイズ総量が大きい場合にメモリがつらい
    // $images = $pdo->query('SELECT img FROM images')->fetchAll(PDO::FETCH_COLUMN, 0);

    // 画像データを取り出せるイテレータとして取得
    // やや取り扱いにくいが，画像サイズ総量が大きくても余裕
$id = $member['id'];
    $images = $pdo->query("select * from profile where member_id='$id' ORDER BY modified DESC LIMIT 1");


} catch (PDOException $e) {
    // 500 Internal Server Errorでテキストとしてエラーメッセージを表示
http_response_code(500);
header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());


}

// HTMLとして表示 (文字コードもここで指定するために上書きする)
header('Content-Type: text/html; charset=UTF-8');

?>


<?php

try {

    // 接続
    $pdo = new PDO('mysql:dbname=earthwork_sample;charset=utf8;host=mysql5027.xserver.jp', 'earthwork_earth', 'q1w2e3r4', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // SQL実行に失敗した場合にもPDOExceptionを投げる
    ]);

    // 画像データを1次元配列として取得
    // 取り扱いやすいが，画像サイズ総量が大きい場合にメモリがつらい
    // $images = $pdo->query('SELECT img FROM images')->fetchAll(PDO::FETCH_COLUMN, 0);

    // 画像データを取り出せるイテレータとして取得
    // やや取り扱いにくいが，画像サイズ総量が大きくても余裕
$id = $member['id'];
    $gazou1 = $pdo->query("select * from upload where member_id='$id' LIMIT 1 offset 0");


} catch (PDOException $e) {
    // 500 Internal Server Errorでテキストとしてエラーメッセージを表示
http_response_code(500);
header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());


}

// HTMLとして表示 (文字コードもここで指定するために上書きする)
header('Content-Type: text/html; charset=UTF-8');

?>


<?php
require('dbconnect.php');


$id = $member['id'];


$sql = "select member_id from profile where member_id='$id' ORDER BY modified DESC LIMIT 1" ;
  $arai = mysql_query($sql) or die(mysql_error());
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Vertical Responsive Menu - Demonstration</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
  <link href='../src/vendor/normalize.css/normalize.css' rel='stylesheet'>
  <link href='../src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href="../dist/vertical-responsive-menu.min.css" rel="stylesheet">
  <link href="demo1.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />


	<style>
 #loader-bg {
     background: #fff;
     height: 100%;
     width: 100%;
     position: fixed;
     top: 0px;
     left: 0px;
     z-index: 10;
 }
 #loader-bg img {
     background: #fff;
     position: fixed;
     top: 50%;
     left: 50%;
     -webkit-transform: translate(-50%, -50%);
     -ms-transform: translate(-50%, -50%);
     transform: translate(-50%, -50%);
     z-index: 10;
 }
 </style>
 <div id="loader-bg">
  <img src="img/ajax-loader (4).gif">
 </div>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script>
 jQuery(window).on("load", function() {
  jQuery('#loader-bg').hide();
 });
 </script>



 <link rel="stylesheet" type="text/css" href="css/layout.css" />

 <link rel="stylesheet" type="text/css" href="css/style1.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
$(document).ready( function(){
// buttons for next and previous item
var buttons = { previous:$('#jslidernews1 .button-previous') ,
			 next:$('#jslidernews1 .button-next') };
 $('#jslidernews1').lofJSidernews( { interval : 4000,
								 direction		: 'opacitys',
								 easing			: 'easeInOutExpo',
								 duration		: 1200,
								 auto		 	: true,
								 maxItemDisplay  : 4,
								 navPosition     : 'horizontal', // horizontal
								 navigatorHeight : 32,
								 navigatorWidth  : 80,
								 mainWidth		: 980,
								 buttons			: buttons } );
});
</script>




	<script language="JavaScript">
	<!--
	function Check(){
	if(document.sati.search.value==""){
	alert("コメントを入力してください。");
	return	false;
	}

	return	true;
	}
	//	-->
	</script>
















</head>

<body>
  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>

		<section class="earth1">

		<a href="taitol.php"><img src="img/EARTH4.png" width="100" height="25" alt="EARTH"></a>
		</section>
				<section class="earth2">

								 <form action="searth.following.php" method="GET" name="sati" onsubmit="return Check()">
												 <input type="text" class="form-control" id="keyword"name="search" value="" placeholder="Earthの検索または人物">
								 </form>

		</section>
		<section class="earth3">
		<a href="login.php" ><img src="img/user.png" alt="<?php echo $member['simei']; ?><?php echo $member['name']; ?>"  title="<?php echo $member['simei']; ?><?php echo $member['name']; ?>" style="border-radius: 100px;"  align="middle"width="4%" height="5%" vspace="20"hspace="15"></a>

		</section>


  </header>



  <nav class="vertical_nav">
    <ul id="js-menu" class="menu">
	

			<li class="menu--item">
				<a href="taitol.php" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">ホーム</span>
				</a>
			</li>



      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          <i class="menu--icon  fa fa-fw fa-user"></i>
          <span class="menu--label">データ</span>
        </label>


        <ul class="sub_menu">

          <li class="sub_menu--item">
            <a href="date.php" class="sub_menu--link">プロフィール編集</a>
          </li>

        </ul>
      </li>



      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          <i class="menu--icon  fa fa-fw fa-user"></i>
          <span class="menu--label" >記事</span>
        </label>


        <ul class="sub_menu">


					<li class="sub_menu--item">
						<a href="kiji.input.php" class="sub_menu--link">投稿</a>
					</li>


          <li class="sub_menu--item">
            <a href="kiji.main.php" class="sub_menu--link">投稿一覧</a>
          </li>



          <li class="sub_menu--item">
            <a href="main.php" class="sub_menu--link">コメント</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">編集</a>
          </li>
        </ul>
      </li>



      <li class="menu--item">
        <a href="gazou.main.php" class="menu--link" title="Item 2">
          <i class="menu--icon  fa fa-fw fa-briefcase"></i>
          <span class="menu--label">写真</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="douga.main.php" class="menu--link" title="Item 3">
          <i class="menu--icon  fa fa-fw fa-cog"></i>
          <span class="menu--label">動画</span>
        </a>
      </li>
      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 4">
          <i class="menu--icon  fa fa-fw fa-database"></i>
          <span class="menu--label">ショッピング</span>
        </label>

        <ul class="sub_menu">



          <li class="sub_menu--item">
            <a href="hanbai.php" class="sub_menu--link">出品</a>
          </li>
					<li class="sub_menu--item">
						<a href="hanbai.main.php" class="sub_menu--link">出品一覧</a>
					</li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">コメント</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">編集</a>
          </li>
        </ul>
      </li>






      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 4">
          <i class="menu--icon  fa fa-fw fa-database"></i>
          <span class="menu--label">プロジェクト</span>
        </label>

        <ul class="sub_menu">

					<li class="sub_menu--item">
						<a href="sigot.php" class="sub_menu--link">投稿</a>
					</li>

          <li class="sub_menu--item">
            <a href="situmon.main.php" class="sub_menu--link">質問</a>
          </li>
          <li class="sub_menu--item">
            <a href="sigoto.main.php" class="sub_menu--link">依頼</a>
          </li>
          <li class="sub_menu--item">
            <a href="ibent.main.php" class="sub_menu--link">イベント</a>
          </li>
          <li class="sub_menu--item">
            <a href="kyuujin.main.php" class="sub_menu--link">求人</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">広告</a>
          </li>
        </ul>
      </li>

      <li class="menu--item">
        <a href="friend.php" class="menu--link" title="Item 5">
          <i class="menu--icon  fa fa-fw fa-globe"></i>
          <span class="menu--label">フォロー/フォロワー</span>
        </a>
      </li>
			<li class="menu--item  menu--item__has_sub_menu">

				<label class="menu--link" title="Item 4">
					<i class="menu--icon  fa fa-fw fa-database"></i>
					<span class="menu--label">メッセージ</span>
				</label>

				<ul class="sub_menu">
					<li class="sub_menu--item">
						<a href="main.message.jyusin.php" class="sub_menu--link">受信</a>
					</li>
					<li class="sub_menu--item">
						<a href="main.message.php" class="sub_menu--link">送信</a>
					</li>
					<li class="sub_menu--item">
						<a href="#" class="sub_menu--link">編集</a>
					</li>
				</ul>
			</li>


      <li class="menu--item">
        <a href="ranking.php" class="menu--link" title="Item 5">
          <i class="menu--icon  fa fa-fw fa-globe"></i>
          <span class="menu--label">ランキング</span>
        </a>
      </li>
      <li class="menu--item">
        <a href="settei.php" class="menu--link" title="Item 5">
          <i class="menu--icon  fa fa-fw fa-globe"></i>
          <span class="menu--label">設定</span>
        </a>
      </li>
			<li class="menu--item">
				<a href="ranking.php" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">お支払い</span>
				</a>
			</li>




      <li class="menu--item">
        <a href="logout.php" class="menu--link" title="Item 5">
          <i class="menu--icon  fa fa-fw fa-globe"></i>
          <span class="menu--label">ログアウト</span>
        </a>
      </li>




    </ul>

    <button id="collapse_menu" class="collapse_menu">
      <i class="collapse_menu--icon  fa fa-fw"></i>
      <span class="collapse_menu--label">Recolher menu</span>
    </button>

  </nav>







  <div class="wrapper">













				<div id="container">

			<!------------------------------------- THE CONTENT ------------------------------------------------->
			<div id="jslidernews1" class="lof-slidecontent" style="width:980px; height:340px;">
				<div class="preload"><div></div></div>
			    		 <!-- MAIN CONTENT -->
			              <div class="main-slider-content" style="width:980px; height:340px;">
			                <ul class="sliders-wrap-inner">
			                    <li>
			                            <img src="images/thumbl_980x340.png" title="落碆髓釚1" >
			                          <div class="slider-description">
			                            <div class="slider-meta"><a target="_parent" title="落碆髓釚1" href="#Category-1">/ 落碆髓釚1 /</a> <i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚1</h4>
			                            <p>冷蓁 蒟 謫・蔘 鱚諷・邇癰骼碚繻纃邇髓茗 ・鱶鱚 鼇轢鴾 瘤譛・...
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                   <li>
			                      <img src="images/thumbl_980x340_002.png" title="落碆髓釚2" >
			                         <div class="slider-description">
			                           <div class="slider-meta"><a target="_parent" title="落碆髓釚2" href="#Category-2">/ 落碆髓釚2 /</a> 	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚2</h4>
			                            <p>歴謌・繪・・鱚諷・・・褥・・逑肭﨣 苙辣 逑肭﨣 ・迥・藪..
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                   <li>
			                      <img src="images/thumbl_980x340_003.png" title="落碆髓釚3" >
			                        <div class="slider-description">
			                          <div class="slider-meta"><a target="_parent" title="落碆髓釚3" href="#Category-3">/ 落碆髓釚3 /</a> 	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚3</h4>
			                            <p>・鉐鴈 碆苜跏鱚 跪瘉譛逶・癰頌褂 苙碼 辣 艢・鱶鱚 繝迸銜籥矗鴾...
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                    <li>
			                      <img src="images/thumbl_980x340_004.png" title="落碆髓釚4" >
			                        <div class="slider-description">
			                          <div class="slider-meta"><a target="_parent" title="落碆髓釚4" href="#Category-4">/ 落碆髓釚4 /</a>	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚4</h4>
			                            <p>歴謌・詹 粤矗蜻 粳 蓁鱚鞳骰釿迸碚繻關繽韲碆聹纃・ 硴・粮赭...
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                    <li>
			                      <img src="images/thumbl_980x340_005.png" title="落碆髓釚5" >
			                        <div class="slider-description">
			                           <div class="slider-meta"><a target="_parent" title="落碆髓釚5" href="#">/ 落碆髓釚5 /</a>	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                           <h4>落碆髓釚5</h4>
			                            <p>第粤謌 鞳裨瑕・・釿迸邇齟癈袱 闔 丗? 呷邃燼釶艢鱚譛邇 闔骭銜韆鱚...
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                    <li>

			                      <img src="images/thumbl_980x340_006.png" title="落碆髓釚6" >
			                        <div class="slider-description">
			                          <div class="slider-meta"><a target="_parent" title="落碆髓釚6" href="#">/ 落碆髓釚6 /</a>	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚6</h4>
			                            <p>"野 關繼繿鴾!" 罷瑾・苙辣 驫琅纔鉙 菩闊鱚 粤逵竏 粽鼇・...
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                     <li>
			                      <img src="images/thumbl_980x340_007.png" title="落碆髓釚7" >
			                        <div class="slider-description">
			                          <div class="slider-meta"><a target="_parent" title="落碆髓釚7" href="#">/ 落碆髓釚7 /</a>	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚7</h4>
			                            <p>歴謌・詹 邇齟癈蟐 邇 跪肭迸轢蜥苙鰰褌・聽 苙痳・閻韜瑕齟韲碼・闢竡礦・..
			                            <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                      <li>
			                      <img src="images/thumbl_980x340_008.png" title="落碆髓釚8" >
			                        <div class="slider-description">

			                          <div class="slider-meta"><a target="_parent" title="落碆髓釚8" href="#">/ 落碆髓釚8 /</a>	<i> ｼ?怛鰲辮祠 尤・3, 2012 19:00</i></div>
			                            <h4>落碆髓釚8</h4>
			                            <p>浅 闍琿・鬪 闍琿・鬯 裾逑聽・謌 鴿 碆釶奛 ?...
			                                <a class="readmore" href="#">・粽釶辣綣/a>
			                            </p>
			                         </div>
			                    </li>
			                  </ul>
			            </div>
			 		   <!-- END MAIN CONTENT -->
			           <!-- NAVIGATOR -->
			           	<div class="navigator-content">
			                  <div class="button-next">啄辮繖</div>
			                  <div class="navigator-wrapper">
			                        <ul class="navigator-wrap-inner">
			                           <li><img src="images/thumbs/thumbl_980x340.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_002.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_003.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_004.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_005.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_006.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_007.png" /></li>
			                           <li><img src="images/thumbs/thumbl_980x340_008.png" /></li>
			                        </ul>
			                  </div>
			                  <div  class="button-previous">沃艢篌/div>
			             </div>
			    <!-- BUTTON PLAY-STOP -->
								<div class="button-control"><span></span></div>

	 	  </div>



			    </div>


					    <section class="matome">

			<section class="contents__inner2">
			<fieldset>
					<legend>データ</legend>

			<div class="slider">

			 <input type="radio" name="slider" class="nav" checked="checked"/>
			 <input type="radio" name="slider" class="nav"/>
			 <input type="radio" name="slider" class="nav"/>
			 <input type="radio" name="slider" class="nav"/>

			 <ul class="slider_in" style="list-style:none;">
				 <li><img src="img/sample.jpg"></li>
				 <li><img src="img/sample.jpg"></li>
				<li><img src="img/sample.jpg"></li>
				<li><img src="img/sample.jpg"></li>

			 </ul>
			</div>


		</fieldset>
					<section class="contents__inner5">
			<section class="data">
			<p>自己紹介&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 更新日：<?php echo $member['detahenkou']; ?></p>
			</section>
			</br>
			<section class="koushinbi">
			<?php echo $member['message']; ?></br>
				</section>
			<section class="data">
			<p>URL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $member['url']; ?></br></p>
			</section>
			<section class="data">
			<p>連絡番号:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $member['renrakubango']; ?></br></p>
			</section>
			<section class="data">
			<p>連絡アドレス:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $member['renrakuadoresu']; ?></br></p>
			</section>
		</section>
		<section class="contents__inner5">
		グラフ

		</section>

		<section class="contents__inner5">

		<?php if (!empty($gazou1)): ?>
		   <fieldset>
		     <legend>写真</legend>
		<?php foreach ($gazou1 as $i => $gazou): ?>
		<?php if ($i): ?>
		     <hr />
		<?php endif; ?>

		<!-- スライダー部 -->
		<div id="stage">
			<input type="radio" id="b2" name="sld">
			<input type="radio" id="b3" name="sld">
			<input type="radio" id="b4" name="sld">
			<input type="radio" id="f5" name="sld">
			<input type="radio" id="f6" name="sld">
			<input type="radio" id="f7" name="sld">
			<input id="r1" type="radio" name="sld">
			<input id="r2" type="radio" name="sld">
			<input id="r3" type="radio" name="sld">
			<input id="r4" type="radio" name="sld">
		  <!-- スライド群と送りボタン -->
		  <div id="photos">
		    <div id="photo4" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="b4"><span class="left_btn"></span></label>
		    </div>
		    <div id="photo3" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="b3"><span class="left_btn"></span></label>
		    </div>
		    <div id="photo2" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="b2"><span class="left_btn"></span></label>
		    </div>
		  	<div id="photo1" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    </div>
		    <div id="photo5" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="f5"><span class="right_btn"></span></label>
		    </div>
		    <div id="photo6" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="f6"><span class="right_btn"></span></label>
		    </div>
		    <div id="photo7" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    	<label for="f7"><span class="right_btn"></span></label>
		    </div>
		    <div id="photo8" class="pic"><img src="data:image/jpeg;base64,<?=base64_encode($gazou['data'])?>">
		    </div>
		  </div>
		  <!-- スライダー部の高さ確保 -->
		  <div style="padding-top:38%;"></div>
		  <!-- スライドボタン -->
		  <div id="btns">
		  	<label for="r1" id="btn1" class="p_bar"></label>
		  	<label for="r2" id="btn2" class="p_bar"></label>
		  	<label for="r3" id="btn3" class="p_bar"></label>
		  	<label for="r4" id="btn4" class="p_bar"></label>
		    <!-- 位置表示バー -->
		    <div id="p_btn"></div>
		  </div>
		  <!-- ボタン部の高さ確保 -->
		  <div style="padding-top:4%;"></div>


		<?php endforeach; ?>
		   </fieldset>
		<?php endif; ?>


		</section>
		<section class="contents__inner5">
		動画

		</section>
		<section class="contents__inner5">
		出品
		</section>
		<section class="contents__inner5">
		依頼
		</section>
		<section class="contents__inner5">
		漫画
		</section>
		<section class="contents__inner5">
		ファッション
		</section>
		<section class="contents__inner5">
		音楽
		</section>
		<section class="contents__inner5">
		イラスト
		</section>

		      </section>




		    <section class="contents__inner3">

		<?php
		$kml = mysql_num_rows($arai);

		if($kml == 0){

		      echo "<img src='img/user.png' alt='' width='95%' height='150%' vspace='20'hspace='7' style='border-radius: 100px'>";

		}else{


		}
		?>



			<section class="user">



		       <?php if (!empty($images)): ?>

		<?php foreach ($images as $i => $img): ?>
		<?php if ($i): ?>
		     <hr />
		<?php endif; ?>
		     </br>
			<section class="syasin">
		       <img src="data:image/jpeg;base64,<?=base64_encode($img['data'])?>"width="90%" height="10%"  vspace="0"hspace="3" style="border-radius: 10px;" alt="画像<?=$i+1?>">
			</section>

		<?php endforeach; ?>

		<?php endif; ?>


			</section>
			</br>
			<section class="seibetu">

			性別：<?php echo $member['seibetu']; ?>
			</section>
			<br>

			<section class="seibetu">
			実名：<?php echo $member['simei']; ?>
			<?php echo $member['name']; ?>
			</section>
			<br>

			<section class="seibetu">
			国籍：<?php echo $member['kokuseki']; ?>
			</section>
			<br>

			<section class="seibetu">
			年齢：<?php echo $member['tosi']; ?>歳
			</section>
			<br>

			<section class="seibetu">
			職業：<?php echo $member['job']; ?><br>
			歴<?php echo $member['syokureki']; ?>年
			</section>
			<br>


			<section class="seibetu">
			登録日：<?php echo $member['created']; ?>
			</section>
			<br>

			<section class="seibetu">
			更新日：<?php echo $member['modified']; ?>
			</section>


		      </section>


    </section>
	</section>

  </div>







  <script src="../dist/vertical-responsive-menu.min.js"></script>
<script type="text/javascript" src="http://pcvector.net/templates/pcv/js/pcvector.js"></script>
</body>
</html>
