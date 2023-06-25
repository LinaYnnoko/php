<?require_once("header.php")?>
<?require_once("functions.php")?>
<?
session_start();


$login = '/\A(?!.*(.)\3+)[A-Za-z,А-Яа-я_,0-9]{4,}/iu';
$email = '/^([A-za-z0-9]{8,}+@[^(mini)][a-z]{3,}\.[a-z]{1,3})$/i';
$password = '/^[\+\-\*\/]?[A-za-z0-9]{6,}$/ui';


function checkCaptcha()
{
	if ($_POST['captcha'] == $_SESSION['captcha']) {
		return true;
	} else {
		return false;
	}
}

$captchaError = '';
if (checkCaptcha() == false) {
	$captchaError = 'Неверно введены символы';
} else if (checkCaptcha() == true) {
	$captchaError = '';
}
//Нужно будет дописать это условие, если еще и валидация полей не прошла
if(isset($_POST['form']))
{
	if(isset($_POST['login']) && !empty($_POST['login']))
	{
		if(!preg_match($login,$_POST['login']) && !preg_match($email,$_POST['email']) && !preg_match($password,$_POST['password'])){
			$error="Какое-то из полей не соответствует требованиям";
		}else{
			if(!checkLogin($result, $_POST['login']))
			{
				if(checkCaptcha()==true){
					$fio = $_POST['fio'];
					$login = $_POST['login'];
					$mail = $_POST['email'];
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$gender = $_POST['gender'];

					$query = "INSERT INTO person (fio, login, mail, password, gender) VALUES ('$fio', '$login', '$mail', '$password', '$gender')";

					$result = mysqli_query($link, $query) or die ("Ошибка2" . mysqli_error($link));

					if($result)
					{
						$mes = 'Пользователь успешно зарегистрирован! : ' . date('l jS \of F Y h:i:s A') . "\r\n";
						file_put_contents('log.txt', $mes, FILE_APPEND);

						print "<script language='JavaScript' type='text/JavaScript'>
						alert('Пользователь успешно зарегистрирован!');
						function reload(){top.location = 'auth.php'};
						setTimeout('reload()', 0)
						</script>";
					}
				}
				else{
					$mes = 'При регистрации произошла ошибка! : ' . date('l jS \of F Y h:i:s A') . "\r\n";
					file_put_contents('log.txt', $mes, FILE_APPEND);

				}
			}
			else
			{
				$mes = 'При регистрации произошла ошибка! : ' . date('l jS \of F Y h:i:s A') . "\r\n";
				file_put_contents('log.txt', $mes, FILE_APPEND);
			}
		}
	}
	else
	{
		$mes = 'При регистрации произошла ошибка! : ' . date('l jS \of F Y h:i:s A') . "\r\n";
		file_put_contents('log.txt', $mes, FILE_APPEND);
	}
}
?>
<?require_once("body.php")?>
<?require_once("footer.php")?>