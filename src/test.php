<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("db", "root", "root", "myapp");

//$result = $mysqli->query("SELECT * FROM Users");

$connect = new PDO('mysql:host=localhost;dbname=db', $this->user, $this->pwd);
$query = "SELECT * FROM Users";

$connect->prepare($query)->execute();
printf("Запрос SELECT вернул %d строк.\n", $result->num_rows);

?>