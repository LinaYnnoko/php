<? 
session_start();

	$imgdata=addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

	$query="INSERT INTO `Animal` (`idAnimal`, `idUser`, `idType`, `idCity`, `idColor`, `PetName`, `Gender`, `Age`, `Description`, `Photo`, `Date`) 
	VALUES (NULL, '{$_SESSION['ID']}', '{$_POST['type']}', '{$_POST['city']}', '{$_POST['color']}', '{$_POST['name']}', '{$_POST['gen']}', '{$_POST['age']}', '{$_POST['desc']}', '{$imgdata}', CURRENT_DATE())";


	if (mysqli_query($db, $query)) echo json_encode(["Key"=>2]);
	else echo json_encode(["Key"=>1]);

?>