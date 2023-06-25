<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?
//1
	$massiv=[1, 4, 435];

	function my_dump($array){
		for($i=0;$i<count($array);$i++){
			echo("<pre/>");
			echo($array[$i]);
			echo("<pre/>");
		}
	}

	my_dump($massiv);

?>

<p>
Задание 2. Написать функцию randomList(), принимающую 1 аргумент - длина массива. 
Функция должна возвращать массив данной длины, заполненный случайными числами от -99 до 99.
С помощью этой функции заполните 3 массива длинной: 5, 10 и 15– элементов. Написать функцию summList(), 
принимающую 1 аргумент - массив. Эта функция должна находить сумму всех четных элементов массива и возвращать ответ. 
Выведите сумму элементов 3х ранее созданных списков X, Y, Z.
</p>
<? //2
	function randomList($len){
		$array=[];
		for($i=0;$i<$len;$i++){
			$array[$i]=rand(-99,99);
		}
		return $array;
	}

	$arr = randomList(5);
	echo(var_dump($arr));

	$arr = randomList(10);
	echo(var_dump($arr));

	$arr = randomList(15);
	echo(var_dump($arr));

	$mas=[1, 2, 3, 4, 5, 6, 2];

	function summList($array){
		$sum=0;
		for($i=0;$i<count($array);$i++){
			if($array[$i]%2==0){
				$sum += $array[$i];
			}
		}
		return $sum;
	}
	$sum=summList($mas);
	echo("Сумма: ".$sum)."<br/>";

//3
	?>

<p>
Задание 3. Написать функцию square(), принимающую 1 аргумент — сторону квадрата, и возвращающую 2 значения:
 периметр квадрата и площадь квадрата. Написать функцию rectangle(), принимающую 2 аргумент — две стороны прямоугольника,
 и возвращающую 2 значения: периметр прямоугольника и его площадь.
</p>

	<?

function square($a){
	echo("Периметр равен ".$a*4)."<br/>";
	echo("Площадь равна ".$a*$a)."<br/>";
}

	square(2);

	function rectangle($a, $b){
		$c = $a*2 + $b*2;
		echo("Периметр равен ".$c)."<br/>";
		echo("Площадь равна ".$a*$b)."<br/>";
	}

	rectangle(2,3);

	?>

	<p>
Задание 4. Создайте и заполните 3 файла:
menu1.txt - содержащий список первых блюд
menu2.txt - содержащий список вторых блюд
menu3.txt - содержащий список десертов
Считайте данные из файла и выведите на экран. Создайте функцию menu(), которая случайным образом генерирует меню ресторана на сегодняшний день. После чего создаёт файл today.txt и записывает в него меню.
	</p>

	<?
//4
	$menu1 = "Овощной суп, грибной суп, куриный бульон";
	$menu2 = "Мясо по французски с картошкой, шашлык из говядины, овощная тарелка";
	$menu3 = "Черничный торт, фисташковое печенье, имбирный пряник";

	file_put_contents(__DIR__.'/menu1.txt', $menu1);
	file_put_contents(__DIR__.'/menu2.txt', $menu2);
	file_put_contents(__DIR__.'/menu3.txt', $menu3);

	function menu(){
		$firstmenu = file_get_contents(__DIR__.'/menu1.txt');
		$secondmenu = file_get_contents(__DIR__.'/menu2.txt');
		$desertmenu = file_get_contents(__DIR__.'/menu3.txt');

		$firstmenuarr = explode(", ",$firstmenu);
		$secondmenuarr = explode(", ",$secondmenu);
		$desertmenuarr = explode(", ",$desertmenu);

		$todaymenu = $firstmenuarr[rand(0,count($firstmenuarr)-1)]." ".$secondmenuarr[rand(0,count($secondmenuarr)-1)]." ".$desertmenuarr[rand(0,count($desertmenuarr)-1)];

		file_put_contents(__DIR__.'/today.txt', $todaymenu);
	}

	menu();
?>
	
</body>
</html>
