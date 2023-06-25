<?require('header.php');?>
<?	
$arrType = mysqli_query($db, "SELECT * FROM `Type`");
$arrCity = mysqli_query($db, "SELECT * FROM `City`");
$arrColor = mysqli_query($db, "SELECT * FROM `Color`");

if(!empty($_GET['type'])){

	$type = $_GET['type'];
	$query = "SELECT Type.TypeName, Type.idType, Color.idColor, idAnimal, PetName, Gender, Date,  Photo FROM Animal
			JOIN Type ON Type.idType = Animal.idType
			JOIN Color ON Color.idColor = Animal.idColor
			WHERE Animal.idType = $type";

	$arAnimals = mysqli_query($db, $query);

	$sort="PetName";
	$asc=false;

	while (($an=mysqli_fetch_assoc($arAnimals))!=false) {
				$ar_res[$an[$sort]]=$an;
				# code...
			}
			if ($ar_res!=0){
			if (!$asc)
				ksort($ar_res);
			else krsort($ar_res);

			$ar_res=array_values($ar_res);
		}
} elseif(isset($_POST['filter']) && (isset($_POST['type']) || isset($_POST['color']))){
	$query = "SELECT Type.TypeName, Type.idType, Color.idColor, idAnimal, PetName, Gender, Date,  Photo FROM Animal
			JOIN Type ON Type.idType = Animal.idType
			JOIN Color ON Color.idColor = Animal.idColor
			WHERE";

	if(isset($_POST['type'])){
		$query .= " Animal.idType IN (";

		foreach($_POST['type'] as $key => $valType){
			if($key + 1 != count($_POST['type'])) $query .= $valType.",";
			else $query .= $valType.")";
		}
	}

	if(isset($_POST['type']) && isset($_POST['color'])) $query .= " AND ";

	if(isset($_POST['color'])){
		$query .= " Animal.idColor IN (";

		foreach($_POST['color'] as $key => $valType){
			if($key + 1 != count($_POST['color'])) $query .= $valType.",";
			else $query .= $valType.")";
		}
	}

	$arAnimals = mysqli_query($db, $query);

	$ar_res=array();

	while (($an = mysqli_fetch_assoc($arAnimals))!=false)
		array_push($ar_res, $an);
	
	 arsort($ar_res);
}else{

	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

		$query = "SELECT Type.TypeName, Type.idType, Color.idColor, idAnimal, PetName, Gender, Date,  Photo FROM Animal
				JOIN Type ON Type.idType = Animal.idType
				JOIN Color ON Color.idColor = Animal.idColor
				ORDER BY idAnimal DESC";

	$arAnimals = mysqli_query($db, $query);

				$ar_res=array();

	if (isset($_GET['sortType'])){
		
		$query ="SELECT Type.TypeName, Type.idType, Color.idColor, idAnimal, PetName, Gender, Date,  Photo FROM Animal
			JOIN Type ON Type.idType = Animal.idType
			JOIN Color ON Color.idColor = Animal.idColor";
		

		$sort='PetName';
		$asc=false;

		switch ($_GET['sortType']) {
			case '0':
				$sort="Date";
				$asc=true;
		//echo "<script>alert(`".$query."`)</script>";
				break;
			case '1':
				$sort="Date";
				# code...
				break;
			case '2':
				$sort="PetName";
				# code...
				break;
			case '3':
				$sort="PetName";
				$asc=true;
				# code...
				break;
			
			default:
				# code...
				break;
}
				$arAnimals = mysqli_query($db, $query);
			while (($an=mysqli_fetch_assoc($arAnimals))!=false) {
				$ar_res[$an[$sort]]=$an;
				# code...
			}
			if (!$asc)
				ksort($ar_res);
			else krsort($ar_res);

			$ar_res=array_values($ar_res);

			//var_dump($ar_res);
		
	} else {

	$maxK=0;

	$isset=false;


		while (($an=mysqli_fetch_assoc($arAnimals))!=false) {
				array_push($ar_res, $an);
			}
			 arsort($ar_res); 	

	}
}
?>
	<div class="body-div">
		<div>
		<form class="form-sort">
		Сортировать по:
		<select name="sortType">
			<option value="0" >Недавние</option>
			<option value="1">Давние</option>
			<option value="2" selected>А-Я</option>
			<option value="3">Я-А</option>
		</select>

		<input type="submit" name="" value="Сортировать">

	</form>

		<div class="cards">
			<div class="style-cards">
				<?
				if ($ar_res!=0)
				foreach ($ar_res as $key => $row) 
				{
					if ($isset){
						$k=$kmax;


						if ($k==$kmax){?>
							<div class="card-card" data-color="<?=$row['idColor']?>" data-type="<?=$row['idType']?>">
								<img src = "data:image/png;base64,<?=base64_encode($row['Photo'])?>"/>
								<p>
									Имя: <?=$row['PetName']?><br>
									Тип: <?=$row['Date']?><br>
									Пол: <?=$row['Gender'] == 0 ? "Женский" : "Мужской"?>
								</p>
								<form  method="POST" action="card.php">
									<input type="number" name="id" value="<?=$row['idAnimal']?>" style="visibility: hidden;">
									<input type="submit" value="Перейти">
								</form>
							</div>
						<?}
					} else {?>
						<div class="card-card" data-color="<?=$row['idColor']?>" data-type="<?=$row['idType']?>">
							<img src = "data:image/png;base64,<?=base64_encode($row['Photo'])?>"/>
							<p>
								Имя: <?=$row['PetName']?><br>
								Дата: <?=$row['Date']?><br>
								Пол: <?=$row['Gender'] == 0 ? "Женский" : "Мужской"?>
							</p>
							<form  method="POST" action="card.php">
								<input type="number" name="id" value="<?=$row['idAnimal']?>" style="visibility: hidden;">
								<input type="submit" value="Смотреть">
							</form>
						</div>
					<?}
						
				}?>
				<div style="margin: 35px;"></div>
			</div>
		</div>
	</div>
</div>
<?
	$filtr = mysqli_query($db, "SELECT * FROM `Type`");

?>
<div class="filtr">
	<form method='POST'>
		<label type="checkbox" name="type_name">
			<?
				while (($type = mysqli_fetch_assoc($arrType)) != false) {?>
					<input type="checkbox" name="type[]" value="<?=$type['idType']?>"
						<?if(isset($_POST['type'])) echo in_array($type['idType'], $_POST['type']) ? 'checked' : ''?>><?=$type['TypeName']?>
				<?}
			?>
		</label>
		<label type="checkbox" name="color">
			<?
				while (($type = mysqli_fetch_assoc($arrColor)) != false) {?>
					<input type="checkbox" name="color[]" value="<?=$type['idColor']?>" 
						<?if(isset($_POST['color'])) echo in_array($type['idColor'], $_POST['color']) ? 'checked' : ''?>><?=$type['ColorName']?>
				<?}
			?>
		</label>
		<input type="submit" name="filter" value="Фильтровать">
	</form>
</div>
	
<script type="text/javascript" src="js/filter.js"></script>
<?require('footer.php')?>