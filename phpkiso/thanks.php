<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php
try {
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = 'ooo';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

$nickname=htmlspecialchars($nickname);
$email=htmlspecialchars($email);
$goiken=htmlspecialchars($goiken);

print $nickname;
print'様<br/>';
print'ご意見ありがとうございました<br/>';
print'頂いたご意見『';
print $goiken;
print'』<br/>';
print $email;
print'にメールを送りましたので、ご確認ください。';

$sql = 'INSERT INTO anketo (nickname,email,goiken)
VALUES (?, ?, ?)';
$stmt = $dbh->prepare($sql);
$stmt->execute(array($nickname, $email, $goiken));
$dbh = null;
}
catch (Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
}
?>

</body>
</html>