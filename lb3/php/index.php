<?php
$host = 'db'; // service name from Obi's docker-compose.yml
$user = 'Obisql';
$password = 'obipass123';
$db = 'Obi_test_db';

// create connection
$conn = new mysqli($host,$user,$password,$db);
// check connection
if($conn->connect_error){
    echo 'connection failed' . $conn->connect_error;
}
echo 'successfully connected to Obi`s MYSQL';
<break>

// sql to create table
$sql = "CREATE TABLE register (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    gender CHAR(1) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneCode INT NOT NULL,
    phone BIGINT NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table Register created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();

?>



