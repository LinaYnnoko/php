<?
session_start();

$host = "localhost";
$database = "project_php";
$user = "root";
$password = "";

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
$link->set_charset('utf8');

$query = "SELECT * FROM person";
$result = mysqli_query($link, $query) or die ("Ошибка вывода пользователей!" . mysqli_error($link));

if(isset($_POST['submit']))
{
	unset($_SESSION['login']);
	unset($_SESSION['fio']);

	print "<script language='JavaScript' type='text/JavaScript'>
	function reload(){top.location = 'auth.php'};
	setTimeout('reload()', 0)
	</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" href="js/script.js"></script>
	<title>Project</title>
</head>
<body>
	<? if(strpos($_SERVER['REQUEST_URI'], 'registration') === false && 
	strpos($_SERVER['REQUEST_URI'], 'auth') === false){?>
		<header>
			<?if(isset($_SESSION['login']) && !empty($_SESSION['login'])){?>
				<form action="" method="post">
					<label style="color: #fff"><?= $_SESSION['fio']?></label>
					<input type="submit" name="submit" value="Выйти">	
				</form>
			<?}else{?>
				<a href="auth.php">Вход</a>
				<a href="registration.php">Регистрация</a>
			<?}?>
		</header>
	<?}?>