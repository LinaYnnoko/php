<?require('header.php')?>

	<div class="one-card">
		<div class="one-card-card">
		<?
			$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

			$animal = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `Animal` WHERE `idAnimal`= '{$_POST['id']}'"));
			$type = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Type Where idType = '{$animal['idType']}'"))['TypeName'];
			$city = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM City Where idCity = '{$animal['idCity']}'"))['CityName'];
			$color = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Color Where idColor = '{$animal['idColor']}'"))['ColorName'];
			$admin = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `user` WHERE `idUser`= '{$animal['idUser']}'"));


			echo '<img src = "data:image/png;base64,' . base64_encode($animal['Photo']) . '" width = "50px" height = "50px"/>';

			$user=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `user` WHERE `idUser`= '{$_SESSION['ID']}'"));

			if ($animal['Gender']==0) $gen="Женский";
					else $gen="Мужской";

			echo '<p>Имя: '.$animal['PetName'].'<br>
				Тип: '.$type.'<br>
				Пол: '.$gen.'<br>
				Город: '.$city.'<br>
				Цвет: '.$color.'<br>
				Описание: '.$animal['Description'].'<br>
				Дата регистрации в приюте:'.$animal['Date'].'
				</p>';

			echo '<h2>
				Телефон: '.$admin['name'].' '.$admin['surname'].' ('.$admin['phone'].')<br>
			</h2>'; 


			echo '<form id="oleg">
			<input type="number" name="id" value='.$_POST['id'].' style="visibility: hidden">
			<input class="favorite" type="submit" value="ИЗБРАННОЕ">
			</form>';

			if($user['isAdmin'] == 1){
				echo '<form id="delete">
				<input type="number" name="id" value='.$_POST['id'].' style="visibility: hidden">
				<input class="delete" type="submit" value="Удалить">
				</form>';
			}
		?>

		</div>
	</div>

	<script type="text/javascript" src="js/favorites.js"></script>
	<script type="text/javascript" src="js/del.js"></script>
</body>
</html>