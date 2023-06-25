<?
	$_SESSION['secret'] = $_POST['secret'];
?>
	<p>Ваше секретное слово: <?= $_SESSION['secret']?> </p>
	<p>Изменить секретное слово</p>
	<form action="secret.php" method="post">
		<input type="text" name="secret"><p>
		<input type="submit" name="submit"><p>
		<a href=""></a>
	</form>