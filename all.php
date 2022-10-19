<?php
$dbc = mysqli_connect('localhost', 'root', '', 'cloud_lab1');
$success = false;
$errormsg = "error";
$query = "SELECT * FROM `cars`";
$data = mysqli_query($dbc,$query);
if(mysqli_num_rows($data) > 0) {
	$success = true;
	$errormsg = 'Перелік зареєстрованих автомобілів:';
} else {
	$errormsg = 'Автомобілів немає.';
	$success = false;
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
	<b> <?php echo $errormsg; ?> </b>
	<br></br>
	<?php if($success == true):?>
	
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