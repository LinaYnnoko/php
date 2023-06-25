<?
	//Если передана капча
	if (isset($_POST['captcha']))
		{
		//Получаем введенную пользователем капчу
		$code = $_POST['captcha']; 
		session_start();

		//Сравниваем

	if(isset($_SESSION['captcha']) && $_SESSION['captcha'] == $code)
	{
		print "<script language = 'JavaScript' type='text/javascript'>
    		alert('Правильно! '); 
    		function reload(){top.location = 'captcha_index.html'};
    		setTimeout('reload()',0)
    	</script>";
    }
    else
    {
    	print "<script language = 'JavaScript' type='text/javascript'>
    		alert('Неправильно! '); 
    		function reload(){top.location = 'captcha_index.html'};
    		setTimeout('reload()',0)
    	</script>"; 

    	//Удаляем из сессии код капчи
    	unset($_SESSION['captcha']);
    	exit(); //прекратить выполнение текущего скрипта
	}
}
?>
