<?
session_start();
if (isset($_SESSION['ID'])) {
		session_unset();
		session_destroy();
		};
	echo "<script>
location.href='index.php';
</script>";
?>