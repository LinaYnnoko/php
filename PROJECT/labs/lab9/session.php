<?
if(session_id() == '')
    session_start();

echo 'Имя: '.$_SESSION["name"]. '</br>';
echo 'Возраст: '.$_SESSION['age'].'</br>';
echo 'Дата заполнения данных: '.$_SESSION['date'].'</br>';

