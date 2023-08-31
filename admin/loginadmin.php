<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION["login"])){
  header("Location: home.php");
}
require "../utility/db_connect.php";
require "functions.php";
if(isset($_POST['login'])){
  global $pdo;
  $nrp = strtolower($_POST['nrp_admin']);
  $pw = $_POST['password'];
  $imap       = false;
  $host       = 'john.petra.ac.id';
  $port       = 110;
  $timeout    = 30;
  $fp         = fsockopen($host, $port, $errno, $errstr, $timeout);
  $errstr     = fgets($fp);

if (substr($errstr, 0, 1) == '+') 
{
    fputs($fp, "USER ".$nrp."\n");
    $errstr = fgets($fp);

    if (substr($errstr, 0, 1) == '+') 
    {
        fputs($fp, "PASS ".$pw."\n");
        $errstr = fgets($fp);

        if (substr($errstr, 0, 1) == '+') 
        {
            $imap = true;
        }
    }
}


    if ($imap)
    {
    $sql = "SELECT * FROM admin WHERE nrp = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([strtoupper($nrp)]);
    if($stmt->rowCount() <= 0)
            {
                $error1 = 1;
            }else{
              $nrp = strtoupper($_POST["nrp_admin"]);
              $mhs = query("SELECT * FROM admin WHERE nrp LIKE '$nrp'")[0];
              $_SESSION['lk_admin'] = $mhs["id_lk"];
              $_SESSION['ukm_admin'] = $mhs["id_ukm"];
              $_SESSION['nrp_admin'] = $_POST["nrp_admin"];
              $_SESSION["login"]= true;
              if($mhs['id_lk']!==0){
                header("Location: add_lk.php");
		exit();
              }
              if($mhs['id_ukm']!==0){
                header("Location: add_ukm.php");
		exit();

              }
              header("Location: home.php");
		exit();

            }   
    }else{
        $error = 1;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo-oh2022.png">
  <title>Admin Open House 2022</title>
  <!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180" href="../asset/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../asset/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../asset/favico/favicon-16x16.png">
    <link rel="manifest" href="../asset/favico/site.webmanifest">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js" integrity="sha256-vT8KVe2aOKsyiBKdiRX86DMsBQJnFvw3d4EEp/KRhUE=" crossorigin="anonymous"></script>
    <!-- jquery confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</head>
<?php
// if (isset($_GET['status'])) {
//     if ($_GET['status'] == 0) {
//         echo '<script>window.history.pushState("","","./index.php");$.alert("<span><center><b>Mohon maaf, terjadi kesalahan di server. Silakan coba ulangi kembali.</b></center></span>");</script>';
//     } else if ($_GET['status'] == 1) {
//         echo '<script>window.history.pushState("","","./index.php");$.alert("<span><center><b>Captcha gagal! Silakan coba ulangi kembali.</b></center></span>");</script>';
//     } else if ($_GET['status'] == 2) {
//         echo '<script>window.history.pushState("","","./index.php");$.alert("<span><center><b>Password atau username Anda salah! Silakan coba kembali.</b></center></span>");</script>';
//     } else if ($_GET['status'] == 3) {
//       echo '<script>window.history.pushState("","","./index.php");$.alert("<span><center><b>Mohon maaf, Anda tidak terdaftar sebagai Admin Open House 2021!</b></center></span>");</script>';
//     }
// }
?>
<body>
  <style>
    @font-face {
      font-family:NugoSans;
      src: url(../asset/fonts/nugo_sans/NugoSans-Light.ttf);
    }
    body {
      display: flex;
      margin: 0;
      padding: 0;
      justify-content: center;
      align-items: center;
      background:url(../asset/bg-cm.png) ;
      color: black;
      font-family: NugoSans, sans-serif;
    }

    .form-group {
      margin-top:1rem;
    }
    .form-control {
      background-color: #e9ecef;
      border-radius: 10px;
      font-weight: 600;
      width: 270px;
      color: black !important;
    }
    .form-control:hover {
      background-color: #9ed5dc;
      transition: 0.2s;
    }
    input[type="text"], input[type="password"] {
      background-color: #fff !important;
    }
    label {
      color: black;
    }
    #header {
      margin-top:5vh;
    }
    .btn {
      border-radius: 50px;
      background-color: #B2BD7F!important;
      font-weight: 800 !important;
      letter-spacing : 2px;
      width: 200px;
      display: flex;
      align-items: center;
      justify-content:center;

    }
    .btn:hover {
      background-color: #E0C4A3 !important;

    }
    .jumbotron {
      background-color:  #681551ab;
      border-radius: 10px;
    }
    .icon-explain {
      color:white;
      font-weight: bold;
      font-size: 11pt;
      padding: 1vh 0;
    }

    #logo-admin {
      width: 150px;
      height: auto;
      border-radius: 100px;
    }

    @media screen and (max-width: 768px) {
        #logo-admin {
        width: 100px;
        margin-bottom: 30px;
      }
    }

  </style>
  <div id="wrapper">
    <div class="container justify-content-center text-center" id="header">
			<a href="https://www.instagram.com/ohpetra2022/" target="_blank"><img src="logo-oh2022.png" id="logo-admin" alt="Open House 2021"></a>
			<h1 class="font-weight-bold" style="text-align: center;padding-top:1vw;">ADMIN SITE</h1>
			<h2 class="font-weight-normal" style="text-align: center;">OPEN HOUSE 2022</h2>
		</div>
    <div class="container-loginpage d-flex justify-content-center">
      <div class="jumbotron mb-auto pt-5 px-3">
        <form action="" method="POST">
        <span class="icon-explain">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            NRP
          </span>
        <div class="form-group">
         
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NRP" name="nrp_admin" required>
        </div>
        <div style="padding-bottom:2vh;">
						<small><span style="color: gray;">Ex: c14190001</span></small>
					</div>
          <span class="icon-explain">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>  
            PASSWORD SIM
          </span>
        <div class="form-group">
          
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="PASSWORD" name="password" required>
        </div>
        <input type="hidden" id="token" name="token">
        <button type="submit" class="btn container-fluid" style="margin-top:5vh;color:white;" name="login">LOGIN</button>
        <?php
        if(isset($error)) : ?>
        <p style = "color:red; font-style: italic; font-size:15px;  margin-top: 3vh; text-align:center;">nrp/password salah</p>
        <?php endif;?>
        <?php
        if(isset($error1)) : ?>
        <p style = "color:red; font-style: italic; font-size:15px;  margin-top: 3vh; text-align:center;">nrp/password salah</p>
        <?php endif;?>
      </form>
      </div>
    </div>
    <div class="container justify-content-center text-center" style="font-weight:500;margin-top:1vh;">BY IT DIVISION OPEN HOUSE 2022</div>
  </div>
</body>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('6Lfp8ZEbAAAAADaYhqdGLVoe83dtQ9cSRy-R0Tt_', {
      action: 'homepage'
    }).then(function(token) {
      // console.log(token);
      document.getElementById("token").value = token;
    });
  });

  var keyframe = anime.timeline({});
  keyframe.add({
    targets: '.ml5 .line',
    opacity: [0.5, 1],
    scaleX: [0, 1],
    easing: "easeInOutExpo",
    duration: 700
  }).add({
    targets: '.ml5 .line',
    duration: 600,
    easing: "easeOutExpo",
    translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
  }).add({
    targets: '.ml5 .ampersand',
    opacity: [0, 1],
    scaleY: [0.5, 1],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=600'
  }).add({
    targets: '.ml5 .letters-left',
    opacity: [0, 1],
    translateX: ["0.5em", 0],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=300'
  }).add({
    targets: '.ml5 .letters-right',
    opacity: [0, 1],
    translateX: ["-0.5em", 0],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=600'
  })

  keyframe.add({
    targets: '.line1',
    translateX: [0, "1000px"],
    translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em",
    duration: 1000,
    easing: "linear",
  }).add({
    targets: '.line2',
    translateX: [0, "-1000px"],
    translateY: (el, i) => (-(-0.625 + 0.625 * 2 * i)) + "em",
    duration: 1000,
    offset: '-=1000',
    easing: "linear",
  })
</script>

</html>