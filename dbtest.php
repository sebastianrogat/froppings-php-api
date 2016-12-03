<?php
$dbhost = getenv("3306");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("erikagtierrez");
$dbpwd = getenv("eri33vgc66");
$dbname = getenv("froppingsdatabase");
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}
$connection->close();
?>
