<?

function checkLogin($result_db, $login){
	while ($row = $result_db->fetch_row()) 
	{
		if($row['2'] == $login)
		{
			print "<script language='JavaScript' type='text/JavaScript'>
			alert('Пользователь с таким логином уже существует!');
			</script>";
			return true;
		}
	}
	return false;
}

function checkLoginAndPassword($result_db, $login, $password){
	while ($row = $result_db->fetch_row()) 
	{
		if($row['2'] == $login)
		{
			if(password_verify($password, $row['4']))
			{
				print "<script language='JavaScript' type='text/JavaScript'>
				alert('Добро пожаловать!');
				function reload(){top.location = 'index.php'};
				setTimeout('reload()', 0)
				</script>";

				$_SESSION['login'] = $login;
				$_SESSION['fio'] = $row['1'];

				return true;
			}
			else
			{
				print "<script language='JavaScript' type='text/JavaScript'>
				alert('Неверный Пароль!');
				</script>";

				return false;
			}
				
		}
	}

	print "<script language='JavaScript' type='text/JavaScript'>
	alert('Неверный Логин!');
	</script>";

	return false;
}