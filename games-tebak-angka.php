<html>
    <body>
        <h1>Games Tebak Angka</h1>
        <form method="POST" action="games-tebak-angka.php">
            masukkan angka : <input type="text" name="tebakan">
            <input type ="submit" value="submit" name="submit">
        </form>
    <?php
    session_start();

    if (empty($_SESSION['bilangan'])){
    $_SESSION['bilangan'] = rand(1,100);
    }

    if (isset($_POST['submit'])){
        if ($_POST['tebakan'] < $_SESSION['bilangan']){
            echo "Tebakan terlalu rendah.";
        }
        else if ($_POST['tebakan'] > $_SESSION['bilangan']){
            echo "Tebakan terlalu tinggi.";
        }
        else {
            echo "Tebakan anda benar";
            session_destroy();
            echo "<a href='games-tebak-angka.php'> Main Lagi Yuk</a>";
            exit();
        }
    }
    
    ?>
    
    </body>
</html>