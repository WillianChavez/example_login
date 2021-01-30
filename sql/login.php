<?php 
// info of user
$user_name =  $_POST['name'];
$user_lastname =  $_POST['last_name'];
$user_age =  $_POST['age'];

// vars for connection
$bd_host = 'localhost';
$bd_dbname = 'login';
$bd_user = 'root';
$bd_password = '';
try{
	$connection = new PDO('mysql: host:'.$bd_host.'; dbname:'.$bd_dbname.'',$bd_user,$bd_password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo 'connection full '; 

}
catch(PDOException $e){
	die('error in the connection: '. $e->getMessage());
}
$query = 'USE LOGIN';
$connection->exec($query);

$query = 'INSERT INTO USER (NAME, LASTNAME, AGE) VALUES (:name, :last_name, :age)';
$stmt  = $connection->prepare($query);

//$stmt->bindParam(':name', $user_name);	
//$stmt->bindParam(':last_name', $user_lastname);	
//$stmt->bindParam(':age', $user_age);	

$stmt->execute(array(':name' => $user_name, ':last_name' => $user_lastname, ':age' => $user_age));

	echo '<br>';
	echo 'query ok';

?>
