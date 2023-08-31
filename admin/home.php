<?php
session_start();
require "functions.php";

$nrp = strtoupper($_SESSION["nrp_admin"]);
$mhs = query("SELECT * FROM admin WHERE nrp LIKE '$nrp'");
$name = $mhs[0]["Nama"];
$lk = $_SESSION['lk_admin'];
$ukm = $_SESSION['ukm_admin'];
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}

$num_page = 5;
$jumlah_data = count(query("SELECT * FROM admin"));
$jumlah_halaman = ceil($jumlah_data/$num_page);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($num_page * $halamanAktif) - $num_page;

$admin = query("SELECT * FROM admin LIMIT $awalData,$num_page");
if(isset($_POST["cari"])){
  if($_POST["keyword"] === ''){
    $admin = query("SELECT * FROM admin LIMIT $awalData,$num_page");
  }else{
    $data = $_POST["keyword"];
    $jumlah_data = count(query("SELECT * FROM lk WHERE 
    nama LIKE '%$data%' OR
    nrp LIKE '%$data%' OR
    id_lk LIKE '%$data%' OR
    id_ukm LIKE '%$data%'"));
    $num_page = 5;
    $jumlah_halaman = ceil($jumlah_data/$num_page);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    $awalData = ($num_page * $halamanAktif) - $num_page;
    $lk = query("SELECT * FROM admin WHERE 
    nama LIKE '%$data%' OR
    nrp LIKE '%$data%' OR
    id_lk LIKE '%$data%' OR
    id_ukm LIKE '%$data%' LIMIT $awalData,$num_page" );
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="logo-oh2022.png">
    <link href="http://fonts.cdnfonts.com/css/poetsen-one" rel="stylesheet"> 
 <link rel="icon" href="logo-oh2022.png">
 <title>Ahoy, <?=$name?>!</title> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" 
 integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" 
 crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
 <style>
    body{
        background-image : url(../asset/bg-cm.png);
    }
  table,td,th{border:1px solid #000}
 #hello{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-weight:700;width:90vw;
 font-size:5vw}
#hello .text-wrapper{position:relative;display:inline-block;padding-top:.2em;padding-right:.05em;padding-bottom:.1em;overflow:hidden}body{color:#000}h2{font-family:'Poetsen One',sans-serif;font-size:8vw}#hello .letter{display:inline-block;line-height:1em}#reach-svg{position:fixed;bottom:30px;right:30px;width:30px}
</style>

</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
        /* -webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}input,textarea{-webkit-user-select:text;-khtml-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}img{-webkit-user-drag:none;-khtml-user-drag:none;-moz-user-drag:none;-o-user-drag:none} */
    }

    /* html {
      scroll-behavior: smooth;
    } */
    

    .content {
        max-width: 2000px;
        margin: auto;
        padding: 11px 30px;
            padding-left:13px;

    }

    .navbar {
        position: fixed !important;
        z-index: 5;
        width: 100%;
        padding: -20px 0;

        display: flex;
        /* background: red; */
    }

    .logo {
        display: inline-flexbox;
        float: left;
    }

    .logo img {
        width: 50px;
	margin-top:-43px;
    }

    .nav-menu li a {
        color: white;
        font-size: 14px;
        font-weight: 500;
        margin-left: 24px;
        text-decoration: none;
        transition: 0.3s;
    }

    .nav-menu li a:hover {
        color: rgba(73,16,70,255);
    }

    .navbar .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-menu {
        margin-top: -30px;
        margin-right: 25px;
        padding-top: 1px;
        padding-right: 50px;
        float: right;
        background-color: rgba(106,115,62,255);
        border-radius: 25px;
        width: 850px;
        height: 37px;
    }

    .navbar .nav-menu {
        display: inline-flex;
    }

    .nav-menu li {
        list-style: none;
    }

    .icon {
        color: white;
        font-size: 22px;
        cursor: pointer;
        display: none;
    }

    .icon:hover {
        color: rgba(73,16,70,255);
    }

    .icons {
        margin-top: 10px;
        margin-right: 35px;
        padding-top: 15px;
        padding-right: 50px;
        float: right;
        background-color: rgba(106,115,62,255);
        border-radius: 10px;
        width: 0px;
        height: 50px;
        display: none;
    }

    .icon.menu-btn {
        margin-top: -5px;
        margin-left: 15px;
    }

    .icon.cancel-btn {
        position: absolute;
        right: 30px;
        top: 20px;

    }

    @media (max-width: 868px) {
        body.disabledScroll {
            overflow: hidden;
        }

        .icons {
            display: block;
        }

        .icon {
            display: block;
        }

        .icon.hide {
            display: none;
        }

        .icons.hide {
            display: none;
            transition: 0.3s;
        }

        .navbar .nav-menu {
            position: fixed;
            top: 0;
            left: -100%;
            height: 100vh;
            width: 100%;
            background: rgba(106,115,62,255);
            max-width: 400px;
            display: block;
            padding: 40px 0;
            text-align: center;
            transition: 0.3s;
        }

        .navbar .nav-menu.active {
            left: 0;

        }

        .navbar .nav-menu li {
            margin-top: 45px;
        }

        .nav-menu li a {
            font-size: 20px;
            font-weight: 600;
        }
        .nav-menu li a:hover {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-menu {
            margin-top: 0;
            margin-right: 25px;
            padding-top: 15px;
            padding-right: 50px;
            float: right;
            background-color: rgba(106,115,62,255);
            border-radius: 0;
            width: 500px;
            height: 50px;
            opacity: 0.75;
        }
    }

</style>
<body>
<?php if($lk!==0):?>
<nav class="navbar" id="content">
        <div class="content">
            <div class="logo">
                <a href="https://www.instagram.com/ohpetra2022/" target="_blank">
                    <img src="..\asset\LOGO OH COLORED.png" alt="">
                    <!-- OH PETRA 2022 -->
                </a>
            </div>
            <ul class="nav-menu">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="lk.php">LK</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>

            </ul>
            <ul class="icons">
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </ul>
        </div>
    </nav>

<?php elseif($ukm!==0) : ?>
 <nav class="navbar" id="content">
        <div class="content">
            <div class="logo">
                <a href="https://www.instagram.com/ohpetra2022/" target="_blank">
                    <img src="..\asset\LOGO OH COLORED.png" alt="">
                    <!-- OH PETRA 2022 -->
                </a>
            </div>
            <ul class="nav-menu">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="ukm.php">UKM</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>

            </ul>
            <ul class="icons">
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </ul>
        </div>
    </nav>

<?php else : ?>
<nav class="navbar" id="content">
        <div class="content">
            <div class="logo">
                <a href="https://www.instagram.com/ohpetra2022/" target="_blank">
                    <img src="..\asset\LOGO OH COLORED.png" alt="">
                    <!-- OH PETRA 2022 -->
                </a>
            </div>
            <ul class="nav-menu">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="ukm.php">UKM</a></li>
                <li class="nav-item"><a class="nav-link" href="lk.php">LK</a></li>
                <li class="nav-item"><a class="nav-link" href="add_ukm.php">Registrasi UKM</a></li>
                <li class="nav-item"><a class="nav-link" href="add_lk.php">Registrasi LK</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>

            </ul>
            <ul class="icons">
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </ul>
        </div>
    </nav>
<?php endif;?>
<div class="container mx-auto justify-content-center mt-4"> <h2 class="text-center" id="hello"> <span class="text-wrapper"> <span class="letters">Ahoy,  <?=$name?>!</span> </span> </h2> <div class="reach-container"><a href="http://bem.petra.ac.id/reach/" target="_blank"><img src="../asset/admin/bunga.svg" alt="REACH" data-bs-toggle='tooltip' data-bs-placement='left' title='Isi cv dulu biar hitz' id="reach-svg"></a></div></div><script>var textWrapper=document.querySelector("#hello .letters");textWrapper.innerHTML=textWrapper.textContent.replace(/\S/g,"<span class='letter'>$&</span>"),anime.timeline({loop:!0}).add({targets:"#hello .letter",translateY:["1.1em",0],translateZ:0,duration:750,delay:(t,e)=>50*e}).add({targets:"#hello",opacity:0,duration:1e3,easing:"easeOutExpo",delay:1e3});var tooltipTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')),tooltipList=tooltipTriggerList.map(function(t){return new bootstrap.Tooltip(t)});AOS.init(); </script></body></html>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
<script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menu = document.querySelector(".nav-menu");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        const btnBorder = document.querySelector(".icons");
        menuBtn.onclick = ()=>{
            menu.classList.add("active");
            menuBtn.classList.add("hide");
            btnBorder.classList.add("hide");
            body.classList.add("disabledScroll");
        }
        cancelBtn.onclick = ()=>{
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
            btnBorder.classList.remove("hide");
            body.classList.remove("disabledScroll");
        }

        window.onscroll = ()=>{
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>
</body>
</html>