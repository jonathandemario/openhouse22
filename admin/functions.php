<?php
require "../utility/db_connect.php";
function save($data){
    global $pdo;
    $name = htmlspecialchars($data["nama"]);
    $name = strtolower($name);
    $nrp = htmlspecialchars($data["nrp"]);
    if($data["id-lk"] === ''){
        $lk = 0;
    }else{
        $lk = $data["id-lk"];
    }
    if($data["id-ukm"] === ''){
        $ukm = 0;
    }else{
        $ukm = $data["id-ukm"];
    }
    $result = $pdo->prepare("SELECT nrp FROM admin WHERE nrp = '$nrp'");
    $result->execute();
    $query = $result->fetch(PDO::FETCH_ASSOC);
    if($query){
        echo"
        <script>
            alert ('NRP sudah terdaftar!!');   
        </script>";
        return false;
    }

        $data = "INSERT INTO admin(`nrp`, `Nama`, `id_lk`, `id_ukm`) VALUES ('$nrp','$name','$lk','$ukm')";
        $statement = $pdo->prepare($data);
        $statement->execute();
        $count = $statement->rowCount();
    return $count;
}
function query($query){
    global $pdo;
    $result = $pdo->prepare($query);
    $result->execute();
    $hasil = $result->fetchAll(PDO::FETCH_ASSOC);
    return $hasil;
}
function update($data){
    global $pdo;
        $ide = $data["id"];
        $nrpL = $data["oldNrp"];
    
        $name = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        if($data["id-lk"] === null){
            $lk = 0;
        }else{
            $lk = $data["id-lk"];
        }
        if($data["id-ukm"] === null){
            $ukm = 0;
        }else{
            $ukm = $data["id-ukm"];
        }
        $result = $pdo->prepare("SELECT nrp FROM admin WHERE nrp = '$nrp'");
        $result->execute();
        $query = $result->fetch(PDO::FETCH_ASSOC);
        if($query && $nrp !== $nrpL){
            echo"
            <script>
            alert ('NRP sudah terdaftar!!');    
            </script>";
        return false;
        }
        $data = "UPDATE admin set 
                    nrp = '$nrp' , 
                    nama = '$name',
                    id_lk='$lk',
                    id_ukm='$ukm'
                    WHERE id = $ide";
        $statement = $pdo->prepare($data);
        $statement->execute();
        $count = $statement->rowCount();
        return $count;
}
function delete($ido){
    global $pdo;
    $hapus = "DELETE FROM admin WHERE id = $ido";
    $result = $pdo->prepare($hapus);
    $result->execute();
    $count = $result->rowCount();
    return $count;
}
function deletelk($ido){
    global $pdo;
    $hapus = "DELETE FROM lk WHERE id = $ido";
    $result = $pdo->prepare($hapus);
    $result->execute();
    $count = $result->rowCount();
    return $count;
}
function deleteukm($ido){
    global $pdo;
    $hapus = "DELETE FROM ukm WHERE id = $ido";
    $result = $pdo->prepare($hapus);
    $result->execute();
    $count = $result->rowCount();
    return $count;
}


function addlk($data){
    global $pdo;
    $name = htmlspecialchars($data["nama"]);
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $cp = htmlspecialchars($data["contact"]);
    $video = htmlspecialchars($data["video"]);
    $kuota = ($data["kuota"]);
    $linkdaftar = $data["linkdaftar"];
    // upload gambar poster
    $poster = uploadpLK();
    // upload gambar logo
    $logo = uploadlogoLK();
        if(!$poster){
        return false;
    }
    if(!$logo){
        return false;
    }
        if($kuota === ''){
        $kuota = 0;
    }
    $insert = "INSERT INTO lk(`nama`, `visi`, `misi`, `poster`, `video`, `deskripsi`, `contact_person`, `link_pendaftaran`, `kuota`, `logo`) VALUES ('$name','$visi','$misi','$poster','$video','$deskripsi','$cp','$linkdaftar','$kuota','$logo')";
    $statement = $pdo->prepare($insert);
    $statement->execute();
    $count = $statement->rowCount();
    return $count;
}
function updatelk($data){
    global $pdo;
    $ide = $data["id"];
    $name = htmlspecialchars($data["nama"]);
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $cp = htmlspecialchars($data["contact"]);
    $video = htmlspecialchars($data["video"]);
    $kuota = ($data["kuota"]);
    $linkdaftar = htmlspecialchars($data["linkdaftar"]);
    $posterlama = htmlspecialchars($data["posterLama"]);
    $logolama = htmlspecialchars($data["logoLama"]);
    if($kuota === ''){
        $kuota = 0;
    }
    // upload gambar poster
    if($_FILES["poster"]["error"] === 4){
        $poster = $posterlama;
    }else{
        $poster = uploadpLK();
        if(!$poster){
            return false;
        }
    }
    // upload gambar logo
    if($_FILES["logo"]["error"] === 4){
        $logo = $logolama;
    }else{
        $logo = uploadlogoLK();
        if(!$logo){
            return false;
        }
    }

    $data = "UPDATE lk set 
                nama = '$name' , 
                visi = '$visi',
                misi='$misi',
                deskripsi='$deskripsi',
                contact_person='$cp',
                video='$video',
                kuota='$kuota',
                poster='$poster',
                logo='$logo',
                link_pendaftaran='$linkdaftar'
                WHERE id = $ide";
    $statement = $pdo->prepare($data);
    $statement->execute();
    $count = $statement->rowCount();
    return $count;
}
function uploadpLK(){
    $namafile = $_FILES['poster']['name'];
    $ukuranfile = $_FILES['poster']['size'];
    $error = $_FILES['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    if($error === 4){
        return " ";
    }

    //cek apakah input gambar
    $tipe = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$tipe)){
        echo"
        <script>
            alert ('Upload harus berupa gambar!!');   
        </script>";
        return false;
    }
    //lolos pengecekan gambar
    move_uploaded_file($tmpName,"../asset/poster/".$namafile);
    return $namafile;
}
function uploadlogoLK(){
    $namafile = $_FILES['logo']['name'];
    $ukuranfile = $_FILES['logo']['size'];
    $error = $_FILES['logo']['error'];
    $tmpName = $_FILES['logo']['tmp_name'];

    if($error === 4){
        echo "
        <script>
        alert ('Pilih gambar terlebih dahulu!!');       
        </script>";
        return false;
    }

    //cek apakah input gambar
    $tipe = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$tipe)){
        echo"
        <script>
            alert ('Upload harus berupa gambar!!');   
        </script>";
        return false;
    }
    //lolos pengecekan gambar
    move_uploaded_file($tmpName,"../asset/logo/".$namafile);
    return $namafile;
}
function addukm($data){
    global $pdo;
    $name = htmlspecialchars($data["nama"]);
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $cp = htmlspecialchars($data["contact"]);
    $video = htmlspecialchars($data["video"]);
    $kuota = ($data["kuota"]);
    $linkdaftar = $data["linkdaftar"];
    // upload gambar poster
    $poster = uploadpUKM();
    // upload gambar logo
    $logo = uploadlogoUKM();
        if(!$poster){
        return false;
    }
    if(!$logo){
        return false;
    }
        if($kuota === ''){
        $kuota = 0;
    }
    $insert = "INSERT INTO ukm(`nama`, `visi`, `misi`, `poster`, `video`, `deskripsi`, `contact_person`, `link_daftar`, `kuota`, `logo`) VALUES ('$name','$visi','$misi','$poster','$video','$deskripsi','$cp','$linkdaftar','$kuota','$logo')";
    $statement = $pdo->prepare($insert);
    $statement->execute();
    $count = $statement->rowCount();
    return $count;
}
function updateukm($data){
    global $pdo;
    $ide = $data["id"];
    $name = htmlspecialchars($data["nama"]);
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $cp = htmlspecialchars($data["contact"]);
    $video = htmlspecialchars($data["video"]);
    $kuota = ($data["kuota"]);
    $linkdaftar = htmlspecialchars($data["linkdaftar"]);
    $posterlama = htmlspecialchars($data["posterLama"]);
    $logolama = htmlspecialchars($data["logoLama"]);
        if($kuota === ''){
        $kuota = 0;
    }
    // upload gambar poster
    if($_FILES["poster"]["error"] === 4){
        $poster = $posterlama;
    }else{
        $poster = uploadpUKM();
        if(!$poster){
            return false;
        }
    }
    // upload gambar logo
    if($_FILES["logo"]["error"] === 4){
        $logo = $logolama;
    }else{
        $logo = uploadlogoUKM();
        if(!$logo){
            return false;
        }
    }

    $data = "UPDATE ukm set 
                nama = '$name' , 
                visi = '$visi',
                misi='$misi',
                deskripsi='$deskripsi',
                contact_person='$cp',
                video='$video',
                kuota='$kuota',
                poster='$poster',
                logo='$logo',
                link_daftar='$linkdaftar'
                WHERE id = $ide";
    $statement = $pdo->prepare($data);
    $statement->execute();
    $count = $statement->rowCount();
    return $count;
}
function uploadpUKM(){
    $namafile = $_FILES['poster']['name'];
    $ukuranfile = $_FILES['poster']['size'];
    $error = $_FILES['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    if($error === 4){
        return " ";
    }

    //cek apakah input gambar
    $tipe = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$tipe)){
        echo"
        <script>
            alert ('Upload harus berupa gambar!!');   
        </script>";
        return false;
    }

    //lolos pengecekan gambar
    move_uploaded_file($tmpName,"../asset/posterUKM/".$namafile);
    return $namafile;
}
function uploadlogoUKM(){
    $namafile = $_FILES['logo']['name'];
    $ukuranfile = $_FILES['logo']['size'];
    $error = $_FILES['logo']['error'];
    $tmpName = $_FILES['logo']['tmp_name'];

    if($error === 4){
        echo "
        <script>
        alert ('Pilih gambar terlebih dahulu!!');       
        </script>";
        return false;
    }

    //cek apakah input gambar
    $tipe = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$tipe)){
        echo"
        <script>
            alert ('Upload harus berupa gambar!!');   
        </script>";
        return false;
    }

    //lolos pengecekan gambar
    move_uploaded_file($tmpName,"../asset/logoUKM/".$namafile);
    return $namafile;
}
?>