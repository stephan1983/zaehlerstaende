<!DOCTYPE HTML>
<html>
<head>
<title>Zählerstand</title>
</head>

<body>
<?php require 'func.php'?>

<?php
	$db = new Db();
	
	
	if (isset($_POST["insert_zaehler"])) {
		$insert_zaehler = test_input($_POST["insert_zaehler"]);
	}
	if (isset($_POST["art_zaehler"])) {
		$art_zaehler = test_input($_POST["art_zaehler"]);
	}

	$rows = $db -> select("SELECT * from zaehler");
	
	if ($rows === 0) {
    	echo "Keine Datensätze vorhanden.";
	}
	
	foreach ($rows as $row) {
		print_r($row);
	}
	
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Zähler: <input type="text" name="zaehler_name">
  <br><br>
  Nummer: <input type="text" name="zaehler_nummer">
  <br><br>
  Art-ID: <input type="text" name="zaehler_art_id">
  <br><br>
  Status: <input type="text" name="zaehler_status">
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
		if (isset($_POST["zaehler_art_id"])) {
			$zaehler_art_id = test_input($_POST["zaehler_art_id"]);
		}
		if (isset($_POST["zaehler_status"])) {
			$zaehler_status = test_input($_POST["zaehler_status"]);
		}
		
		$sql_insert = $db -> insert($zaehler_art_id,$zaehler_name, $zaehler_nummer, $zaehler_status);
		echo $sql_insert;
		
	}
?>


</body>

</html>