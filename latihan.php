<html>
    <head>
        <title>Latihan</title>
        <style type "text/css">
            .style1 {background-color: black; color:white;}
            .style1 {background-color: black; color:white;}
        </style>
    </head>
    <body>

        <?php
        // langsung menentukan baris dan kolom tanpa menggunakan function
        //$baris = 15
        //$kolom = 15
        //Function untuk memanggil beberapa jumlah kotak
        function buatkotak($baris, $kolom){

        $num = 1;

        echo "<table border = '1'>";
        for ($x = 1; $x <= $baris; $x++) {
            
            //membuat baris
            echo "<tr>";
            for ($y = 1; $y <= $kolom; $y++) {
                
                //membuat kolom dan menentukan style ganjil or genap
                if ($num%2==0){
                    $style = "style1";
                }
                else {
                    $style = "style2";
                }
                echo "<td class ='".$style."'>";
                echo $num;
                echo "</td>";
                $num++;
            }
            echo "</tr>";
        }
        echo "</table>";
        }
        buatkotak(15,15);

        //mengukur running time script dg microtime
        $awal = microtime(true);
        $akhir = microtime(true);
        $lama = $akhir - $awal;
        echo "Lama eksekusi script adalah: ".$lama." microsecond";
        ?>


    </body>
</html>