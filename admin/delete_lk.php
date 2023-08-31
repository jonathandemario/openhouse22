<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
  header("Location: loginadmin.php");
  exit();
}
$id = $_GET["id"];
if(deletelk($id) > 0){
    echo "
        <script>
            alert ('Data berhasil dihapus');
            document.location.href = 'lk.php';    
        </script>";
}else{
    echo "
        <script>
            alert ('Data tidak berhasil dihapus');
            document.location.href = 'lk.php';    
        </script>";
}
?>