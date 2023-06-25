<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Лабораторная работа №7-8</title>
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
	<h1 class="title">Лабораторная №7-8. УПРАВЛЯЮЩИЕ КОНСТРУКЦИИ ЯЗЫКА PHP</h1>

	<h2 class="menu">Задача 1. Даны два числа найти из них большее и вывести на экран «Число А больше числа В»</h2>
	<?php
	$A = 4;
	$B = 15;
	if ($A > $B)
		echo "Число A больше числа В";
	else if ($A < $B)
		echo "Число B больше числа A";
	else 
		echo "Число A равно числу В";
	?>

	<h2 class="menu">Задача 2. Даны три числа найти из них большее и вывести на экран «Число А больше чисел В и С»</h2>
	<?php
	$A = 4;
	$B = 15;
	$C = 5;
	if ($A > $B && $A > $C)
		echo "Число А больше чисел В и С";
	else if ($B > $A && $B > $C)
		echo "Число B больше чисел A и С";
	else if ($C > $A && $C > $B)
		echo "Число C больше чисел A и C";
	else 
		echo "Нет наибольшего числа";
	?>

	<h2 class="menu">Задача 3. Задать три целых от 1 до 10 (задать рандомно). Найти из них меньшее. Если оно больше 4, то вывести сообщение «Вы сдали», иначе – «Вас отчислят». Если оно больше или равно 9, то вывести сообщение «Вы отличник! Поздравляю!»</h2>
	<?php
	$A = rand(1,10);
	$B = rand(1,10);
	$C = rand(1,10);
	$min = 0;

	if ($A <= $B && $A <= $C)
		$min = $A;
	else if ($B <= $A && $B <= $C)
		$min = $B;
	else if ($C <=$A && $C <= $B)
		$min = $C;
	echo $A." ". $B." ". $C."<br/>";
	if($min >= 9):?>
		<span>Вы отличник! Поздравляю!</span>
	<? elseif ($min > 4): ?>
		<span>Вы сдали</span>
	<? else: ?>
		<span>Вас отчислят</span>
	<? endif; ?>

	<h2 class="menu">Задача 4. Найдите с помощью цикла сумму тех чисел от 1 до 80, которые делятся на 3 или на 5.</h2>
	<?php
	for ($i = 1; $i <=80; $i++){
		if ($i % 3 == 0 || $i % 5 == 0)
			$summ =+ $i;
	}
	echo $summ;
	?>

	<h2 class="menu">Задача 5. Дан массив с числами. Найдите сумму тех элементов массива, которые больше 10 и меньше 25.</h2>
	<?php
	$arr = [4, 9, 16, 10, 100, 19, 31, 44, 561, 290];
	$sum = 0;
	foreach ($arr as $elem) {
		if ($elem>10 && $elem<25)
		$sum += $elem;
	}
	echo $sum;
	?>

	<h2 class="menu">Задача 7. С помощью только одного цикла нарисуйте следующую пирамидку:</h2>
	<?php
  	for ($i = 1; $i < 10; $i++)
   	{
        for($j = 0; $j < $i;  $j++){
        $str = $i;
        echo $str;
    }
	echo'<br>';
	}
	?>

	<h2 class="menu">Задача 8. Дан массив с числами. С помощью цикла найдите корень из суммы квадратов четных элементов этого массива. Результат округлите в большую сторону до целых.</h2>
	<?php
	$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
	$sum = 0;
	foreach ($arr as $elem) {
		if ($elem % 2 == 0)
		$sum += $elem;
		$result = sqrt($sum);
	}
	echo ceil($result);
	?>

	<h2 class="menu">Задача 9. Заполните массив 10-ю иксами с помощью цикла.</h2>
	<?php
	$arr = [];
	$str = '';
	
	$i = 0;
	while($i < 10) 
		$arr[$i++] = 'x';
		
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	?>

	<h2 class="menu">Задача 10. Дана таблица соответствия главы и разделов в ней. Необходимо составить список, в котором правильно указаны главы и их разделы. Показать это визуально.</h2>
	<?php
	$mass[]=array('id'=>1,'name'=>'Глава 1','parent_id'=>0); 
	$mass[]=array('id'=>2,'name'=>'Глава 2','parent_id'=>0); 
	$mass[]=array('id'=>3,'name'=>'Глава 3','parent_id'=>0); 
	$mass[]=array('id'=>4,'name'=>'Глава 4','parent_id'=>0); 
	$mass[]=array('id'=>5,'name'=>'Основы языка PHP. Сценарии','parent_id'=>1); 
	$mass[]=array('id'=>6,'name'=>'Использование web-сервера
для выполнения PHP-сценариев','parent_id'=>1); 
	$mass[]=array('id'=>7,'name'=>'Первый PHP-скрипт','parent_id'=>1); 
	$mass[]=array('id'=>8,'name'=>'Общие понятия о переменных в PHP','parent_id'=>2); 
	$mass[]=array('id'=>9,'name'=>'Типы данных (переменных) в PHP','parent_id'=>2); 
	$mass[]=array('id'=>10,'name'=>'Арифметические операции','parent_id'=>3); 
	$mass[]=array('id'=>11,'name'=>'Операции инкремента и декремента','parent_id'=>3); 
	$mass[]=array('id'=>12,'name'=>'Операции присвоения','parent_id'=>3); 
	$mass[]=array('id'=>13,'name'=>'Простые математические функции','parent_id'=>4); 
	$mass[]=array('id'=>14,'name'=>'Выработка случайных чисел','parent_id'=>4); 
	$mass[]=array('id'=>15,'name'=>'Математические константы','parent_id'=>4); 

   	function result_mass_sort($mass){ 
 		while (sizeof($mass)>0){ 
 			$mass_result[]=$mass[0]; 
 			unset($mass[0]); 
 			$mass=array_values($mass); 
 			$j=sizeof($mass_result);

 				for ($i=0; $i<sizeof($mass);++$i){ 
					 if ($mass_result[$j-1]['id']==$mass[$i]['parent_id']){ 
 						$mass_result[]=$mass[$i]; 
 					unset($mass[$i]); 
 					$mass=array_values($mass); 
 					$i--;} 
 				} 
 			} 
 		return $mass_result;
 	}
 	$name = array_column($mass, 'name'); 
	$parent_id = array_column($mass, 'parent_id'); 
	array_multisort($parent_id, $name, SORT_STRING, $mass);

	$sort_mass=result_mass_sort($mass); 
		foreach ($sort_mass as $value) { 
 		if ($value['parent_id']==0){ 
 		echo '<p><b>'.$value['name'].'</b></p>'; 
 		} 
 	else{ 
 	echo '<p>&emsp;'.$value['name'].'</p>'; 
 	} 
}
	?>

	<h2 class="menu">Задача 11. Определить текущую дату и вывести название дня на английском и на русском языках (использовать switch)</h2>
	<?php
	$variable = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));
	switch ($variable) {
		case 1:
			echo "Понедельник"."<br/>";
			echo "Monday"."<br/>";
			break;

		case 2:
			echo "Вторник"."<br/>";
			echo "Tuesday"."<br/>";
			break;

		case 3:
			echo "Среда"."<br/>";
			echo "Wednesday"."<br/>";
			break;

		case 4:
			echo "Четверг"."<br/>";
			echo "Thursday"."<br/>";
			break;

		case 5:
			echo "Пятница"."<br/>";
			echo "Friday"."<br/>";
			break;

		case 6:
			echo "Суббота"."<br/>";
			echo "Saturday"."<br/>";
			break;

		case 0:
			echo "Воскресенье"."<br/>";
			echo "Sunday"."<br/>";
			break;
	}
	?>
	<h2 class="menu">Задача 11.1. Каждому дню недели соответвует номер от 1 до 7-ми соответствено. Дан какой-то номер дня. Надо выести этот день недели и  все следующие за ним дни до конца недели.</h2>
	<?php
	$variable = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));
	switch ($variable) {
		case 1:
			echo "Понедельник"."<br/>";
			echo "Monday"."<br/>";

		case 2:
			echo "Вторник"."<br/>";
			echo "Tuesday"."<br/>";

		case 3:
			echo "Среда"."<br/>";
			echo "Wednesday"."<br/>";

		case 4:
			echo "Четверг"."<br/>";
			echo "Thursday"."<br/>";

		case 5:
			echo "Пятница"."<br/>";
			echo "Friday"."<br/>";

		case 6:
			echo "Суббота"."<br/>";
			echo "Saturday"."<br/>";

		case 0:
			echo "Воскресенье"."<br/>";
			echo "Sunday"."<br/>";
	}
	?>

	<h2 class="menu">Задача 12. Дан возраст человека. Написать программу, которая выводит:
	если возраст человека меньше 7 – «Привет, малыш!»,
если возраст человека больше 7, но меньше 16 – «Привет, друг!»,
если возраст человека больше 16, но меньше 30 – «Хай!»,
если возраст человека больше 30, но меньше 50 – «Здравствуйте.»,
если возраст человека больше 50 – «Доброго времени суток.»
</h2>
	<?php
	$age = 50;
	if ($age < 7)
		echo "Привет, малыш!";
	else if ($age >= 7 && $age < 16)
		echo "Привет друг";
	else if ($age >= 16 && $age < 30)
		echo "Хай";
	else if ($age >= 30 && $age < 50)
		echo "Здравствуйте";
	else 
		echo "Доброго времени суток";
	?>

	<h2 class="menu">Задача 13. Вывести все числа от 1 до 25, до тех пор, пока сумма выведенных чисел не будет больше 42. </h2>
	<?php
	$i = 1;
	$sum = 0;
	while ($sum < 42){
		$sum += $i;
		echo $i++." ";
	}
	?>

	<h2 class="menu">Задача 14. Вывести все числа от 1 до 25, кроме тех, которые кратны 3.</h2>
	<?php
	$i = 1;
	while ($i <= 25){
		if ($i % 3 != 0)
			echo $i." ";
		$i++;
	}
	?>

	<h2 class="menu">Задача 15. Определите, сколько целых чисел, начиная с числа 1, нужно сложить, чтобы сумма получилась больше 100.</h2>
	<?php
	$i = 0;
	$sum = 0;
	while ($sum < 100){
		$sum += ++$i;
	}
	echo $i;
	?>

	<h2 class="menu">Задача 16. Дан массив с числами. Найдите сумму элементов, расположенных от начала массива до первого отрицательного числа.</h2>
	<?php
	$arr = [1, 2, 3, 4, 5, -1, -2, -3, 4, 5];
	$sum = 0;
	foreach ($arr as $value) {
		if ($value < 0)
			break; 

		$sum += $value;
	}
	echo $sum;
	?>

	<h2 class="menu">Задача 17. Дан массив с числами. Запустите цикл, который будет по очереди выводить элементы этого массива в консоль до тех пор, пока не встретится элемент со значением 0. После этого цикл должен завершить свою работу.</h2>
	<?php
	$arr = [1, 2, 3, 4, 5, 0, 6, 9];
	foreach ($arr as $value) {
		if ($value == 0)
			break; 
		?><script>console.log('<?= $value ?>')</script><?
		
	//print($value);
	}?>

	<h2 class="menu">
Задача 18. Перепишите главную страницу своего сайта с лабораторными работами согласно следующим требованиям:
•	Подключение всех файлов стилей в head должно быть вынесено в отдельный файл с именем head.html и подключено на главную страницу при помощи require
•	Все ссылки на лабораторные работы должны быть обленены в один блок и вынесены в отдельный файл с именем nav.html и подключено на главную страницу при помощи require
•	Для страницы должен быть создан header (в нём название предмета и имя лектора) и footer (в нём год, ваше ФИО, номер группы).  Блоки header и footer должны быть помещены в отдельные файлы и расширением .html и подключены к главной странице при помощи include.</h2>


</body>
</html>