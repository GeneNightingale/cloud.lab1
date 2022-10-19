<?php
$dbc = mysqli_connect('sql.freedb.tech', 'freedb_nightingale', 'PwMkwxgWPvaDn2&', 'freedb_cloud_lab1');
$success = false;
$errormsg = "error";
if(isset($_POST['submit'])) {
	$input_brand = mysqli_real_escape_string($dbc, trim($_POST['brand']));
	$input_country = mysqli_real_escape_string($dbc, trim($_POST['country']));
	$input_price = mysqli_real_escape_string($dbc, trim($_POST['price']));
	$input_year = mysqli_real_escape_string($dbc, trim($_POST['year']));
	if(!empty($input_brand) && !empty($input_country) && !empty($input_price) && !empty($input_year)) {
		$query1 = "SELECT * FROM `Cars` WHERE Brand = '$input_brand' AND Country = '$input_country' AND Price = $input_price AND Year = $input_year";
		$query2 = "INSERT INTO `Cars` VALUES ('$input_brand', '$input_country', $input_price, $input_year)";
		$data = mysqli_query($dbc,$query1);
		if(mysqli_num_rows($data) == 0) {
			mysqli_query($dbc,$query2);
			$success = true;
			$errormsg = 'Автомобіль успішно додано до БД';
		}
		else {
			$errormsg = 'Такий автомобіль вже існує';
			$success = false;
		}
	}
	else {
		$errormsg = 'Ви повинні заповнити всі поля';
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
	<?php if($success == true):?>
		<label>Додано автомобіль з наступними параметрами:</label>
		<br>
		<label>Марка:  <?php echo $_POST['brand']; ?></label>
		<label>Країна:  <?php echo $_POST['country']; ?></label>
		<label>Цiна:  <?php echo $_POST['price']; ?></label>
		<label>Рiк:  <?php echo $_POST['year']; ?></label>
		</form>
	<?php else: { ?>
		<label> <?php echo $errormsg; ?> </label>
	<?php } endif; ?>
</content>


<footer class="clear">
	<p>Одеса 2022</p>
</footer>

</body>
</html>