<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$id = $_GET["id"];
$mhs = query("SELECT * FROM lk WHERE id = $id")[0];
if(isset($_POST["submit"])){
    if(updatelk($_POST)>0){
        echo "
        <script>
            alert ('Data berhasil diubah!!');
            document.location.href = 'lk.php';    
        </script>";
    }else {
        echo "
        <script>
            alert ('Data gagal diubah');
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
    <title>Update LK</title>
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
            <h3>UPDATE LK</h3>
            <p class="text-muted">Complete the form below to update a LK</p>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" enctype = "multipart/form-data" style="width:50vw; min-width 300px;">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="posterLama" value="<?=$mhs["poster"]?>">
        <input type="hidden" name="logoLama" value="<?=$mhs["logo"]?>">
            <div class="mb-3">
                <label class="form-label">Nama : </label>
                <input type="text" class="form-control" name="nama" placeholder="BADAN EKSEKUTIF MAHASISWA" required
                value = "<?=$mhs["nama"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Visi : </label>
                <input type="text" class="form-control" name="visi" placeholder="..." required
                value = "<?=$mhs["visi"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Misi : </label>
                <input type="text" class="form-control" name="misi" placeholder="..." required
                value = "<?=$mhs["misi"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi : </label>
                <input type="text" class="form-control" name="deskripsi" placeholder="..." required
                value = "<?=$mhs["deskripsi"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Contact person : </label>
                <input type="text" class="form-control" name="contact" placeholder="OA line: @ju4f" required
                value = "<?=$mhs["contact_person"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Link daftar : </label>
                <input type="text" class="form-control" name="linkdaftar" placeholder="OA line: @ju4f" 
                value = "<?=$mhs["link_pendaftaran"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Video : </label>
                <input type="text" class="form-control" name="video" placeholder="linkvideo" 
                value = "<?=$mhs["video"]?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Kuota : </label>
                <input type="text" class="form-control" name="kuota" placeholder="200" 
                value = "<?=$mhs["kuota"]?>">
            </div>

            <div class="mb-3">
            <label class="form-label">Poster:</label> &nbsp;
            <?php
            if($mhs['poster'] !== ' ' && $mhs["poster"] !== "") : ?>
                <img class = mb-3 src="../asset/poster/<?=$mhs['poster'];?>" width = 100px> <br>
            <?php endif;?>
            <input type="file" class="form-control" name="poster" >
            </div>

            <div class="mb-3">
                <label class="form-label">Logo:</label> &nbsp;
                <img class = mb-3 src="../asset/logo/<?=$mhs['logo'];?>" width = 100px> <br>
                <input type="file" class="form-control" name="logo" >
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