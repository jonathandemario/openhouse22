<?php
require "../utility/db_connect.php";
require "../trial/functions.php";
$ukm = query("SELECT * FROM ukm");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaga Kemahasiswaan</title>
    
    <link rel="stylesheet" href="ukm&lk.css"/>

    <!-- <style>
        body{
          background-image: url('img/1.png') ;
          /* background-color: black; */
          background: cover;
        }
    </style> -->

    <script src="ukm&lk.js"></script>
    
</head>
<body style="background-image: url(img/bg\ ukm.png);">
<div id = "main"  >
        <div class="title">
            <h1>UNIT KEGIATAN MAHASISWA</h1>
            <div class="tema">
                <h2>TEMA UKM</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod labore eos odio maxime assumenda ullam provident praesentium culpa aliquid, odit iste qui fugiat deleniti, magnam quos corporis sit vero. Repellendus!</p>
            </div>
        </div>
    
    <div class="container">
        <?php 
        foreach($ukm as $row) : 
        ?>
            <div class="icon" onclick="bukapopupUKM(<?=$row['id']?>);">
                <div class="name_label">
                    <img src="img/name-tag.png">
                    <div class="text"><p><?=$row["nama"]?></p></div>
                </div>
                <img src="../asset/logoUKM/<?=$row["logo"]?>" class="logo" >
            </div>
        <?php endforeach;?>  
        </div>  
    </div>
    <div id = "popup" class="popup">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</body>
</html>




