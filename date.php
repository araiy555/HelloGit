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

			if(!empty($_POST)){
			//エラー項目の確認

			if(empty($error)){
			$_SESSION['join'] = $_POST;
header('Location: date.kakunin.php');
			}
		}
			//書き直しコード
			//書き直しコードif ($_REQUEST['action'] == 'rewrite') {
			 // $_POST = $_SESSION['join'];
			 // $error['rewrite'] = true;
			//}

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

	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">



	<script>
		window.addEventListener("beforeunload", function (event) {
			var confirmationMessage = "入力内容を破棄します。";
			event.returnValue = confirmationMessage;
			return confirmationMessage;
		});
	</script>







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


		<form action="" method="post" anctype="multipart/form-data">
    <section class="contents__inner2">
			<section class="contents">
				<section class="contents">
		<div class="form-group">
		     <label class="col-sm-2 control-label">自己紹介 <span class="label label-danger">必須</span></label>
		   <div class="col-sm-10">
			<input type="text" name="message" class="form-control"placeholder="自己紹介"value="<?php echo $member['message']; ?>"required/>
		 </div>

		</div>

		</br>
			<div class="form-group">
		    <label class="col-sm-2 control-label">URL<span class="label label-danger">必須</span></label>

		<div class="col-sm-10">
			<input type="text" name="url"placeholder="URL" class="form-control"value="<?php echo $member['url']; ?>"required/>
		 </div>
		</div>
		</br>

			<div class="form-group">
			 <label class="col-sm-2 control-label">連絡番号<span class="label label-danger">必須</span></label>

			<div class="col-sm-10">
			<input type="text" name="renrakubango" autocomplete="tel"placeholder="連絡番号"class="form-control"value="<?php echo $member['renrakubango']; ?>"required/>

			</div>
		</div>
		</br>
				<div class="form-group">
				 <label class="col-sm-2 control-label">連絡アドレス<span class="label label-danger">必須</span></label>

				<div class="col-sm-10">
			<input type="text" name="renrakuadoresu" autocomplete="email"class="form-control"placeholder="メールアドレス"value="<?php echo $member['renrakuadoresu']; ?>"required/>

			</div>
		</div>
		</br>
		 <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-default"value="投稿"/>
			</div>
		      </div>



			</section>
				</section>


    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
