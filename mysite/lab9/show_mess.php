<?
if(session_id() == '')
	session_start();

if (isset($_POST['id'])) {
    unset($_SESSION['all_mess'][$_POST['id']]);
    header("Refresh: 0"); //чтобы удалялось с первого раза
}

foreach ($_SESSION['all_mess'] as $key => $value) {?>
	<form action="" method="post">
		Имя: <?= $value['name']?>
		Почта: <?= $value['email']?>
		Сообщение: <?= $value['mess']?>
		<button name="id" value='<?= $key?>'>Удалить</button>
	</form>
<?}

?>

<br><a href="Lab_9.php">Вернуться</a>
