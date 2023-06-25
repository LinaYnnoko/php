<?
$count_corr=0;

if (preg_match("/^[a-zA-Zа-яА-Я]+$/u", $_POST['name']) > 0)
    $count_corr++;

if (preg_match("/^[a-zA-Zа-яА-Я]+$/u", $_POST['surname']) > 0)
    $count_corr++;
$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');
if (mysqli_num_rows(mysqli_query($db, "Select * From user Where phone = '{$_POST['phone']}'")) == 0)
    $count_corr++;

if (strlen($_POST['password1']) > 7)
    $count_corr++;

if ($_POST['password1'] == $_POST['password2'])
    $count_corr++;

if ($count_corr==5)
		{
			$pass_md5=md5($_POST['password1']);
			if (mysqli_query($db, "INSERT INTO user (idUser, isAdmin, name, surname, adress, phone, password) VALUES (NULL, b'0', '{$_POST['name']}', '{$_POST['surname']}', 'Не указан', '{$_POST['phone']}', '{$pass_md5}')"))
				echo (json_encode(['res'=>0]));
					else echo (json_encode(['res'=>444]));
		}



?>