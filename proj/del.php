<? 
session_start();
if (isset($_SESSION['ID']))
{
	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');
	session_start();

	$query="DELETE FROM `Animal` WHERE `Animal`.`idAnimal` = ".$_POST['id'];

	if (mysqli_query($db, $query)){
		echo (json_encode(["Key"=>0]));
	}
		else echo (json_encode(["Key"=>1]));
}
		

?>