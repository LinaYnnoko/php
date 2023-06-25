<style>

 .title{
 font-family: Comic Sans MS;
 text-align: center;
 border-bottom: solid;
 margin-top: 30px;
 padding-bottom: 20px;
 color: #FFF; /* Цвет текста */
 }
 .menu{
 font-family: Comic Sans MS;
 margin-top: 50px;
 text-align: center;
 color: #FFF; /* Цвет текста */
 }
 .c {
    border-radius: 20px;
 border: 1px solid #333; /* Рамка */
 display: inline-block;
 padding: 10px 20px; /* Поля */ 
  margin: 10px 20px;
 text-decoration: none;
 color: #FFF; /* Цвет текста */
 }
 .c:hover {
 box-shadow: 0 0 5px rgba(0,0,0,0.3); /* Тень */
 background: #98FB98;
 }
 </style>

<?require_once("header.php")?>
<?if(isset($_SESSION['login']) && !empty($_SESSION['login'])){?>
	<div class="title">
		<h1>
		ЛАБОРАТОРНЫЕ РАБОТЫ
		</h1>
	</div>
	<div class="menu">
		<?require "nav.html"?>
	</div>
<?}?>
<?require_once("footer.php")?>