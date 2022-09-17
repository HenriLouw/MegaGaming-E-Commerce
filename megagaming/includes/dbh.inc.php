<!-- HENRI LOUW ZDV351JB3 
The code below establishes a connection with the database and I create
a variable $conn that i can recall in other pieces of code to connect to the database -->
<?php 

$serverName = "localhost";
$dBusername = "root";
$dBPassword = "";
$dBname = "megagamingdb";

$conn = mysqli_connect($serverName, $dBusername, $dBPassword, $dBname);

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}


