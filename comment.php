<?php
session_start();
require('dbconnect.php');
// ログイン状態チェック
if (isset($_SESSION['id']) && $_SESSION['time'] + 36000 > time()) {
	$_SESSION['time'] = time();
	$sql=sprintf('SELECT * FROM members WHERE id=%d',
	mysql_real_escape_string($_SESSION['id']));
	$record = mysql_query($sql) or die(mysql_query());
	$member = mysql_fetch_assoc($record);
}else{
	header('Location: comment.login.php');
}
?>

<?php



if (!isset($_SESSION['comment'])){
	header('Location: searth.user.php');
}
if (!isset($_POST['satim'])){
	header('Location: date.php');
}

$pdo = new PDO('mysql:dbname=mini_bbs;host=localhost','root','1234');
$stmt = $pdo->query('SET NAMES utf8');

$user_id = $member['id'];

$comment_id =$_SESSION['comment'];
$comment = $_REQUEST['satim'];


	//登録処理する
	$sql = $pdo->prepare("INSERT INTO comment SET user_id=:user_id,comment_id=:comment_id,comment=:comment");
	$sql->bindValue(':user_id', $user_id);
	$sql->bindValue(':comment_id', $comment_id);
	$sql->bindValue(':comment', $comment);

	$flag = $sql->execute();
	$_SESSION['koment'] = $comment_id;
	header('Location: searth.following.toukou.php');


?>
