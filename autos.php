<?php
require_once "connect.php";
if ( isset($_POST['logout'] ) ) {
    header("Location: login.php");
    return;
};
if ( !isset($_GET['name'] ) ) {
    die("Name parameter missing!");
    return;
};

$failmsg = false;
$succmsg = false;

if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {
	$make = htmlentities($_POST['make']);
	$year = htmlentities($_POST['year']);
	$mileage = htmlentities($_POST['mileage']);
	if (strlen($make) < 1 ) {
		$failmsg = "Make is required";
	}
	elseif (! is_numeric($year) || (! is_numeric($mileage)) || strlen($year) < 1 || strlen($mileage) < 1) {
		$failmsg = "Mileage and year must be numeric";
	}
	else {
		$stmt = $connect->prepare('INSERT INTO autos
        (make, year, mileage) VALUES ( :mk, :yr, :mi)');
    	$stmt->execute(array(
        ':mk' => $make,
        ':yr' => $year,
        ':mi' => $mileage)
    );
    	$success = "Record inserted";
	}
}

$stmt = $connect->query("SELECT make, year, mileage FROM autos ORDER BY mileage");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<html>
<head>
</head>

<body>
<h1> Vehicle database.</h1>

<?php
if ( $failmsg !== false ) {
    print '<p style="color:red">';
    print htmlentities($failmsg);
    print "</p>\n";
}
else {
	print '<p style="color:green">';
	print htmlentities($succmsg);
	print "</p>\n";
}
?>
<table border="1">
    <?php
    foreach ( $rows as $row ) {
        echo "<tr><td>";
        echo($row['make']);
        echo("</td><td>");
        echo($row['year']);
        echo("</td><td>");
        echo($row['mileage']);
        echo("</td></tr>\n");
    }
    ?>
</table>
<p>Add a new vehicle</p>
<form method="post">
<p>Make:
<input type="text" name="make" size="20"></p>
<p>Mileage:
<input type="text" name="year"  size="20"></p>
<p>Year:
<input type="text" name="mileage"  size="20"></p>
<p><input type="submit" value="Add New"/></p>
<input type="submit" name="logout" value="Log out">
</form>
</body>
