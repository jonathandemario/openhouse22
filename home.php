<?php
header('location: ../2023/pendaftaran/coming_soon.php');
$_SESSION["page"]="home";
require_once "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">/   -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPEN HOUSE 2022</title>
    <link rel="stylesheet" href="style.css">
    <link rel="import" href="./NAVBAR NEW/loginbar.html">
    <link rel="import" href="./NAVBAR NEW/logoutbar.html">
    
</head>
<body>
<div class="wrapper">
  <div class="panah">
    <img src="img\clickme.png" alt="">
  </div>
  <div class="line-container">
    <img src="img\SATUSETBUNGA copy.png" alt="" class="full-bunga">
    <div class="kuncilk">
      <a href="ukmlk/lk.php">
        <img src="img\kuncilk1.png" alt="">
      </a>
    </div>
    <div class="kunciukm">
      <a href="ukmlk/ukm.php">
        <img src="img\kunciukm1.png" alt="">
      </a>
    </div>
  </div>  
    <section class="home">
      <div class="container">
        <img src="./img/kelopak1.svg" id="kelopak1">
        <img src="./img/kelopak2.svg" id="kelopak2">
        <div class="kupu2">
          <svg id="kupu" width="1250" height="800" viewBox="0 -500 5208 3333">
          </svg>
        </div>
        <img src="./img/awan.svg" id="awan">
        
        <h2 class="buka" id="judul" onclick="openPopup()">Flourish <br>Your Potential</h2>
        <div class="popup-container" id="popupJudul">
          <div class="popupJudul">
            <h3>OPEN HOUSE 2022</h3>
            <p>Mahasiswa mampu menggali serta melakukan perkembangan terhadap bakat dan minat yang mereka miliki. Tidak hanya itu, dengan tujuan untuk mengembangkan bakat dan minat diharapkan melalui Open House 2022 ini kami dapat menstimulasi adanya pendalaman dan memperjelas bakat dan minat dari setiap individu.</p>
            <a type="button" class="tutup" onclick="closePopup()">Tutup</a>
          </div>
        </div>
      </div>
    </section>

    <section class="invitation">
      <div class="container">
        <!-- <div class="timeline">
          <h3>Timeline</h3>
        </div> -->
        <div class="text-box">
          <h3>Timeline</h3>
          <p>Jumat, 29 Juli 2022<br>07:00 WIB - Selesai</p>
        </div>
      </div>
    </section>

    <section class="lk-ukm">
      <div class="gembok container">
        <!-- <div class="kuncilk">
          <a href="https://www.youtube.com/">
            <svg width="250" height="450" viewBox="0 0 283 482">
            </svg>
          </a>
        </div>
        <div class="kunciukm">
          <a href="#">
            <svg width="250" height="450" viewBox="0 0 283 482">
            </svg>
           </a>
         </div> -->
      </div>
    </section>
    <section class="contact">
      <div class="kontak space container">
        <div class="contact-us">
          <h1>Contact Us</h1>
        </div>
        <div class="contact-items">
          <a target="_blank" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=736bnmte" class="contact-item">
            <!-- <div class="contact-item"> -->
              <div class="contact-info">
                <h1>Line@</h1>
                <h2>@736bnmte</h2>
              </div>            
            <!-- </div> -->
          </a>
          <a target="_blank" href="https://instagram.com/ohpetra2022" class="contact-item">
            <!-- <div class="contact-item"> -->
              <div class="contact-info">
                <h1>Instagram</h1>
                <h2>@ohpetra2022</h2> 
              </div>
            <!-- </div> -->
          </a>
          <a target="_blank" href="https://goo.gl/maps/Qr81H8uTn1JHBEyV7" class="contact-item">
            <!-- <div class="contact-item"> -->
              <div class="contact-info">
                <h1>Lokasi</h1>
                <h2>Gedung Q</h2>
                <h3>Jl. Siwalankerto 142-144</h3>
                <h3>Surabaya</h3>
              </div>            
            <!-- </div> -->
          </a>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="space container">
        <p>© IT DIVISION OPEN HOUSE 2022</p>
        <p>PETRA CHRISTIAN UNIVERSITY</p>
      </div>
    </section>
    </div>


    <script>
        let kelopak1 = document.getElementById('kelopak1');
        let kelopak2 = document.getElementById('kelopak2');
        let kupu = document.getElementById('kupu');
        let awan = document.getElementById('awan');

        window.addEventListener('scroll', function() {
            let value = window.scrollY;
            kelopak1.style.top = 80 + value*0.1 + 'px';
            kelopak2.style.top = 10 + value*0.05 + 'px';
            kelopak2.style.marginLeft = value*-0.03 + 'px';
            kupu.style.marginLeft = value*1.2 + 'px';
            kupu.style.marginTop = value*-0.4 + 'px';
            awan.style.marginLeft = value*0.5 + 'px';
            awan.style.top = awan.top + value*0.05 + 'px';
        });

        let popupJudul = document.getElementById("popupJudul");

        function openPopup() {
            popupJudul.classList.add("open-popup");
            overlay.style.overflow = "hidden";
        }
        function closePopup() {
            popupJudul.classList.remove("open-popup");
            overlay.style.overflow = "visible";
        }
    </script>

</body>

<script>
    //untuk memunculkan setelah loading page
    const container = document.querySelector(".wrapper")
    const overlay = document.querySelector("body");

    function containerMuncul() {
        setTimeout(() => {
            setTimeout(() => (wrapper.style.display = "flex"), 60);
            container.style.visibility = "visible";
            overlay.style.overflow = "visible";
        }, 6500);
    }

    containerMuncul();
</script>

<script>
    window.onload = function() {
      location.href = "#";
    }
</script>
</html>