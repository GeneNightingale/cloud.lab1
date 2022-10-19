<?php
$dbc = mysqli_connect('sql.freedb.tech', 'freedb_nightingale', 'PwMkwxgWPvaDn2&', 'freedb_cloud_lab1');
$success = false;
$errormsg = "error";
if(isset($_POST['submit'])) {
	$input_brand = mysqli_real_escape_string($dbc, trim($_POST['brand']));
	$query = "SELECT * FROM `Cars` WHERE Brand = '$input_brand'";
	$data = mysqli_query($dbc,$query);
	if(mysqli_num_rows($data) > 0) {
		$success = true;
		$errormsg = 'Перелік зареєстрованих автомобілів:';
	} else {
		$errormsg = 'Автомобілів немає.';
		$success = false;
	}
}
?>

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
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<b>Пошук по марці</b>
	<br></br>
	<label for="brand">Марка:</label>
	<input name ="brand" type="text" placeholder="Уведіть марку автомобіля">
	<button type="submit" name="submit">Пошук</button>
	</form>
	<br></br>
	
	<?php if($success == true):?>
	<b>Знайдено за маркою <?php echo $input_brand; ?>:</b>
	<br></br>
		<?php
			while($row = mysqli_fetch_assoc($data)) { ?>
				<label>Марка:  <?php echo $row['Brand']; ?>; Країна:  <?php echo $row['Country']; ?>; Цiна:  <?php echo $row['Price']; ?>; Рiк:  <?php echo $row['Year']; ?></label>
			<?php 
			} ?>
	<?php endif; ?>
	
</content>


<footer class="clear">
	<p>Одеса 2022</p>
</footer>

</body>
</html>