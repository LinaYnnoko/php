<?require_once("header.php")?>
<?require_once("functions.php")?>
<?
session_start();

if(isset($_POST['form']))
{
  if((isset($_POST['login']) && !empty($_POST['login'])) &&
      (isset($_POST['password']) && !empty($_POST['password'])))
  {
    checkLoginAndPassword($result, $_POST['login'], $_POST['password']);
  }
}
?>

  <div class="login-box">
    <form action="" method="post">

      <div class="user-box">
        <input type="text" name="login" autocomplete="off">
        <label> Логин </label>
      </div>

      <div class="user-box">
        <input type="password" name="password" autocomplete="off">
        <label>Пароль</label>
      </div>

      <div class="button-form">
        <input type="submit" id="submit" name="form" value="Войти">
      </div>
      <div class="button-form">
        <a href="registration.php">Зарегестрироваться</a>
      </div>
    </form>
  </div>
<?require_once("footer.php")?>