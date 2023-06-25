<?
if(session_id() == '')
    session_start();

// проверяем на наличие имени в URL-запросе
$_SESSION["name"] = $_GET["name"];
$_SESSION["age"] = $_GET["age"];
$_SESSION["date"] = date('l, d M Y');

if($_GET["radio"]) {$str = strip_tags($_GET["radio"]);}

if($_GET["radio"] == "women"){?>
    <img src="women.jpg" style="width: 10%;">
<?}
else{?>
    <img src="man.jpg" style="width: 10%;">
<?}
?>
<p><a href="session.php">INFO</a>