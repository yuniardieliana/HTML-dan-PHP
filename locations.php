<html>

<title>Add Location</title>

<head>
    <style>

</style>

</head>


<body>
    <h2>Add Location</h2>
    <form method="post" action="locations.php">
        Location  : <input type="text" name="location"> 
        Latitude  : <input type="text" name="latitude"> 
        Longitude : <input type="text" name="longitude"> 
    <input type="submit" value="Add Data" name="AddData">
    </form>
    
    
    <?php
    if (isset($_POST['AddData'])){
        $file=fopen("locations.csv","a");
        rewind($file);
        $location= $_POST['location'];
        $latitude= $_POST['latitude'];
        $longitude= $_POST['longitude'];
        $format = "\n".$location.",\"".$latitude.",".$longitude."\"";
        $file=fopen("locations.csv","a");
        fwrite($file,$format);
        fclose($file);
    }
    ?>


    <?php
    

    function distance($x1, $x2, $y1, $y2){
        return sqrt(pow(($x2-$x1),2)+pow(($y2-$y1),2));
    }
    
    $datalokasi = array();

    $i = 0;
    $my_file=fopen("locations.csv","r");
    while(!feof($my_file)){
        $my_data=fgets($my_file); //memisahkan dg karakter lain
        $str = explode(",", $my_data);
        if($i==0){
            $i++; //diberi increment supaya data tidak bernilai 0 saja
            continue;
        }

        $location = $str[0];
        $latitude = str_replace('"',"",$str[1]);
        $longitude = str_replace('"',"",$str[2]);
        $distance = distance(-7.56526,(float)$latitude,110.81423,(float)$longitude);
        /*
        $arraydata=(
            array("location"=>$location,"lattitude"=>$latitude, "longitude"=>$longitude)
        );
        */
        //membentuk data array
        $data = array("location"=>$location,"latitude"=>$latitude, "longitude"=>$longitude,"distance"=>$distance);

        //tambahan ke array datalokasi
        array_push($datalokasi, $data);
    
        $i++;
    }
    
    $coldistance = array_column($datalokasi, 'distance');

    //sort datalokasi berdasarkan jarak asc
    array_multisort($coldistance, SORT_ASC , $datalokasi);

        echo "<tr>
        <td>".$location."</td>
        <td>".$latitude."</td>
        <td>".$longitude."</td>
        <td>".$distance."</td>
        </tr>";
        //$i++;

    fclose($my_file);
    ?>

<table border "1">;
    <tr>
        <th>".location."</th>
        <th>".latitude."</th>
        <th>".longitude."</th>
        <th>".distance."</th>
    </tr>";

    <?php
    foreach($datalokasi as $row){
        echo "<tr>
        <td>".$row['location']."</td>
        <td>".$row['latitude']."</td>
        <td>".$row['longitude']."</td>
        <td>".$row['distance']."</td>
        </tr>";
    }
    ?>

</table>
</body>
</html>