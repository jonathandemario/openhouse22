<?php
require "../utility/db_connect.php";
require "../admin/functions.php";

$ukm = query("SELECT * FROM ukm");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM</title>
    
    <link rel="stylesheet" href="ukm&lk.css"/>

   

    <script src="ukm&lk.js"></script>
    <link rel="icon" href="../admin/logo-oh2022.png">
    
</head>
<body style="background-image: url(img/bg\ ukm.png);">
<div id = "main" class="wrapper"  >
        <div class="backpage">
             <a href="../home.php"><img src="img/arrow.png"></a>
        </div>
        <div class="title">
           
            <h1>UNIT KEGIATAN MAHASISWA</h1>
            <div class="tema">
               <h2>Shining Pearl</h2>
                <p>Mahasiswa baru dalam pencarian dan penonjolan jati diri mereka melalui UKM yang mereka pilih dengan hal ini diharapkan mahasiswa baru pada akhirnya dapat melalui banyaknya tantangan yang mereka hadapi dan memancarkan versi diri mereka yang paling bersinar sesuai dengan tema “Shining Pearl”. Melalui space UKM ini juga bertujuan untuk mempertegas keraguan dari potensi yang mereka miliki.</p>
            </div>
        </div>
    
    <div class="container">
        <?php 
        foreach($ukm as $row) : 
        ?>
            <div class="icon" onclick="bukapopupUKM(<?=$row['id']?>);">
                <div class="name_label">
                    <img src="img/name-tag.png">
                    <div class="text"><h6><?=$row["nama"]?></h6></div>
                </div>
                 <div class="logo">
                    <img src="img/icon.png">
                    <img src="../asset/logoUKM/<?=$row["logo"]?>" class="logo" >
                </div>
                
            </div>
        <?php endforeach;?>  
        </div>  
    </div>
    <div id = "popup" class="popup">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</body>

</html>




