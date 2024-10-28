<?php
    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            var_dump($_POST);
            die();
            echo "tambah data <a href='index.php'>Home</a>";
        } else if($_POST['aksi'] == "edit"){
            echo "edit data <a href='index.php'>Home</a>";
        }
    }

    if(isset($_GET['hapus'])){
        echo "hapus data <a href='index.php'>Home</a>";
    }
?>