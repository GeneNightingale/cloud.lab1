<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style/style.css" rel="stylesheet">
</head>
<body>
<header>
<ul>
	<li><a href="/">Додати</a></li>
	<li><a href="/all.php">Всі автомобілі</a></li>
	<li><a href="/search.php">Пошук по марці</a></li>
</ul>
</header>
<content>
	<form action="add.php" method="POST">
	<b>Додання автомобіля</b>
	<br></br>
	<label for="brand">Марка:</label>
	<input name ="brand" type="text" placeholder="Уведіть марку автомобіля">
	<label for="country">Країна:</label>
	<input name ="country" type="text" placeholder="Уведіть країну виробника">
	<label for="price">Цiна:</label>
	<input name ="price" type="number" placeholder="Уведіть ціну автомобіля">
	<label for="year">Рiк:</label>
	<input name ="year" type="number" placeholder="Уведіть рік випуску">
	<button type="submit" name="submit">Додати</button>
	</form>
</content>


<footer class="clear">
	<p>Одеса 2022</p>
</footer>

</body>
</html>