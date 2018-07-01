<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php
$code=$_POST['code'];

$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = 'ooo';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM anketo WHERE code=?';
$stmt = $dbh->prepare($sql);  //SQL文で指令を出す準備
$data[]=$code;
$stmt->execute($data);             //その指令を出す

//(1)は無限ループを示す
while(1)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false) 
{
 	break;
}
	print$rec['code'];
	print$rec['nickname'];
	print$rec['email'];
	print$rec['goiken'];
	print'<br/>';

$dbh = null;  //データベース閉じる
}
?>
<br/>
<a href="kensaku.html">検索画面に戻る</a>
</body>
</html>