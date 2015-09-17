<!DOCTYPE html>
<html>
<head><title>Index</title></head>
<body>

Existing surveys:

<?php
 require_once("db/db_connect.php"); 


$db = Db::getInstance();
$mysqli = $db->getConnection(); 



$sql_query = "SELECT id, name FROM survey";
$result = $mysqli->query($sql_query);

if ($result->num_rows > 0) {
	?>
	
	<table border=1><tr><td>ID</td><td>NAME</td></tr>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]."</td></tr><br>";
    }
	
	?>	
	</table>
	<?php
}

$db->closeConn();

?>
<br>
Add new survey:
<form name="newSurveyForm" method="post" action="add_survey.php">
<input type="text" name="survey_name"/>
<input type="submit" value="submit"/>
</form>
</body>
</html>