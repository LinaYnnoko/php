<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=1, initial-scale=1.0">
	<title>Form</title>
	<style type="text/css">
		 .title{
			font-family: Comic Sans MS;
 			text-align: center;
 			border-bottom: solid;
 			margin-top: 30px;
 			padding-bottom: 20px;
 			font-size: 20px;
 		}
 		 .menu{
			font-family: Comic Sans MS;
 			margin-top: 10px;
 			font-size: 15px;
 		}	
	</style>
</head>
<body>
	<?
	echo "Вас величают: ".$_POST['FIO']."</br>";
	echo "Пошта: ".$_POST['email']."</br>";
	echo "Телефон4ик: ".$_POST['tel']."</br>";
	echo "Страничка вконтактике: ".$_POST['url']."</br>";
	echo "Сколько вам годиков: ".$_POST['number']."</br>";
	echo "Что-то написали: ".$_POST['search']."</br>";
	echo "Дата вашего появления на свет: ".$_POST['date']."</br>";
	echo "Любимое время суток: ".$_POST['time']."</br>";
	echo "Размер любви к котикам: ".$_POST['range']."</br>";
	echo "Из яблока и груши вы выбрали: ".$_POST['radio']."</br>";
	echo "Ваш выбор пал на: ".$_POST['checkbox']."</br>";
	echo "Любимый оттеночек: ".$_POST['color']."</br>";
	echo "Загрузили ваш файли4ек: ".$_POST['file']."</br>";
	echo "Ваш выбор: ".$_POST['select']."</br>";
	echo "Комментарий автору: ".$_POST['comment']."</br>";
	//print_r($_POST);
	?>
</body>
</html>
