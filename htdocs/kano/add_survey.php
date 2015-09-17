
<?php
 require_once("db/db_connect.php"); 

$db = Db::getInstance();
$mysqli = $db->getConnection(); 


$preparedStatement = $mysqli->prepare('INSERT INTO survey (name) VALUES (?)');
$unsafe_variable = $_POST['survey_name']; 


$preparedStatement->bind_param('s', $unsafe_variable);

$preparedStatement->execute();


header( 'Location: http://localhost/kano' ) ;

?>

