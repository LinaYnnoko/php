<?
if (isset($_SESSION['ID'])) {
		session_unset();
		session_destroy();
		};
?>
<?require('header.php');?>
	<img class="body-img-registr" src="img/depositphotos_204643984-stock-photo-row-of-cute-different-dogs.jpg">
	<div class="author">
		<h2>Авторизация</h2>
		<form id="authorization" action="">
			<input class="phone1" placeholder="Телефон" type="tel" name="phone" pattern="^\+[0-9]{1,3}[0-9]{1,3}[0-9]{3}[0-9]{2}[0-9]{2}$" title="Например: +375296993079" autocomplete="off">
			<span id="phone_err_auth"></span>
			<input  class="password1" placeholder="Пароль" type="password" name="password1" autocomplete="off">
			<span id="password_err_auth"></span>
			<input type="submit" id="submit1" value="Войти" autocomplete="off">
		</form>
		<p class="regist1">Еще не зарегистрированы?</p>
		<a href="reg.php"><p class="regist2">Зарегистрируйтесь!</p></a>
	</div>
	<script src="js/auth.js"></script>
</body>
</html>