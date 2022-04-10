<html>
    <head>
        <title>Function PHP</title>
        <style type="text/css">
            .style1{background-color: black; color: white;}
            .style2{background-color: white; color: black;}
        </style>
    </head>
    <body>
        <?php
        function buatkotak($baris, $kolom){
            $num=1;
            echo "<table border ='1'>";
            for ($i=1; $i<=$baris; $i++){
                echo "<tr>";
                for ($j=1; $j<=$kolom; $j++){
                    if ($num % 2 == 0){
                        $style = "style1";
                    }
                    else
                        $style = "style2";
                echo "<td class='".$style."'>";
                echo $num;
                echo "</td>";
                $num++;
            }
                echo '</tr>';
            }
            echo "</table>";
        }
        ?>
    </body>
</html>