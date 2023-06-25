<?
	echo "Login: ".$_POST['login']."</br>";
	$pass = '';
	for($i = 0; $i < strlen($_POST['password']); ++$i) {
		if($i % 2 != 0)
    		$pass .= $_POST['password'][$i];
    	else
    		$pass .= '*';
	}

	echo "Password: ". $pass."</br>";

?>