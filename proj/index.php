<?require('header.php');?>
	<div class="galery-text">
		<img class="imeg-2" src="img/Group 2.png">
		<div class="text-description">
			<h2>Хочешь завести четвероногого друга?</h2>
			<p>Наш приют дает шанс обрести животному хороший дом, а человеку - настоящего друга и верного компаньона. Приют является универсальным и не отказывает в помощи ни одному брошенному питомцу. В галерее приюта вы сможете найти котов, собак, птичьих, грызунов, рептилий и других животных. Если вам понравилась карточка животного - добавляйте его в избранное, чтобы не потерять, а затем приезжайте на базу одного из приютов и забирайте воспитанника себе!</p>
			<a href="catalog.php"><button class="see">СМОТРЕТЬ</button></a>
		</div>
	</div>

	<div class="new-pet">
		<h1>Недавно добавленные животные</h1>
		<div class="pet-card">
			<div class="new-pet-card-1">
				<?
				$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

				$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Animal ORDER BY `idAnimal` DESC LIMIT 0, 3"));
				$type = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Type Where idType = '{$row['idType']}'"))['TypeName'];


				if ($row['Gender']==0) $gen="Женский";
				else $gen="Мужской";

				echo '<img src = "data:image/png;base64,' . base64_encode($row['Photo']) . '" width = "50px" height = "50px"/>';

				echo '<p>Имя: '.$row['PetName'].'<br>
					Тип: '.$type.'<br>
					Пол: '.$gen.'<br>
				</p>';

				echo '
				<form  method="POST" action="card.php">
				<input type="number" name="id" value="'.$row['idAnimal'].'" style="visibility: hidden;">
				<input type="submit" value="Перейти">
				</form>';
				?>

					
				<!-- <a href=""><button>ПЕРЕЙТИ</button></a> -->
			</div>

			<div class="new-pet-card-2">
				<?
				$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

				$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Animal ORDER BY `idAnimal` DESC LIMIT 1, 3;"));
				$type = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Type Where idType = '{$row['idType']}'"))['TypeName'];


				if ($row['Gender']==0) $gen="Женский";
				else $gen="Мужской";

				echo '<img src = "data:image/png;base64,' . base64_encode($row['Photo']) . '" width = "50px" height = "50px"/>';

				echo '<p>Имя: '.$row['PetName'].'<br>
					Тип: '.$type.'<br>
					Пол: '.$gen.'<br>
				</p>';

				echo '
				<form  method="POST" action="card.php">
				<input type="number" name="id" value="'.$row['idAnimal'].'" style="visibility: hidden;">
				<input type="submit" value="Перейти">
				</form>';
				?>
<!-- 				<a href=""><button>ПЕРЕЙТИ</button></a> -->
			</div>

			<div class="new-pet-card-3">
				<?
				$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

				$row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Animal ORDER BY `idAnimal` DESC LIMIT 2, 3;"));
				$type = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Type Where idType = '{$row['idType']}'"))['TypeName'];


				if ($row['Gender']==0) $gen="Женский";
				else $gen="Мужской";

				echo '<img src = "data:image/png;base64,' . base64_encode($row['Photo']) . '" width = "50px" height = "50px"/>';

				echo '<p>Имя: '.$row['PetName'].'<br>
					Тип: '.$type.'<br>
					Пол: '.$gen.'<br>
				</p>';

				echo '
				<form  method="POST" action="card.php">
				<input type="number" name="id" value="'.$row['idAnimal'].'" style="visibility: hidden;">
				<input type="submit" value="Перейти">
				</form>';
				?>
				
<!-- 				<a href=""><button>ПЕРЕЙТИ</button></a> -->
			</div>
		</div>
		<a href="catalog.php"><button class="see-1">СМОТРЕТЬ</button></a>
	</div>

	<div class="registr">
		<img src="img/Group 3.png">
		<div class="registr-win">
			<h1>Понравился питомец, но есть вопросы?</h1>
			<p>Зарегистрируйтесь на нашем сайте, чтобы иметь возможность добавлять понравившееся вам животное в избранное. А также имейте возможность связаться и задать вопросы нашим администраторам.</p>
			<a href="reg.php"><button>Регистрация</button></a>
		</div>
	</div>

<?require('footer.php')?>