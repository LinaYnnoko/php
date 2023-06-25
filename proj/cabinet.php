<?require('header.php')?>
<?
session_start();
if (!isset($_SESSION['ID'])) 
	echo "<script>
alert('Вы не авторизованы!')
location.href='registration.php';
</script>";

$hello = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM User WHERE idUser=".$_SESSION['ID']))['name'];
$hello.=" ".mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM User WHERE idUser=".$_SESSION['ID']))['surname']
?>
    <div class="hello-backgrount">
        	<h1> Добро пожаловать, <?= $hello;?>!</h1>

        <div class="favorite-card">
            <h2>Избранные питомцы</h2>
        	<?
        	$db=mysqli_connect('localhost', 'root', '', 'animal_shelter');
        	$fav=mysqli_query($db, "SELECT * FROM Favorites WHERE idUser=".$_SESSION['ID']);
        	while (($res_fav=mysqli_fetch_assoc($fav)) != false) {
        		$animal=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Animal WHERE idAnimal=".$res_fav['idAnimal']));

        		if ($animal['Gender']) $gen="Женский" ;
        			else $gen="Мужской";
        			$type = mysqli_fetch_assoc(mysqli_query($db, "Select * FROM Type Where idType = '{$animal['idType']}'"))['TypeName'];

        	 echo '<div class="card-card">';
        	 echo '<img src = "data:image/png;base64,' . base64_encode($animal['Photo']);
        	 
        	echo '">
        				<p>	Имя: '.$animal['PetName'].'<br>
        					Тип: '.$type.'<br>
        					Пол: '.$gen.'
        				</p> <form  method="POST" action="card.php">
        				<input type="number" name="id" value="'.$animal['idAnimal'].'" style="visibility: hidden;">
        				<input type="submit" value="Перейти">
        		</form>
        		</div>';
        	}
        	?>
        </div>
        <button class="get-out-button" onclick="location.href = '../logout.php'"> Выйти из кабинета </button>
        <? if ($_SESSION['isAdmin'])
        echo '
        <a href="form.php"><button class="add-pet-button">Добавить животного</button></a>'; 
        ?>
    </div>
<?require('footer.php')?>