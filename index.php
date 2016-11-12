<!DOCTYPE HTML>
<html>
<head>
<title>Zählerstand</title>
</head>

<body>
<?php require 'func.php'?>

<?php
	$db = new Db();
	$check_data = new data();
	
	if (isset($_POST["insert_zaehler"])) {
		$insert_zaehler = $check_data -> test_input($_POST["insert_zaehler"]);
	}
	if (isset($_POST["art_zaehler"])) {
		$art_zaehler = $check_data -> test_input($_POST["art_zaehler"]);
	}
	
	/* $rows = $db -> select("SELECT * from zaehler");
	
	if ($rows === 0) {
    	echo "Keine Datensätze vorhanden.";
	}
	
	foreach ($rows as $row) {
		print_r($row);
	} 
	*/

	
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Zähler: <input type="text" name="zaehler_name">
  <br><br>
  Nummer: <input type="text" name="zaehler_nummer">
  <br><br>
	<label>Art-ID:
  		<select name="zaehler_art_id">
  			<?php
  			$query_art = $db -> select("SELECT id,art from art");
  			foreach ($query_art as $row) {
  				echo "<option value=" . $row["id"] . ">" . $row["art"] . "</option>";
  			}
  			?>
  		</select>
	</label>
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
			$art_name = $check_data -> test_input($_POST["art_name"]);
			$db -> query("INSERT INTO art (art) VALUES ('$art_name')");
		}
	}
	
	if (isset($insert_zaehler)) {
		if (isset($_POST["zaehler_name"])) {
			$zaehler_name = $check_data -> test_input($_POST["zaehler_name"]);
			echo $zaehler_name;
		}
		echo "<br>";
		if (isset($_POST["zaehler_nummer"])) {
			$zaehler_nummer = $check_data -> test_input($_POST["zaehler_nummer"]);
			echo $zaehler_nummer;
		}
		echo $zaehler_nummer;
		if (isset($_POST["zaehler_art_id"])) {
			$zaehler_art_id = $check_data -> test_input($_POST["zaehler_art_id"]);
			echo $zaehler_art_id;
		}
		if (isset($_POST["zaehler_status"])) {
			$zaehler_status = $check_data -> test_input($_POST["zaehler_status"]);
			echo $zaehler_status;
		}
		$db -> query("INSERT INTO zaehler (art_id,name,nummer,status) VALUES ('$zaehler_art_id','$zaehler_name','$zaehler_nummer','$zaehler_status')");
		
	}
?>


</body>

</html>