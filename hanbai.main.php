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
    $profile = $pdo->query("select * from profile where member_id='$id' ORDER BY modified DESC LIMIT 1");


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

$id = $member['id'];

 $sql = sprintf("SELECT * FROM  hanbaiposts WHERE member_id = '%s' ORDER BY created DESC",
  mysql_real_escape_string($id)
);

 $record = mysql_query($sql) or die(mysql_error());

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



		<link rel="stylesheet" href="css/style.css">
	<!--左側のメニュー-->

					<link rel="stylesheet" href="css/content.css">


	<!--画像の整列-->
	<link rel="stylesheet" href="css/mixitup.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
-->
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
		  <div class="content">
		    <div class="content_inner">
		      <article>

		        
		        <section>
		          <div class="controls">
		            <div class="mixitup_select">
		              <select id="FilterSelect" class="ctSelect">
		                <option value="all"><span></span>すべて表示</option>
		                <option value=".category-1">カテゴリ１</option>
		                <option value=".category-2">カテゴリ２</option>
		              </select>
		            </div>
		            <div class="mixitup_select">
		              <select id="SortSelect" class="ctSelect">
		                <option value="default">標準</option>
		                <option value="myorder:asc">安い順番</option>
		                <option value="myorder:desc">高い順番</option>
		                <option value="random">ランダム</option>
		              </select>
		            </div>
		            <div class="ChangeLayoutlist changeLayout_button"><i class="fa fa-th-list"></i></div>
		            <div class="ChangeLayoutgrid changeLayout_button cb_active"><i class="fa fa-th-large"></i></div>
		          </div>
		          <div id="Shop" class="shop">

								<?php

								while($post = mysql_fetch_assoc($record)):
								?>
									<section class="contents__inner5">

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
							$gazou = $post['gazouid'];
									$images = $pdo->query("select * from upload where member_id='$id' AND id='$gazou'");


							} catch (PDOException $e) {
									// 500 Internal Server Errorでテキストとしてエラーメッセージを表示
							http_response_code(500);
							header('Content-Type: text/plain; charset=UTF-8', true, 500);
									exit($e->getMessage());


							}
						?>

								<?php if (!empty($images)): ?>

							<?php foreach ($images as $i => $img): ?>
							<?php if ($i): ?>
									 <hr />
							<?php endif; ?>

		            <div class="mix mixit_grid category-1" data-myorder="5200"><a href="shop_goods.html"><img src="data:image/jpeg;base64,<?=base64_encode($img['data'])?>" alt="goods" /></a>
		              <div class="item_content">
		                <p class="category"><a href="hanbainaiyou.php?id=<?php echo $post['id']; ?>"> <?php echo $post['taitol']; ?></a></p>
<p class="description">テキストテキストテキストテキストテキストテキストテキスト</p>

		              </div>
		              <p class="price"><?php echo $post['nedan']; ?></p>
		            </div>
							<?php endforeach; ?>

							<?php endif; ?>
							</section>
						<?php
						endwhile;
						?>


		            <div class="gap"></div>
		            <div class="gap"></div>
		          </div>
		        </section>
		      </article>
		      <!-- / .content_inner -->
		    </div>
		    <!-- / .content -->
		  </div>
		  <!-- / .wrapper -->
		</div>
		<footer id="footer">
		  <ul class="footerlink">
		    <li><a href="privacy.html">プライバシーポリシー</a></li>
		    <li><a href="company.html">会社概要</a></li>
		    <li><a href="tokusyouhou.html">特定商取引法に基づく表記</a></li>
		  </ul>
		  <p class="copyright">© 2016 企業名やサイト名など All Rights Reserved.</p>
		</footer>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script><!--googleのCDN（ネットワーク経由でコンテンツを提供するサービス）よりjqueryをロード-->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> <!--エフェクト動作-->
		<script src="js/nav.jquery.min.js"></script> <!--右上のメニュー-->
		<script>
		    $('.nav').nav();
		</script>
		<script src="js/vertical-responsive-menu.min.js" ></script> <!--左側のメニュー-->
		<script src="js/footerFixed.js"></script><!--フッター下部固定-->
		<script src="js/scrolltopcontrol.js"></script><!--スクロールしながらページのトップに戻る-->
		<!--ギャラリー-->
		<script src="js/jquery.mixitup.js"></script>
		<script src="js/jquery.mixitup.index.js"></script>
		<!--セレクトボックス-->
		<script src="js/jquery.customSelect.min.js"></script>
		<script>
		 $(function() {
		     $('.ctSelect').customSelect()
		 });
		</script>









    <section>




					</section>



    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
