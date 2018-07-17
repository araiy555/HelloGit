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
    $pdo = new PDO('mysql:dbname=mini_bbs;charset=utf8;host=localhost', 'root', '1234', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // SQL実行に失敗した場合にもPDOExceptionを投げる
    ]);

    // 画像データを1次元配列として取得
    // 取り扱いやすいが，画像サイズ総量が大きい場合にメモリがつらい
    // $images = $pdo->query('SELECT img FROM images')->fetchAll(PDO::FETCH_COLUMN, 0);

    // 画像データを取り出せるイテレータとして取得
    // やや取り扱いにくいが，画像サイズ総量が大きくても余裕
$id = $member['id'];
    $images = $pdo->query('select * from upload where member_id='.$id);

} catch (PDOException $e) {
    // 500 Internal Server Errorでテキストとしてエラーメッセージを表示
http_response_code(500);
header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());


}

// HTMLとして表示 (文字コードもここで指定するために上書きする)
header('Content-Type: text/html; charset=UTF-8');

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
  <link href="demo.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />




	<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<style>
				body{
						background-color: #FFF
				}
				.demo-gallery > ul {
						margin-bottom: 0;
				}
				.demo-gallery > ul > li {
						float: left;
						margin-bottom: 15px;
						margin-right: 20px;
						width: 200px;
				}
				.demo-gallery > ul > li a {
						border: 3px solid #FFF;
						border-radius: 3px;
						display: block;
						overflow: hidden;
						position: relative;
						float: left;
				}
				.demo-gallery > ul > li a > img {
						-webkit-transition: -webkit-transform 0.15s ease 0s;
						-moz-transition: -moz-transform 0.15s ease 0s;
						-o-transition: -o-transform 0.15s ease 0s;
						transition: transform 0.15s ease 0s;
						-webkit-transform: scale3d(1, 1, 1);
						transform: scale3d(1, 1, 1);
						height: 100%;
						width: 100%;
				}
				.demo-gallery > ul > li a:hover > img {
						-webkit-transform: scale3d(1.1, 1.1, 1.1);
						transform: scale3d(1.1, 1.1, 1.1);
				}
				.demo-gallery > ul > li a:hover .demo-gallery-poster > img {
						opacity: 1;
				}
				.demo-gallery > ul > li a .demo-gallery-poster {
						background-color: rgba(0, 0, 0, 0.1);
						bottom: 0;
						left: 0;
						position: absolute;
						right: 0;
						top: 0;
						-webkit-transition: background-color 0.15s ease 0s;
						-o-transition: background-color 0.15s ease 0s;
						transition: background-color 0.15s ease 0s;
				}
				.demo-gallery > ul > li a .demo-gallery-poster > img {
						left: 50%;
						margin-left: -10px;
						margin-top: -10px;
						opacity: 0;
						position: absolute;
						top: 50%;
						-webkit-transition: opacity 0.3s ease 0s;
						-o-transition: opacity 0.3s ease 0s;
						transition: opacity 0.3s ease 0s;
				}
				.demo-gallery > ul > li a:hover .demo-gallery-poster {
						background-color: rgba(0, 0, 0, 0.5);
				}
				.demo-gallery .justified-gallery > a > img {
						-webkit-transition: -webkit-transform 0.15s ease 0s;
						-moz-transition: -moz-transform 0.15s ease 0s;
						-o-transition: -o-transform 0.15s ease 0s;
						transition: transform 0.15s ease 0s;
						-webkit-transform: scale3d(1, 1, 1);
						transform: scale3d(1, 1, 1);
						height: 100%;
						width: 100%;
				}
				.demo-gallery .justified-gallery > a:hover > img {
						-webkit-transform: scale3d(1.1, 1.1, 1.1);
						transform: scale3d(1.1, 1.1, 1.1);
				}
				.demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
						opacity: 1;
				}
				.demo-gallery .justified-gallery > a .demo-gallery-poster {
						background-color: rgba(0, 0, 0, 0.1);
						bottom: 0;
						left: 0;
						position: absolute;
						right: 0;
						top: 0;
						-webkit-transition: background-color 0.15s ease 0s;
						-o-transition: background-color 0.15s ease 0s;
						transition: background-color 0.15s ease 0s;
				}
				.demo-gallery .justified-gallery > a .demo-gallery-poster > img {
						left: 50%;
						margin-left: -10px;
						margin-top: -10px;
						opacity: 0;
						position: absolute;
						top: 50%;
						-webkit-transition: opacity 0.3s ease 0s;
						-o-transition: opacity 0.3s ease 0s;
						transition: opacity 0.3s ease 0s;
				}
				.demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
						background-color: rgba(0, 0, 0, 0.5);
				}
				.demo-gallery .video .demo-gallery-poster img {
						height: 48px;
						margin-left: -24px;
						margin-top: -24px;
						opacity: 0.8;
						width: 48px;
				}
				.demo-gallery.dark > ul > li a {
						border: 3px solid #04070a;
				}
				.home .demo-gallery {
						padding-bottom: 80px;
				}
		</style>









</head>

<body>

  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>
		<section class="earth1">

		<a href="taitol.php"><img src="img/EARTH4.png" width="170" height="25" alt="EARTH"></a>
		</section>

				<section class="earth2">
					<form action="searth.following.php" method="GET" name="sati" onsubmit="return Check()">
									<input type="text" class="form-control" id="keyword"name="search" value="<?php echo $name;?>" value="" placeholder="Earthの検索または人物">
					</form>


		</section>
		<section class="earth3">
		<a href="login.php" ><img src="img/user.png" alt="<?php echo $member['simei']; ?><?php echo $member['name']; ?>"  title="<?php echo $member['simei']; ?><?php echo $member['name']; ?>" style="border-radius: 100px;"  align="middle"width="4%" height="5%" vspace="10"hspace="5"></a>


		</section>



  </header>

  <nav class="vertical_nav">
    <ul id="js-menu" class="menu">



      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          <i class="menu--icon  fa fa-fw fa-user"></i>
          <span class="menu--label">データ</span>
        </label>


        <ul class="sub_menu">

          <li class="sub_menu--item">
            <a href="main.php" class="sub_menu--link">プロフィール</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">編集</a>
          </li>
        </ul>
      </li>



      <li class="menu--item  menu--item__has_sub_menu">

        <label class="menu--link" title="Item 1">
          <i class="menu--icon  fa fa-fw fa-user"></i>
          <span class="menu--label">記事</span>
        </label>


        <ul class="sub_menu">

          <li class="sub_menu--item">
            <a href="kiji.main.php" class="sub_menu--link">投稿</a>
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
            <a href="hanbai.main.php" class="sub_menu--link">出品</a>
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
            <a href="situmon.main.php" class="sub_menu--link">質問</a>
          </li>
          <li class="sub_menu--item">
            <a href="sigoto.main.php" class="sub_menu--link">依頼</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">イベント</a>
          </li>
          <li class="sub_menu--item">
            <a href="#" class="sub_menu--link">求人</a>
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
        <a href="../../logout.php" class="menu--link" title="Item 5">
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

    <section class="contents__inner2">
			<div class="demo-gallery">
			          <ul id="lightgallery" class="list-unstyled row">


			<?php if (!empty($images)): ?>

			<?php foreach ($images as $i => $img): ?>
			<?php if ($i): ?>

			<?php endif; ?>


			 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="data:image/jpeg;base64,<?=base64_encode($img['data'])?>" data-src="data:image/jpeg;base64,<?=base64_encode($img['data'])?>" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">

			       <a href="">
			     <img class="img-responsive" src="data:image/jpeg;base64,<?=base64_encode($img['data'])?>" alt="Thumb-<?=$i+1?>">
				</a>
				</li>



			<?php endforeach; ?>

			<?php endif; ?>
			</ul>

				</div>
			</section>





			     <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
			        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
			<script>
			  lightGallery(document.getElementById('lightgallery'));
			</script>


    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
