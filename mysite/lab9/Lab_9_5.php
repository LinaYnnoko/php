<?
if(session_id() == '')
	session_start();
	// проверяем на наличие имени в URL-запросе
	$mass['name'] = $_POST['name'];
	$mass['email'] = $_POST['email'];
	$mass['mess'] = $_POST['mess'];

	$_SESSION['all_mess'][] = $mass;
?>
<p>Сообщение успешно отправлено!</p>
<p><a href="show_mess.php">SHOW ALL</a>