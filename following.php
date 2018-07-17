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
	header('Location: following.login.php');
}
?>

<?php

if (!isset($_SESSION['yousuke'])){
	header('Location: searth.user.php');
}
if(empty($_SESSION['yousuke'])){
header('Location: taitol.php');
} 


$pdo = new PDO('mysql:dbname=mini_bbs;host=localhost','root','1234');
$stmt = $pdo->query('SET NAMES utf8');

$user_id = $member['id'];
$following_id = $_SESSION['yousuke'];




	//登録処理する
	$sql = $pdo->prepare("INSERT INTO following SET user_id=:user_id,following_id=:following_id");
	$sql->bindValue(':user_id', $user_id);
	$sql->bindValue(':following_id', $following_id);
	
	$flag = $sql->execute();
	$_SESSION['arai']= $following_id;
	header('Location: searth.user.following.php');


?>