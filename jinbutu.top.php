
<?php


header('Expires: -1');
header('Cache-Control:');
header('Pragma:');
require('dbconnect.php');



$sql = "SELECT id, simei,name,job,tosi,kokuseki,message,seibetu FROM members " ;
  $record = mysql_query($sql) or die(mysql_error());
?>





<?php
error_reporting(0);
	if(!empty($_GET)){
	//エラー項目の確認

	if($_GET['search'] == ''){
	$error['search'] = 'blank';
	}
	if(empty($error)){
	$_SESSION['join'] = $_GET;
	header('Location: searth.following.php');
	}
}
?>











<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Earth</title>

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
   <img src="img/ajax-loader (4).gif">
 </div>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script>
 jQuery(window).on("load", function() {
   jQuery('#loader-bg').hide();
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
				<a href="taitol.php" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">ホーム</span>
				</a>
			</li>


			<li class="menu--item">
				<a href="searth.following.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">ニュース</span>
				</a>
			</li>
			<li class="menu--item">
				<a href="sured.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">スレッド</span>
				</a>
			</li>
		<!--	<li class="menu--item">
				<a href="google.news.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">ニュース</span>
				</a>
			</li>-->
			<li class="menu--item">
				<a href="jinbutu.following.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">人物</span>
				</a>
			</li>

			<li class="menu--item">
				<a href="flickr.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">写真</span>
				</a>
			</li>
			<li class="menu--item">
				<a href="flickr.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">動画</span>
				</a>
			</li>
			<li class="menu--item">
				<a href="flickr.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">質問</span>
				</a>
			</li>
			<li class="menu--item">
				<a href="flickr.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">ショッピング</span>
				</a>
			</li>
			<li class="menu--item">
				<a href="flickr.php?id=<?php echo $name; ?>" class="menu--link" title="Item 5">
					<i class="menu--icon  fa fa-fw fa-globe"></i>
					<span class="menu--label">イベント</span>
				</a>
			</li>








    </ul>

    <button id="collapse_menu" class="collapse_menu">
      <i class="collapse_menu--icon  fa fa-fw"></i>
      <span class="collapse_menu--label">Recolher menu</span>
    </button>

  </nav>


		<div class="wrapper">
			<div class="wrapper">
			<main class="contents">


				      <section class="contents__inner1">

				<?php
				$kml = mysql_num_rows($record);

				if($kml == 0){
				echo "該当データはありません";
				exit;
				}else{
				echo "出力結果";

				}
				?>
					<?php

					while($post = mysql_fetch_assoc($record)):
					?>
				<div class="box11">
						<section class="koushinbi">

							<section class="midori">

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
				$id = $post['id'];
				    $images = $pdo->query("select * from profile where member_id='$id' ORDER BY modified DESC LIMIT 1");


				} catch (PDOException $e) {
				    // 500 Internal Server Errorでテキストとしてエラーメッセージを表示
				http_response_code(500);
				header('Content-Type: text/plain; charset=UTF-8', true, 500);
				    exit($e->getMessage());


				}


				?>
				<?php
				require('dbconnect.php');


				$id = $post['id'];


				$sql = "select member_id from profile where member_id='$id' ORDER BY modified DESC LIMIT 1" ;
				  $arai = mysql_query($sql) or die(mysql_error());
				?>


				<div class="balloon5">
  <div class="faceicon">

				 		<?php
				$kml = mysql_num_rows($arai);

				if($kml == 0){

				      echo "<img src='img/user.png' alt='' width='50%' height='10%' vspace='0'hspace='3' style='border-radius: 10px'>";

				}else{


				}
				?>

				       <?php if (!empty($images)): ?>

				<?php foreach ($images as $i => $img): ?>
				<?php if ($i): ?>
				     <hr />
				<?php endif; ?>
				     </br>
					<section class="syasin">
				       <img src="data:image/jpeg;base64,<?=base64_encode($img['data'])?>"width="50%" height="10%"  vspace="0"hspace="3" style="border-radius: 10px;" alt="画像<?=$i+1?>">
					</section>

				<?php endforeach; ?>

				<?php endif; ?>

				</br>
  </div>
	<div class="chatting">
    <div class="says">

									 <a href="searth.user.following.php?id=<?php echo $post['id']; ?>"><?php echo $post['simei']; ?><?php echo $post['name']; ?></a>
								<?php echo $post['kokuseki']; ?>
								<?php echo $post['tosi']; ?>
								<?php echo $post['seibetu']; ?>
								<?php echo $post['job']; ?><br>
								<?php echo $post['message']; ?><br>
							</div>
						  </div>
						</div>

							</section>
						</section>
				</div>
					<?php
					endwhile;
					?>
					</section>





						<?php
// PDOでDBに接続
$db = new PDO('mysql:dbname=mini_bbs;host=localhost', 'root', '1234');

// GETで現在のページ数を取得する（未入力の場合は1を挿入）
if (isset($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}

// スタートのポジションを計算する
if ($page > 1) {
	// 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
	$start = ($page * 10) - 10;
} else {
	$start = 0;
}

// postsテーブルから10件のデータを取得する
$posts = $db->prepare("
SELECT m.id, m.simei, m.name, p.id, p.member_id, p.kategori,p.kiji, p.taitol,p.created FROM members m, posts p WHERE  m.id=p.member_id AND p.taitol like '%{$name}%' AND p.kategori like'%ニュース%' ORDER BY p.created DESC LIMIT {$start}, 10
");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {

	echo $post['taitol']; echo $post['kategori'],'<br>';
	 echo $post['kategori'];
 echo $post['created'];
	$saiseix = $post['id'];
	$saisei1 = "select count(*) as cnt from saiseisu where saisei_id = '$saiseix'";
					mysql_real_escape_string($saisei1);
		$saisei2 = mysql_query($saisei1) or die(mysql_error());




		while($saisei = mysql_fetch_assoc($saisei2)):


			 echo $saisei['saisei_id'];
			 echo	'閲覧数:'. $saisei['cnt'];



		endwhile;



	$kouhyouka = $post['id'];
	$kouhyouka1 = "SELECT (SELECT COUNT(*) FROM kouhyouka WHERE hyouka_id = '$kouhyouka') AS count FROM kouhyouka limit 0,1";
					mysql_real_escape_string($kouhyouka1);
		$kouhyouka2 = mysql_query($kouhyouka1) or die(mysql_error());




		while($kouhyouka3 = mysql_fetch_assoc($kouhyouka2)):





			 echo 'いいね'.$kouhyouka3['count'];

		endwhile;



	$teihyouka = $post['id'];
	$teihyouka1 = "SELECT (SELECT COUNT(*) FROM teihyouka WHERE hyouka_id = '$teihyouka') AS count FROM teihyouka limit 0,1";
					mysql_real_escape_string($teihyouka1);
		$teihyouka2 = mysql_query($teihyouka1) or die(mysql_error());




		while($teihyouka3 = mysql_fetch_assoc($teihyouka2)):

			 echo  'わるいね'.$teihyouka3['count'],'<br>';

			endwhile;





}

// postsテーブルのデータ件数を取得する
$page_num = $db->prepare("
	SELECT COUNT(*) id
	FROM posts
");
$page_num->execute();
$page_num = $page_num->fetchColumn();

// ページネーションの数を取得する
$pagination = ceil($page_num / 10);

?>









<?php

$totalPage = 100;
$range = 3;
if (
  isset($_GET["page"]) &&
  $_GET["page"] > 0 &&
  $_GET["page"] <= $totalPage
) {
  $page = (int)$_GET["page"];
} else {
  $page = 1;
}

$prevDiff = 0;
if ($page - $range < 1) {
  $prevDiff = $range - $page + 1;
}

$nextDiff = 0;
if ($page + $range > $totalPage) {
  $nextDiff = $page + $range - $totalPage;
}

?>


<p>現在 <?php echo $page; ?> ページ目です。</p>

<p>
	<?php if ($page > 1) : ?>
		<a href="?page=<?php echo ($page - 1); ?>">前のページへ</a>
	<?php endif; ?>

	<?php for ($i = $range + $nextDiff; $i > 0; $i--) : ?>
		<?php if ($page - $i < 1) continue; ?>
		　<a href="?page=<?php echo ($page - $i); ?>"><?php echo ($page - $i); ?></a>
	<?php endfor; ?>

	　<span><?php echo $page; ?></span>

	<?php for ($i = 1; $i <= $range + $prevDiff; $i++) : ?>
		<?php if ($page + $i > $totalPage) break; ?>
		　<a href="?page=<?php echo ($page + $i); ?>"><?php echo ($page + $i); ?></a>
	<?php endfor; ?>

	<?php if ($page < $totalPage) : ?>
	　<a href="?page=<?php echo ($page + 1); ?>">次のページへ</a>
	<?php endif; ?>
</p>


			    </main>

    </section>

  </div>

  <script src="../dist/vertical-responsive-menu.min.js"></script>



</body>



</html>
