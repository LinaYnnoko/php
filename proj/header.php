<?
	session_start();
		

	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

	$arrMenu = mysqli_query($db, "SELECT * FROM `Menu`");
	$arrAnimals = mysqli_query($db, "SELECT * FROM `Type`");	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/index.css" type="text/css"/>
	<title>Pet</title>
	<style type="text/css">
		@font-face {
			font-family: 'Jost-reg'; /* Гарнитура шрифта */
			src: url(font/Jost-Regular.ttf); /* Путь к файлу со шрифтом */
		}
		@font-face {
			font-family: 'Jost-bolt'; /* Гарнитура шрифта */
			src: url(font/Jost-Bold.ttf); /* Путь к файлу со шрифтом */
		}
	</style>
</head>
<header>
	<nav>
  	<ul class="topmenu">
  		<? while (($menu = mysqli_fetch_assoc($arrMenu)) != false) {?>
			<li><a href="<?=$menu['Link']?>"><?=$menu['HomePage']?></a>
				<? if($menu['idMenu'] == 2){?>
					<ul class="submenu">
						<?while (($animal = mysqli_fetch_assoc($arrAnimals)) != false) {?>
					        <li><a href="<?=$menu['Link']?>?type=<?=$animal['idType']?>"><?=$animal['TypeName']?></a></li>
				        <?}?>
				    </ul>
				<?}?>
			</li>
		<?}?>
	</ul>
</nav>
</header>

<body>