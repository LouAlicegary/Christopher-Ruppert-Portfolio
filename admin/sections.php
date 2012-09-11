<?php

	$docRoot = getenv("DOCUMENT_ROOT");

	require_once $docRoot . "/connect.php";
	mysqli_select_db($conn,'enw') or die ('SELECT DB ERROR!<br />' . mysqli_error());

	if (isset($_POST)) foreach ($_POST as $key => $val) { ${$key} = $val; echo "key: " . $key . ", val:" . $val . "<br />";}
	elseif (isset($_GET)) foreach ($_GET as $key => $val) { ${$key} = $val; echo "key: " . $key . ", val:" . $val . "<br />";}


	if (isset($submit)) {
		if ($submit == 'add') {
			$insertQ = "INSERT INTO sections (name,permissions,active,owner) VALUES ('$short_name',0,$active[0],$owner_id)";

			$insertR = mysqli_query($conn, $insertQ) or die ("Insert Query Error:<br />$insertQ" . mysqli_error($conn));

		} elseif ($submit == 'submit') {

		}

	}


	if (isset($owner) && $owner != '') {
		//hide some data for the next submit
		

		//get sections according to artist
		$query = "SELECT cat_id,name,active FROM sections WHERE owner = $owner";

		$result = mysqli_query($conn, $query) or die ("Query Error:<br />" . mysqli_error($conn));

		echo "<h2>Sections:</h2>";
		echo "<form method='post' action=" . $_SESSION['PHP_SELF'] . ">";
		echo "<table>";
		while ($row = mysqli_fetch_row($result)) {
			echo "<tr><td>" . $row[0] . "</td><td>" . $row [1] . "</td><td>" . $row[2] . "</td></tr>";
		}
		echo "</table>";
		echo "<input type='text' name='short_name' id='' value=''>";
		echo "ON<input type='radio' name='active[]' id='' value='1'>";
		echo "OFF<input type='radio' name='active[]' id='' value='0'>";

		echo "<input type='hidden' name='owner_id' id='' value='$owner'>";

		echo "<input type='submit' name='submit' value='add' />";
		echo "</form>";
	} else {
		echo "<p>Please select an artist to update.</p>";

		echo "<form method='post' action=" . $_SESSION['PHP_SELF'] . ">";
		$query = "SELECT id,name,full_name FROM artists";

		$result = mysqli_query($conn, $query) or die ("Query Error:<br />" . mysqli_error($conn));

		echo "<select name='owner'>";
		while ($row = mysqli_fetch_row($result)) {
			echo "<option value='$row[0]'>" . $row[0] . " - " . $row [1] . " - " . $row[2] . "</option>";

		}
		echo "</select>";
		echo "<input type='submit' name='submit' value='submit' />";
		echo "</form>";
	}
	//create form to add, edit or delete sections. items will become unnassociated.





?>
