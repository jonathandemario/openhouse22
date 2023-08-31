<?php
require "../utility/db_connect.php";
require "../admin/functions.php";

$lk = query("SELECT * FROM lk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaga Kemahasiswaan</title>
    
    <link rel="stylesheet" href="ukm&lk.css"/>
    <link rel="icon" href="../admin/logo-oh2022.png">

    
    <script src="ukm&lk.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body style="background-image: url(img/bg\ lk.png);">
<div id = "main"  >
        <div class="backpage">
             <a href="../home.php" ><img src="img/arrow.png"></a>
        </div>
        <div class="title">
            <h1>LEMBAGA KEMAHASISWAAN</h1>
            <div class="tema">
                <h2>The Heart of Eternity</h2>
                <p>Melalui Space LK ini, mahasiswa baru diharapkan untuk menjadi pribadi yang langka, memiliki keunikan tersendiri, memiliki hati yang tulus untuk melayani dan tentunya menjadi pribadi yang memiliki value yang tinggi.</p>
            </div>
        </div>
    
    <div class="container">
        <?php 
        foreach($lk as $row) : 
        ?>
            <div class="icon" onclick="bukapopup(<?=$row['id']?>);">
                <div class="name_label">
                    <img src="img/name-tag.png">
                    <div class="text"><h6><?=$row["nama"]?></h6></div>
                </div>
                <img src="../asset/logo/<?=$row["logo"]?>" class="logo" >
            </div>
        <?php endforeach;?>  
        </div>  
    </div>
    <div id = "popup" class="popup">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</body>
</html>




