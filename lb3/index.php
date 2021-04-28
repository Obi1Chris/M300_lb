<?php
$host = 'db'; // service name from Obi's docker-compose.yml
$user = 'Obisql';
$password = 'obipass123';
$db = 'Obi_test_db';

$conn = new mysqli($host,$user,$password,$db);
if($conn->connect_error){
    echo 'connection failed' . $conn->connect_error;
}
echo 'successfully connected to Obi`s MYSQL';

?>

