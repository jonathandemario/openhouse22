<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$lkn = $_SESSION['lk_admin'];
$ukm = $_SESSION['ukm_admin'];
if($ukm!==0){
    header("Location: ukm.php");
    exit();
}

$num_page = 3;
$jumlah_data = count(query("SELECT * FROM lk"));
$jumlah_halaman = ceil($jumlah_data/$num_page);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($num_page * $halamanAktif) - $num_page;

$lk = query("SELECT * FROM lk LIMIT $awalData,$num_page");
if(isset($_POST["cari"])){
  if($_POST["keyword"] === ''){
    $lk = query("SELECT * FROM lk LIMIT $awalData,$num_page");
  }else{
    $data = $_POST["keyword"];
    $jumlah_data = count(query("SELECT * FROM lk WHERE 
    nama LIKE '%$data%' OR
    deskripsi LIKE '%$data%'"));
    $num_page = 5;
    $jumlah_halaman = ceil($jumlah_data/$num_page);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    $awalData = ($num_page * $halamanAktif) - $num_page;
    $lk = query("SELECT * FROM lk WHERE 
    nama LIKE '%$data%' OR
    deskripsi LIKE '%$data%' LIMIT $awalData,$num_page" );
    
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
    <title>Detail LK</title>
</head>
<style>
 body {
      background:url(../asset/bg-cm.png) ;
      color: black;
      font-family: 'Trebuchet MS', sans-serif;
    }
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
        padding: 35px 30px;
    
    }

    .navbar {
        position: relative !important;
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
<?php if($lkn!==0):?>
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
<div class="p container-sm">
<nav class="navbar navbar-light justify-content-center navbar-expand-lg fs-3 mb-5"  >
    <div class="justify-content-start">
    <img src="logo-oh2022.png" width = 110px height=150px >
    </div>
    Detail LK</nav>

    <div class="container">
        <form action="" method = "post">
        <input type="text" class = "mb-2"name = "keyword" size = 50 autofocus
        placeholder = "Masukkan keyword pencarian "autocomplete = "off">
        <button type = "submit" class = "btn btn-primary mb-3" name ="cari">Search</button>
        </form>


        <table class="table table-hover text-center">
            <thead class = "table-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Kuota</th>
                <th scope="col">Logo</th>
                <?php if($lkn===0):?>
                <th scope="col">Edit</th>
                <?php endif;?>
            </tr>
            <?php 
           foreach($lk as $row) :?>
            </thead>
            <tbody>
            <tr>
                <td style= width:50px;><?=strtoupper($row["nama"])?></td>
                <td class="text-start" style= width:500px;><?=$row["deskripsi"]?></td>

                <td><?=$row["kuota"]?></td>
                <td>
                <img src="../asset/logo/<?=$row["logo"]?>" width = 100px height= 100px>
                </td>
                <?php if($lkn===0):?>
                <td>
                <a href="updatelk.php?id=<?=$row["id"]?>" class = "link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a> |
                <a href="delete_lk.php?id=<?=$row["id"]?>" class = "link-dark"><i class="fa-solid fa-trash"></i></a> |
                </td>
                <?php endif;?>

            </tr>
            <?php 
            endforeach;?>
        </table>
        <?php if($halamanAktif > 1) : ?>
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ;?>">Previous</a>
          </li>
        <?php endif?>

        <?php for ($i = 1; $i<=$jumlah_halaman; $i++) : ?>
            <?php if($i == $halamanAktif) : ?>
              <ul class="pagination">
              <li class="page-item active">
                <a class="page-link" href="?halaman=<?= $i; ?>"><?=$i?> </a>
              </li>
            <?php else : ?>
              <ul class="pagination">
              <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?=$i?></a></li>
            <?php endif;?>
        <?php endfor;?>

        <?php if($halamanAktif < $jumlah_halaman) : ?>
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ;?>">Next</a>
          </li>


        <?php endif?>


        
    </div>  
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>