<?php
setcookie('nama','nama',time()+(60*60*24*30),'/');
?>
<html>
    <body>
        
        <form method="POST" action="cookie-index.php">
            Masukkan nama anda <input type="text" name="username">
            <input type="submit" value="submit" name="submit">
        </form>

    <?php
    if (!isset($_POST['submit'])){
        $username = ($_POST["username"]); //baca username dari form
        $tanggal = date("d/m/Y H:i:s"); //baca taggal pada saat itu
        $counter = 1; //set counter = 1
        
        //simpan username, tgl, counter ke cookie
        setcookie("username", $username, time()+3*30*24*60*60, '/');
        setcookie("tanggal", $tanggal, time()+3*30*24*60*60, '/');
        setcookie("counter", $counter, time()+3*30*24*60*60, '/');

        //echo kunjunga ke-1
        echo "Selamat datang ".$username.".Ini adalah kunjungan anda yang ke-".$counter;

        //header("location : cookie-index.php");
    }
    if (!isset($_COOKIE['nama'])){
        //muncul form
    ?>

    <?php
    
    } else {
        //echo kunjungan ke-2 dst
        if ($_COOKIE['counter']==1){
            echo "Selamat datang ".$_COOKIE.".Ini adalah kunjungan anda yang ke-".$_COOKIE['counter'];
        }
        else {
            echo "Selamat datang ".$_COOKIE.".Ini adalah kunjungan anda yang ke-".$_COOKIE['counter'].
            "Kunjungan anda sebelumnya pada".$_COOKIE['tanggal'];
        }
        //update cookie : counter, tgl kunjungan
        setcookie("counter", $_COOKIE['counter']+1, time()+3*30*24*60*60, '/');
        setcookie("tanggal", $tanggal, time()+3*30*24*60*60, '/');
        setcookie("counter", date("d/m/Y H:i:s"), time()+3*30*24*60*60, '/');
    }

    ?>
    </body>
</html>