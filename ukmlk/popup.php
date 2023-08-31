<?php
require "../admin/functions.php";
require "../utility/db_connect.php";
$id = $_GET['id'];
$lkm = query("SELECT * FROM lk where id = $id")[0];
?>
<div class="popup_box">
        <div class="close-btn"><a href="#" onclick="closepopup();">&times;</a></div>
        <div class="isi">

            <div class="judul">
                <h5><?= $lkm["nama"]?></h5>
            </div>

            <?php 
                if($lkm["poster"]!== " ") : ?>
                    <div class="poster">
                    <img src="../asset/poster/<?=$lkm["poster"];?>">
                    </div>
            <?php endif;?>

            <div class="visi">
                <h4>Visi</h4>
                <p><?=$lkm["visi"]?></p>
            </div>

            <div class="misi">
                <h4>Misi</h4>
                <p><?=$lkm["misi"]?></p>
            </div>

            <div class="desc">
                <h4>Deskripsi</h4>
                <p><?=$lkm["deskripsi"]?></p>
            </div>

            <div class="cp">
                <h4>Contact Person</h4>
                <p><?=$lkm["contact_person"]?></p>
            </div>

 
            <?php 
                if($lkm["link_pendaftaran"]!== "") : ?>
                <div class="link pendaftaran">
                    <h4>Link Pendaftaran</h4>
                    <p><?=$lkm["link_pendaftaran"]?></p>
                </div>
            <?php endif;?>
  


            <?php 
                if($lkm["video"]!== "") : ?>
                <div class="Link Video">
                    <h4>Link Video</h4>
                    <h4><?=$lkm["video"]?></h4>
                    <p></p>
                </div>
            <?php endif;?>

            <?php 
                $kuota = $lkm["kuota"];
                if($kuota!== 0) : ?>
                <div class="Kuota">
                    <h4>Kuota</h4>
                    <p><?=$lkm["kuota"]?></p>
                </div> 
            <?php endif;?>   
            

            <?php 
                if($lkm["video"]!== "") : ?>
                <div class="video">
                    <iframe src="<?=$lkm["video"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; clipboard-white; picture-in-picture" allowfullscreen>...</iframe>
                </div>
            <?php endif;?>
                
        </div> 
    </div> 
