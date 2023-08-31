<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$lk = $_SESSION['lk_admin'];
$ukm = $_SESSION['ukm_admin'];
if($lk!==0){
  header("Location: lk.php");
  exit();
}
if($ukm!==0){
  header("Location: ukm.php");
  exit();
}
if(isset($_POST["submit"])){
    if(save($_POST)>0){
        echo "
        <script>
            alert ('Data berhasil ditambahkan!!');
            document.location.href = 'add_admin.php';    
        </script>";
    }else {
        echo "
        <script>
            alert ('Data gagal ditambahkan');
            document.location.href = 'add_admin.php';    
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
    <title>Add Admin</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" 
    style="background-color : aqua;">
    Welcome!!</nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new Admin</h3>
            <p class="text-muted">Complete the form below to add a new admin</p>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width 300px;">
            <div class="mb-3">
                <label class="form-label">NRP : </label>
                <input type="text" class="form-control" name="nrp" placeholder="c14210000" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama : </label>
                <input type="text" class="form-control" name="nama" placeholder="Ericksen" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Id lk:</label> &nbsp;
                <input type="text" class="form-control" name="id-lk" placeholder="0">
            </div>

            <div class="mb-3">
                <label>Id ukm:</label> &nbsp;
                <input type="text" class="form-control" name="id-ukm" placeholder="0">
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>