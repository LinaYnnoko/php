<?php
$err_code = 0;
//получаем номер телефона и хэш пароля из формы
$phone = $_POST['phone'];
$pass = md5($_POST['password1']);
//коннектимся к бд
$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');
//ищем в бд номер телефона
if (mysqli_num_rows(mysqli_query($db, "Select * From user Where phone = '{$phone}'")) == 0) {
    $err_code = 1;//не находим -- код ошибки 1
} else {//находим -- чекаем пароль
    $arr = mysqli_fetch_assoc(mysqli_query($db, "Select * From user Where phone = '{$phone}'"));
    if ($arr['password'] != $pass)
        $err_code = 2;//хэши не совпадают -- код ошибки 2
    else {//совпадают -- стартуем сессию, в нее заносим id
        session_start();
        $_SESSION['ID'] = $arr['idUser'];
        $_SESSION['isAdmin']=$arr['isAdmin'];
    }
}
//отправляем код ошибки в качестве ответа. Если пришел 0 -- вход успешный, нужно перенаправить юзера на страницу
echo (json_encode(['err_code'=>$err_code]));

?>