
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="チェック.css">
<title>EARTH</title>
</head>
<body>
 <!-- サイドメニュー -->

  <!-- メインコンテンツ -->
  <div class="wrapper">
    <header class="header">
      <h1 class="clear"><a href=""><img src="img/EARTH4.png" width="180" height=40" alt="EARTH"></a></h1>
		
   </header>
<main class="contents">
      <section class="contents__inner">
<?php
session_start();
require('dbconnect.php');
if (!isset($_SESSION['join'])){
	header('Location: touroku.php');
}
// TimeZoneを日本時間に設定する.phpiniにAsia/Tokyo追加
$org_timezone = date_default_timezone_get();
date_default_timezone_set('Asia/Tokyo');

if (!empty($_POST)){
	//登録処理する
	$sql = sprintf('INSERT INTO members SET seibetu="%s",simei="%s", name="%s", kokuseki="%s", tosi="%s", job="%s", syokureki="%s", email="%s",password="%s",created="%s"',
	mysql_real_escape_string($_SESSION['join']['seibetu']),
	mysql_real_escape_string($_SESSION['join']['simei']),
	mysql_real_escape_string($_SESSION['join']['name']),
	mysql_real_escape_string($_SESSION['join']['kokuseki']),
	mysql_real_escape_string($_SESSION['join']['tosi']),
	mysql_real_escape_string($_SESSION['join']['job']),
	mysql_real_escape_string($_SESSION['join']['syokureki']),
	mysql_real_escape_string($_SESSION['join']['email']),
	sha1(mysql_real_escape_string($_SESSION['join']['password'])),
	date('Y-m-d H:i;s')
	);

	mysql_query($sql) or die(mysql_error());
	unset($_SESSION['join']);
	header('Location: thanks.php');
}
?>
<p>次のフォームに必要事項をご記入してください。</p>
<form action="" method="post">
<input type="hidden" name="action" value="submit"/>
	<dl>

		<dt>性別</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['seibetu'],ENT_QUOTES,'UTF-8'); ?>
		</dl>

		<dt>氏名</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['simei'],ENT_QUOTES,'UTF-8'); ?>
		</dl>

		<dt>名前</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES,'UTF-8'); ?>
		</dl>

		<dt>国籍</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['kokuseki'],ENT_QUOTES,'UTF-8'); ?>
		</dl>

		<dt>年齢</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['tosi'],ENT_QUOTES,'UTF-8'); ?>
		</dl>
		
		<dt>仕事</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['job'],ENT_QUOTES,'UTF-8'); ?>
		<?php echo htmlspecialchars($_SESSION['join']['syokureki'],ENT_QUOTES,'UTF-8'); ?>
		</dl>
	

		<dt>メールアドレス</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8'); ?>
		<d/l>

		<dt>パスワード</dt>
		<dd>
		[表示されません。]
		</dd>

		
	</dl>
	<div><a href="touroku.php?action=rewrite">&laquo;&nbsp;書き直す</a>
	<input type="submit" value="登録する"/></div>
</from>
 </section>

    </main>
    <footer class="footer">
      <p>フッター</p>
    </footer>
</body>
</html>
