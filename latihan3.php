<?php
include 'kotak-latihan3.php';
$myfile = fopen("latihan3.txt", "r");
while (!feof($myfile)){
$mydata = fgets($myfile);
$res = explode(" | ",$mydata);
print_r($res);
buatkotak($res[0],$res[1]);
}
fclose($myfile);
?>