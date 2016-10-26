<!DOCTYPE HTML>
<html>
<head>
<title>Zählerstand</title>
</head>

<body>
<?php require 'func.php'?>

<?php
	$sql = "SELECT * from zaehler";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows === 0) {
    	echo "Keine Datensätze vorhanden.";
    	exit;
	}
	$zaehler = $result->fetch_assoc();
	
	echo $zaehler['id']
?>

</body>

</html>