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
	header('Location: searth.login.php');
}
?>


<?php
if(empty($_SESSION['yousuke'])){
header('Location: searth.login.php');
}

 $sql = sprintf("SELECT m.*, p.* FROM members m, posts p WHERE m.id=%d",
    mysql_real_escape_string($_SESSION['yousuke'])
);
  $posts = mysql_query($sql) or die(mysql_error());
  $post = mysql_fetch_assoc($posts);

?>
<?php
header('Expires: -1');
header('Cache-Control:');
header('Pragma:');
require('dbconnect.php');
error_reporting(0);
$jibun = $member['id'];
$aite = $_SESSION['yousuke'];


$sql = "SELECT  simei, name, member_id, user_id, message, created FROM message  WHERE member_id IN ('$jibun','$aite') AND user_id IN ('$aite') ORDER BY created ASC" ;
  $record = mysql_query($sql) or die(mysql_error());
?>



<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="EARTHは、同じ職業の人たちと交流を深めることのできるソーシャルユーティリティサイトです。EARTHを利用すれば、同じ職業の人と質問し合い最新の情報をチェックしたり、写真をアップロードしたり(枚数は無制限)、リンクや動画を投稿したり、新たな可能性を.">
	<link rel="stylesheet" type="text/css" href="データ.css">
	<title>EARTH</title>

  </head>
  <body>
	<div class="wrapper">
		<header class="header">


		<h1 class="clear"><a href="taitol.php"><img src="img/EARTH4.png" width="180" height="40" alt="EARTH"></a></h1>



		</header>


<form action="" method="post" anctype="multipart/form-data">

<?php

	if(!empty($_POST)){
	//エラー項目の確認

	if($_POST['message'] == ''){
	$error['message'] = 'blank';
	}

	if(empty($error)){
	$_SESSION['join'] = $_POST;
	$_SESSION['aiueo'] = $_SESSION['yousuke'];
	header("Location: message.kakunin.php");
	}
}		//書き直しコード



?>



	<section class="contents">
		<section class="contents">

			<!--②左コメント始-->
			  <div class="balloon6">
			    <div class="faceicon">

														<p class="clear"><a href=""><img src="img/EARTH4.png"  alt="EARTH"></a></p>
			    </div>
			    <div class="chatting">
			      <div class="says">
							<p>送り主：<?php echo $member['simei']; ?><?php echo $member['name']; ?></p>

			      </div>
			    </div>
			  </div>
			  <!--②/左コメント終-->

			  <!--③右コメント始-->
			  <div class="mycomment">
					<p>宛先：<?php echo $post['simei']; ?><?php echo $post['name']; ?></p>

			  </div>
			  <!--/③右コメント終-->

			</div><!--/①LINE会話終了-->




<?php
	while($messages = mysql_fetch_assoc($record)):
	?>

	<?php echo $messages['simei']; ?><?php echo $messages['name']; ?></br>
	<?php echo $messages['message']; ?></br>
	<?php echo $messages['created']; ?></br>
<?php
	endwhile;
	?>

<form action="" method="post">

	<dl>
	<dt>メッセージ</dt>
	<dd>
	<input type="text" name="message" size="75" maxlength="255"value=""/>
	<?php if ($error['message'] == 'blank'): ?>
	<p class="error">* メッセージを入力してください</p>
	<?php endif; ?>
	</dd>
	</dl>






	<div>
		<input type="submit" value="送信"/>
	</div>



	</form>

	</section>
		</section>
    <footer class="footer">
      <p>フッター</p>
    </footer>
</div>
</body>
</html>
