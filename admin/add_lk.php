<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$lk = $_SESSION['lk_admin'];
$ukm = $_SESSION['ukm_admin'];
if($ukm!==0){
    header("Location: ukm.php");
    exit();
}
if($lk!==0){
    $count = count(query("SELECT * FROM lk WHERE id = $lk"));
    if($count>0){
        echo "
        <script>
            alert ('LK anda sudah terdaftar!!');
            document.location.href = 'lk.php';    
        </script>";
    }
}
if(isset($_POST["submit"])){
    if(addlk($_POST)>0){
        echo "
        <script>
            alert ('Data berhasil ditambahkan!!');
            document.location.href = 'lk.php';    
        </script>";
    }else {
        echo "
        <script>
            alert ('Data gagal ditambahkan');
            document.location.href = 'lk.php';    
        </script>";
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
    <title>Add LK</title>
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
        margin-bottom:10px;
        margin-top:10px;

        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
        /* -webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}input,textarea{-webkit-user-select:text;-khtml-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}img{-webkit-user-drag:none;-khtml-user-drag:none;-moz-user-drag:none;-o-user-drag:none} */
    }


</style>
<body>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new LK</h3>
            <p class="text-muted">Complete the form below to add a new LK</p>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" enctype = "multipart/form-data" style="width:50vw; min-width 300px;">
            <div class="mb-3">
                <label class="form-label">Nama : </label>
                <input type="text" class="form-control" name="nama" placeholder="BADAN EKSEKUTIF MAHASISWA" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Visi : </label>
                <input type="text" class="form-control" name="visi" placeholder="..." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Misi : </label>
                <input type="text" class="form-control" name="misi" placeholder="..." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi : </label>
                <input type="text" class="form-control" name="deskripsi" placeholder="..." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contact person : </label>
                <input type="text" class="form-control" name="contact" placeholder="OA line: @ju4f" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Link daftar : </label>
                <input type="text" class="form-control" name="linkdaftar" placeholder="linkdaftar" >
            </div>

            <div class="mb-3">
                <label class="form-label">Video : </label>
                <input type="text" class="form-control" name="video" placeholder="linkvideo" >
            </div>

            <div class="mb-3">
                <label class="form-label">Kuota : </label>
                <input type="text" class="form-control" name="kuota" placeholder="200" >
            </div>

            <div class="mb-3">
                <label class="form-label">Poster:</label> &nbsp;
                <input type="file" class="form-control" name="poster" >
            </div>

            <div class="mb-3">
                <label class="form-label">Logo:</label> &nbsp;
                <input type="file" class="form-control" name="logo" required>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="lk.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>