<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "games";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

//select data
$query = "select * from scores";
$res = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($res)){
    echo $data['Username']."-".$data['Score']."-".$data['Tanggal']."<br>";
}

?>