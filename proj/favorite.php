<? 
session_start();
if (isset($_SESSION['ID']))
{
	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');


	if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM Favorites WHERE idAnimal = ".$_POST['id']." AND  idUser =  ".$_SESSION['ID']))==0){
		if (mysqli_query($db, "INSERT INTO `Favorites` ( `idUser`, `idAnimal`) VALUES ('{$_SESSION['ID']}', '{$_POST['id']}')"))
			echo (json_encode(["Key"=>1]));
		else echo (json_encode(["Key"=>0]));
	}
	else echo json_encode(["Key"=>1]);
}
else echo (json_encode(["Key"=>0]));
		

?>
