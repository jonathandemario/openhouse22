<?php
require "../admin/functions.php";
require "../utility/db_connect.php";
$id = $_GET['id'];
$ukmd = query("SELECT * FROM ukm where id = $id")[0];
?>
<div class="popup_box">
        <div class="close-btn"><a href="#" onclick="closepopup();">&times;</a></div>
        <div class="isi">

            <div class="judul">
                <h5><?= $ukmd["nama"]?></h5>
            </div>
	
            <?php 
                if($ukmd["poster"]!== " " && $ukmd["poster"]!=="") : ?>
                    <div class="poster">
                    <img src="../asset/posterUKM/<?=$ukmd["poster"];?>">
                    </div>
            <?php endif;?>

            


            <div class="visi">
                <h4>Visi</h4>
                <p><?=$ukmd["visi"]?></p>
            </div>

            <div class="misi">
                <h4>Misi</h4>
                <p><?=$ukmd["misi"]?></p>
            </div>

            <div class="desc">
                <h4>Deskripsi</h4>
                <p><?=$ukmd["deskripsi"]?></p>
            </div>

            <div class="cp">
                <h4>Contact Person</h4>
                <p><?=$ukmd["contact_person"]?></p>
            </div>

            <?php 
                if($ukmd["link_daftar"]!== "") : ?>
                <div class="link pendaftaran">
                    <h4>Link Pendaftaran</h4>
                    <p><?=$ukmd["link_daftar"]?></p>
                </div>
            <?php endif;?>

            <?php 
                if($ukmd["video"]!== "") : ?>
                <div class="Link Video">
                    <h4>Link Video</h4>
                    <h4><?=$ukmd["video"]?></h4>
                    <p></p>
                </div>
            <?php endif;?>

            <?php 
                $kuota = $ukmd["kuota"];
                if($kuota!== 0) : ?>
                <div class="Kuota">
                    <h4>Kuota</h4>
                    <p><?=$ukmd["kuota"]?></p>
                </div> 
            <?php endif;?>   
            
            <?php 
                if($ukdm["video"]!== " ") : ?>
                <div class="video">
                    <iframe src="<?=$ukmd["video"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; clipboard-white; picture-in-picture" allowfullscreen>...</iframe>
                </div>
            <?php endif;?>    
        </div> 
    </div>