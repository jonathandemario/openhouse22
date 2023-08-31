<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$id = $_GET["id"];
$mhs = query("SELECT * FROM admin WHERE id = $id")[0];
if(isset($_POST["submit"])){
    if(update($_POST)>0){
        echo "
        <script>
            alert ('Data berhasil diubah!!');
            document.location.href = 'index.php';    
        </script>";
    }else {
        echo "
        <script>
            alert ('Data gagal diubah'); 
            document.location.href = 'index.php';  
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
    <title>Update Admin</title>
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
            <h3>Update admin</h3>
            <p class="text-muted">Complete the form below to update an admin</p>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width 300px;">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="oldNrp" value="<?=$mhs["nrp"]?>">
            <div class="mb-3">
                <label class="form-label">NRP : </label>
                <input type="text" class="form-control" name="nrp" placeholder="c14210000" required
                value = "<?=$mhs["nrp"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama : </label>
                <input type="text" class="form-control" name="nama" placeholder="Ericksen" required
                value = "<?=$mhs["Nama"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Id lk:</label> &nbsp;
                <input type="text" class="form-control" name="id-lk" placeholder="0"
                value = "<?=$mhs["id_lk"]?>">
            </div>

            <div class="mb-3">
                <label>Id ukm:</label> &nbsp;
                <input type="text" class="form-control" name="id-ukm" placeholder="0"
                value = "<?=$mhs["id_ukm"]?>">
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>