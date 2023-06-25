<?require('header.php')?>

<?
	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');


	if ($animal['Gender']==0) $gen="Женский";
		else $gen="Мужской";

	$arrType = mysqli_query($db, "SELECT * FROM `Type`");
	$arrCity = mysqli_query($db, "SELECT * FROM `City`");
	$arrColor = mysqli_query($db, "SELECT * FROM `Color`");

?>

<img class="body-img-form" src="img/depositphotos_204643984-stock-photo-row-of-cute-different-dogs.jpg">
<form id="add">
	<h2>Добавить питомца</h2>

	<select class="type" name="type">
		<?
	while (($type = mysqli_fetch_assoc($arrType)) != false) {?>
    <option value="<?=$type['idType']?>"><?=$type['TypeName']?></option>
<?}
?>
	</select>

	<select class="city" name="city">
		<?
	while (($city = mysqli_fetch_assoc($arrCity)) != false) {?>
    <option value="<?=$city['idCity']?>"><?=$city['CityName']?></option>
<?}
?>
	</select>

	<select class="color" name="color">
		<?
	while (($color = mysqli_fetch_assoc($arrColor)) != false) {?>
    <option value="<?=$color['idColor']?>"><?=$color['ColorName']?></option>
<?}
?>
	</select>

	<input class="name" type="text" name="name" placeholder="Имя питомца" autocomplete="off">

	<select class="gen" name="gen">

	<option value="0">Женский</option>
	<option value="1">Мужской</option>
	</select>

	<input class="age" type="number" name="age" placeholder="Возраст питомца" min="0">
	<textarea class="desc" name="desc" placeholder="Краткое описание"></textarea>
	<input class="file" type="file" accept="image/*" name="img">

	<input class="submit" type="submit" value="Добавить">


</form>
<script type="text/javascript" src="js/add.js"></script>