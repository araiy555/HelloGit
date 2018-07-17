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
	$kategori = $_POST["kategori"];
	$editor1 = $_POST["editor1"];
	$taitol = $_POST["taitol"];
	$kiji = $_POST["kiji"];
	$file = $_FILES["file"]["error"];
	//入力チェック
	$errormsg = array();
	//名前
	if ($kategori == null) {
		$errormsg[] = "カテゴリを入力して下さい。";
	}
	if ($taitol == null) {
		$errormsg[] = "タイトルを入力してください。";
	}
	if (mb_strlen($taitol) > 50) {
		$errormsg[] = "タイトルは50文字以内で入力して下さい。";
	}
	//内容
	if ($kiji == null) {
		$errormsg[] = "概要を入力して下さい。";
	}
	if ($editor1 == null) {
		$errormsg[] = "記事を入力して下さい。";
	}

	if ($file == 1) {
		$errormsg[] = "サイズが大きいです。";
	}
		if ($file == 2) {
		$errormsg[] = "アップロードしているファイルは有効な動画ファイルではない可能性があります。アップロードの推奨ファイル形式をご覧ください。";
	}
		if ($file == 3) {
		$errormsg[] = "一部のみしかアップロードされませんでした。";
	}
	//if ($file == 4) {
	  //$errormsg[] = "アップロードされませんでした。";
	//}


		if ($file == 6) {
		$errormsg[] = "サーバー一時保管フォルダがありません。";
	}

		if ($file == 7) {
		$errormsg[] = "ディスクの書き込みに失敗しました。";
	}
		if ($file == 8) {
		$errormsg[] = "PHPの拡張モジュールがアップロードを中止した";
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
	 <img src="img/ajax-loader (5).gif">
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
	jQuery(window).on("load", function() {
	 jQuery('#loader-bg').hide();
	});
	</script>




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

    <section>
			<?php if (count($errormsg) > 0): ?>
			<div id="errmsg">
			<?php foreach ($errormsg as $msg): ?>
				・<?=$msg?><br />
			<?php endforeach; ?>

			</div>

			     <form action="kiji.toukou.php" method="post" enctype="multipart/form-data">
				<table id="contact-form" border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>
				カテゴリ
				</th>

			<td><select  name="kategori" id="kokuseki"  maxlength="255" value="<?= $kategori ?>"/>
				<OPTGROUP label="カテゴリ">
			<OPTION value="ニュース">ニュース</OPTION>
			<OPTION value="経済">経済</OPTION>
			<OPTION value="エンタメ">エンタメ</OPTION>
			<OPTION value="スポーツ">スポーツ</OPTION>
			<OPTION value="IT・科学">IT・科学</OPTION>
			<OPTION value="料理">料理</OPTION>
			<OPTION value="スポーツ">スポーツ</OPTION>
			<OPTION value="アニメ">アニメ</OPTION>
			<OPTION value="漫画">漫画</OPTION>
			<OPTION value="芸能人">芸能人</OPTION>
			<OPTION value="有名人">有名人</OPTION>
			<OPTION value="ファッション">ファッション</OPTION>
			<OPTION value="IT">IT</OPTION>
			<OPTION value="面白">面白</OPTION>
				</OPTGROUP>
			</select>
				</td>
				</tr>

			<tr>
				<th>
				タイトル
				</th>

			<td>
				<input type="text" name="taitol" size="35" maxlength="255" value="<?= $taitol ?>"/></li>

			</td>
			</tr>
			<tr>
				<th>
				記事
				</th>
				<td>
				<input type="text" name="kiji" size="35" maxlength="255" value="<?= $kiji ?>"/>
				</td>
			</tr>
			  <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>

			    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
			    <script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
			    <script type="text/javascript"name="editor1">
			        if ( typeof CKEDITOR == 'undefined' )
			        {
			        }
			        else
			        {
			            var editor = CKEDITOR.replace( 'editor1' );
			            editor.setData( '' );
			            CKFinder.setupCKEditor( editor, '/ckfinder/' ) ;
			        }
			    </script>











			<tr>
				<th>
				動画・画像
				</th>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="1000">
					<input type="file" name="file"id="file" value="<?= $file ?>">

				</td>
			</tr>
			<tr>
				<th colspan="2">
				<input type="submit" name="submit" value="OK"/>
				</th>
			</tr>
			</table>
			</form>

			<?php else: ?>




					<?php


					error_reporting(0);



							$file_nm = $_FILES['file']['name'];
							$tmp_ary = explode('.', $file_nm);
							$extension = $tmp_ary[count($tmp_ary)-1];
							echo($extension);//ここで拡張子を表示している
							/* ファイルアップロードがあったとき */

								ob_start();
								//トランザクション処理を開始


					if($extension == 'jpg' || $extesion == 'JPG'){

							if ($_FILES["file"]["error"] > 0){
									echo "ファイルエラー: " . $_FILES["file"]["error"] . "<br />";
							}
							 // バッファリングを開始

							else{
									$type = $_FILES["file"]["type"];
									$size = $_FILES['file']['size'];
									$tmp=$_FILES["file"]["tmp_name"];
									$fp = fopen($tmp,'rb');
									$data = bin2hex(fread($fp,$size));
									$dsn='mysql:host=localhost;dbname=mini_bbs';
								$member_id = $member['id'];
									echo '<pre>';
									try{
											$pdo = new PDO($dsn,'root','1234');
											$pdo->exec("INSERT INTO `upload`(`type`,`data`,`member_id`) values ('$type',0x$data,'$member_id')");
											$gazou = $pdo->lastInsertId();
											echo 'アップロードが完了しました。';
											$pdo = null;
									}catch (PDOException $e){
											echo $e->getMessage();
									}
									echo '</pre>';
									fclose($fp);
							}

					}else if($extension == 'mp4'){

							 if(isset($_FILES['file'])){

															$name = $_FILES['file']['name'];
															$type = explode('.',$name);
															$type = end($type);
															$size = $_FILES['file']['size'];
															$tmp = $_FILES['file']['tmp_name'];
															$random_name = rand();
									$member_id = $member['id'];
															if($type != 'mp4' && $type != 'MP4'){
																	$message = "拡張子が間違えています。.";
															}else{
																	move_uploaded_file($tmp,'files/'.$random_name.'.'.$type);
																	try{
																			 $pdo = new PDO('mysql:host=localhost; dbname=mini_bbs;','root','1234');
																		 $stmt = $pdo -> prepare("INSERT INTO douga VALUES('','$name','files/$random_name.$type','$member_id')");
												$stmt -> execute();
										 $douga = $pdo->lastInsertId();
										$message = "アップロードしました。.";

																	}catch(PDOException $e){
																			exit('failed connecting to DB.'.$e -> getMessage());
																	}
															}

															echo "$message <br/><br/>";


								}


					}


					if (!isset($_POST['kategori'])){

					}
					if (!isset($_POST['kiji'])){
					}
					if (!isset($_POST['taitol'])){
					}


					$pdo = new PDO('mysql:dbname=mini_bbs;host=localhost','root','1234');
					$stmt = $pdo->query('SET NAMES utf8');
					// TimeZoneを日本時間に設定する.phpiniにAsia/Tokyo追加
					$org_timezone = date_default_timezone_get();
					date_default_timezone_set('Asia/Tokyo');

					$id = $member['id'];
					$kategori = $_POST['kategori'];
					$taitol = $_POST['taitol'];
					$kiji = $_POST['kiji'];
					$created = date('Y-m-d H:i:s');
					$value = htmlspecialchars( $_POST["editor1"] );

					if (!empty($_POST)){
						//登録処理する
						$sql = $pdo->prepare("INSERT INTO posts SET member_id=:member_id, kategori=:kategori,taitol=:taitol,kiji=:kiji, created=:created,dougaid=:dougaid,gazouid=:gazouid,editor=:value ");
						$sql->bindValue(':member_id', $id);
						$sql->bindValue(':kategori', $kategori);
						$sql->bindValue(':taitol', $taitol);
						$sql->bindValue(':kiji', $kiji);
						$sql->bindValue(':created', $created);
						$sql->bindValue(':dougaid', $douga);
							$sql->bindValue(':gazouid', $gazou);
						$sql->bindValue(':value', $value);
						$flag = $sql->execute();

					}
					?>














			<table id="contact-form" border="1" cellpadding="0" cellspacing="0">





					<tr>
					<th>
						カテゴリ
					</th>
					<td>
						<?php echo  $kategori; ?>
					</td>
				</tr>

				<tr>
					<th>
						タイトル
					</th>
					<td>
						<?php echo  $taitol; ?>
					</td>
				</tr>

				<tr>
					<th>
						内容
					</th>
					<td>

				<?php echo  $kiji; ?>
					</td>
				</tr>
				<tr>
					<th>
						画像・動画
					</th>
					<td>
					<?php echo $douga; ?>
					<?php echo $gazou; ?>

					</td>
				</tr>

			<?php
			$url = "localhost";
			$user = "root";
			$pass = "1234";
			$db = "mini_bbs";

			$link = mysql_connect( $url, $user, $pass ) or die("MySQLへの接続に失敗しました。");
			$sdb = mysql_select_db( $db, $link ) or die("データベースの選択に失敗しました。");
			$sql = "SELECT * FROM mini_bbs.posts";
			$result = mysql_query( $sql, $link ) or die("クエリの送信に失敗しました。");
			$rows = mysql_num_rows($result);
			mysql_close($link) or die("MySQL切断に失敗しました。");

			if($rows){
			    while($row = mysql_fetch_array($result)) {
			        $value = htmlspecialchars_decode($row['editor']);
			        echo $value;
			    }
			}
			?>















				<tr>
					<th colspan="2">
						<form action="main.php" method="post"enctype="multipart/form-data">
							<input type="hidden" name="kategori" value="<?php echo htmlspecialchars($_POST['kategori'],ENT_QUOTES,'UTF-8'); ?>">
							<input type="hidden" name="taitol" value="<?php echo htmlspecialchars($_POST['taitol'],ENT_QUOTES,'UTF-8'); ?>">
							<input type="hidden" name="kiji" value="<?php echo htmlspecialchars($_POST['kiji'],ENT_QUOTES,'UTF-8'); ?>">
							<input type="hidden" name="file"id="file" value="<?php echo htmlspecialchars($_FILES['file'],ENT_QUOTES,'UTF-8'); ?>">
							<input type="submit" value="戻る"/></div>
						</form>

					</th>
				</tr>
			</table>
			<?php endif; ?>
    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>

</body>
</html>
