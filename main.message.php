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
header('Expires: -1');
header('Cache-Control:');
header('Pragma:');
require('dbconnect.php');

$jibun = $member['id'];


$sql = "SELECT   member_id, user_id, message, created FROM message  WHERE member_id IN ('$jibun')  ORDER BY created DESC;" ;
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

				<ul class="sub_menu">
					<li class="sub_menu--item">
						<a href="" class="sub_menu--link">受信</a>
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

    <section class="contents__inner2">
			<?php
			while($messages = mysql_fetch_assoc($record)):
			?>
		<?php

		require('dbconnect.php');

		$aite = $messages['user_id'];


		$sql = "SELECT id,simei,name,message,kokuseki FROM members WHERE id IN ('$aite');" ;
		  $following = mysql_query($sql) or die(mysql_error());
		?>

			<?php
			while($aki = mysql_fetch_assoc($following)):
			?>

			<?php echo $aki['simei']; ?><?php echo $aki['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $messages['message']; ?><?php echo $messages['created']; ?></br>


		<?php
			endwhile;
			?>
		<?php
			endwhile;
			?>

    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
