<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$s = "SHOW TABLES";
  $query = ($conn->query($s));
  while($G=$query->fetch_object()){
  
    // print_r($G->Tables_in_table);
  
  $del=$G->Tables_in_table;
 
  $drop="DROP TABLE $del";
  $query_1=($conn->query($drop));
  print_r($query_1);
  }

$table_1="CREATE TABLE users(
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR (50) NOT NULL,
phonenumber INT(20) NOT NULL,
DOB INT(30)NOT NULL,
DOJ INT(10)NOT NULL,
pass_word VARCHAR(10)NOT NULL,
role_u VARCHAR(20)NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_1) === TRUE) {
    // echo "Table users created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 
//   // sql to delete a record
// $sql = "DROP TABLE users";

// if (mysqli_query($da, $sql)) {
//   echo "TABLE deleted successfully";
// } else {
//   echo "Error deleting TABLE: " . mysqli_error($da);
// }
// $table_2 projects
$table_2="CREATE TABLE projects(
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) ,
  des_cription  TEXT(50) ,
  price INT(20) ,
  p_status VARCHAR(50) ,
  in_amount INT(20) ,
  exprie_date INT(20) ,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_2) === TRUE) {
    // echo "Table projects created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 

// $table assignments
  $table_3="CREATE TABLE assignments(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pid INT(50) NOT NULL,
u_id INT(50) NOT NULL,
-- PRIMARY KEY(u_id),
-- FOREIGN KEY(id)REFERENCES projects(id),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_3) === TRUE) {
    // echo "Table assignments created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 

  // $table works
  $table_4="CREATE TABLE works(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pid INT(50) ,
u_id INT(50) NOT NULL,
-- FOREIGN KEY(u_id)REFERENCES assignments(u_id),
start_time INT(20) NOT NULL,
end_time INT(20) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_4) === TRUE) {
    // echo "Table works created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
    $insert="INSERT INTO users (
      firstname,lastname,email,phonenumber,DOB,DOJ,pass_word,role_u	)
VALUES ('admin1','admin1','admin1@gmail.com','123456789','778','96','d5e','kktk')";
if ($conn->query($insert) === TRUE) {
  echo " inserted successfully";
 } else {
  echo "Error inserting values: " . $conn->error;
 }
  // } $conn->close();
// rename("varun.php","team.ppp");
// $file= fopen("index.html","w")or die("unable to open file");
// $txt="already created\n";
// fwrite($file,$txt);

$conn->close();

?>