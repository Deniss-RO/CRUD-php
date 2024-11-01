<?php
    include "koneksi.php";

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){            
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $janiskelamin = $_POST['jeniskelamin'];
            $jurusan = $_POST['jurusan'];
            $kelas = $_POST['Kelas'];
            $kemampuan = $_POST['Kemampuan'];
            $allkemempuan = implode(", </br>", $kemampuan);
            $foto = $_FILES['foto']['name'];

            $dir = "img/";
            $tmpFiles = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmpFiles, $dir.$foto);

            $query = "INSERT INTO siswa VALUES(null, '$nis', '$nama', '$janiskelamin', '$jurusan', '$kelas', '$allkemempuan', '$foto')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }

        } else if($_POST['aksi'] == "edit"){
            $id = $_POST['id_siswa'];
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $janiskelamin = $_POST['jeniskelamin'];
            $jurusan = $_POST['jurusan'];
            $kelas = $_POST['Kelas'];
            $kemampuan = $_POST['Kemampuan'];
            $allkemempuan = implode(", </br>", $kemampuan);

            $queryshow = "SELECT * FROM siswa WHERE id = '$id';";
            $sqlshow = mysqli_query($conn, $queryshow);
            $result = mysqli_fetch_assoc($sqlshow);

            if($_FILES['foto']['name'] == ""){
                $foto = $result['Foto'];
            } else {
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['Foto']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }

            $query = "UPDATE siswa SET NIS='$nis', Nama='$nama', Jenis_Kelamin='$janiskelamin', Jurusan='$jurusan', Kelas='$kelas', Kemampuan='$allkemempuan', Foto='$foto' WHERE id='$id';";
            $sql = mysqli_query($conn, $query); 

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        
        $queryshow = "SELECT * FROM siswa WHERE id = '$id';";
        $sqlshow = mysqli_query($conn, $queryshow);
        $result = mysqli_fetch_assoc($sqlshow);

        unlink("img/".$result['Foto']);

        $query = "DELETE FROM siswa WHERE id = '$id';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
        } else {
            echo $query;
        }
        // echo "hapus data <a href='index.php'>Home</a>";
    }
?>