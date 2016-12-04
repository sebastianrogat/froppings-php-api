<?php
$dbhost = getenv("127.0.0.1");
$dbport = getenv("3306");
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
