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

if (!isset($_SESSION['join'])){
	header('Location: date.php');
}


$pdo = new PDO('mysql:dbname=mini_bbs;host=localhost','root','1234');
$stmt = $pdo->query('SET NAMES utf8');
// TimeZoneを日本時間に設定する.phpiniにAsia/Tokyo追加
$org_timezone = date_default_timezone_get();
date_default_timezone_set('Asia/Tokyo');

$id = $member['id'];
$message = $_SESSION['join']['message'];
$url = $_SESSION['join']['url'];
$renrakubango = $_SESSION['join']['renrakubango'];
$renrakuadoresu = $_SESSION['join']['renrakuadoresu'];
$detahenkou = date('Y-m-d H:i:s');

if (!empty($_POST)){
	//登録処理する
	$sql = $pdo->prepare("UPDATE members SET message=:message, url=:url, renrakubango=:renrakubango, renrakuadoresu=:renrakuadoresu,detahenkou=:detahenkou WHERE id=:id ");
	$sql->bindValue(':id', $id);
	$sql->bindValue(':message', $message);
	$sql->bindValue(':url', $url);
	$sql->bindValue(':renrakubango', $renrakubango);
	$sql->bindValue(':renrakuadoresu', $renrakuadoresu);
	$sql->bindValue(':detahenkou', $detahenkou);
	$flag = $sql->execute();
	header('Location: date.touroku.php');
}
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
</head>

<body>

  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>
    <h1>EARTH</h1>
  </header>

  <nav class="vertical_nav">
    <ul id="js-menu" class="menu">


			<li class="menu--item">
				<a href="../../taitol.php" class="menu--link" title="Item 5">
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
            <a href="date.php" class="sub_menu--link">プロフィール</a>
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
            <a href="hanbai.main.php" class="sub_menu--link">出品</a>
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
						<a href="situmon.main.php" class="sub_menu--link">投稿</a>
					</li>

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
				<a href="ranking.php" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">お支払い</span>
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

    <section>

			<main class="contents">
	      <section class="contents__inner">
		<form action="" method="post">
		<input type="hidden" name="action" value="submit"/>
		<?php echo htmlspecialchars($_SESSION['join']['message'],ENT_QUOTES,'UTF-8'); ?>
		<?php echo htmlspecialchars($_SESSION['join']['url'],ENT_QUOTES,'UTF-8'); ?>
		<?php echo htmlspecialchars($_SESSION['join']['renrakubango'],ENT_QUOTES,'UTF-8'); ?>
		<?php echo htmlspecialchars($_SESSION['join']['renrakuadoresu'],ENT_QUOTES,'UTF-8'); ?>
	 	</section>

		<div><a href="date.php?action=rewrite">&laquo;&nbsp;書き直す</a>
		<input type="submit" value="登録する"/></div>
	    </main>

    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
