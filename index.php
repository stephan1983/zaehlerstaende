<!DOCTYPE HTML>
<html>
<head>
<title>Zählerstand</title>
</head>

<body>
<?php require 'func.php'?>

<?php
	
	if (isset($_POST["insert_zaehler"])) {
		$insert_zaehler = test_input($_POST["insert_zaehler"]);
	}
	if (isset($_POST["art_zaehler"])) {
		$art_zaehler = test_input($_POST["art_zaehler"]);
	}
	
	$sql = "SELECT * from zaehler";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows === 0) {
    	echo "Keine Datensätze vorhanden.";
	}
	$zaehler = $result->fetch_assoc();
	
	echo $zaehler['id'];
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Zähler: <input type="text" name="zaehler_name">
  <br><br>
  Nummer: <input type="text" name="zaehler_nummer">
  <br><br>
  <input type="hidden" name="insert_zaehler" value="1">
  <input type="submit" name="submit" value="Submit">  
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Art: <input type="text" name="art_name">
  <br><br>
  <input type="hidden" name="art_zaehler" value="1">
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
	if (isset($art_zaehler)) {
		if (empty($_POST["art_name"])) {
			echo "Der Name der Zählerart ist leer";
		}
		else {
			$art_name = test_input($_POST["art_name"]);
			echo "$art_name";
		}
	}
	
	if (isset($insert_zaehler)) {	
		if (isset($_POST["zaehler_name"])) {
			$zaehler_name = test_input($_POST["zaehler_name"]);
		}
		echo $zaehler_name;
		echo "<br>";
		if (isset($_POST["zaehler_nummer"])) {
			$zaehler_nummer = test_input($_POST["zaehler_nummer"]);
		}
		echo $zaehler_nummer;
	}
?>


</body>

</html>