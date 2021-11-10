<?php
require_once("func.inc.php");
if(!empty($_POST["faculty_id"])) {
	$results=result("SELECT * FROM protocol WHERE typ = '" . $_POST["faculty_id"] . "'");
?>
	<option></option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["pid"]; ?>"><?php echo $state["title"]; ?></option>
<?php
	}
}
?>