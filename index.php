<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Denis Rizkyan Oktaviano</title>
</head>
<body>
    <div class="container">
    <?php
    if(isset($_GET['ubah'])){
    ?>
        <h1>EDIT DATA SISWA</h1>
    <?php
    } else {
    ?>
        <h1>TAMBAH DATA SISWA</h1>
    <?php
    }
    ?>
        <hr>
        <form method="POST" action="proses.php">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="jenis-kelamin">Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" name="jenis-kelamin" id="laki-laki">
                    <label for="laki-laki">Laki-Laki</label>
                    <input type="radio" name="jenis-kelamin" id="perempuan">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan">
                    <option value="TJKT">-</option>
                    <option value="TJKT">TJKT</option>
                    <option value="DKV">DKV</option>
                    <option value="PPLG">PPLG</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <select name="Kelas" id="Kelas">
                    <option value="X">-</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kemampuan">Kemampuan</label>
                <div class="checkbox-group">
                    <div>
                        <input type="checkbox" name="Kemampuan" id="pemrograman">
                        <label for="pemrograman">Pemrograman</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" id="jaringan">
                        <label for="jaringan">Jaringan</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" id="desain">
                        <label for="desain">Desain</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" id="editing-video">
                        <label for="editing-video">Editing Video</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" accept="image" name="foto" id="foto">
            </div>
            <div class="button">
                <?php
                    if(isset($_GET['ubah'])){
                ?>
                    <button type="submit" name="aksi" value="edit">Simpan Perubahan</button>
                <?php
                } else {
                ?>
                    <button type="submit" name="aksi" value="add">Tambah Siswa</button>
                <?php
                }
                ?>
                <a href="index.php" type="button" style="background-color: red;">Batal</a>
            </div>
        </form>
    </div>

    <div class="container">
        <table>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Kemampuan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>No</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Jurusan</td>
                <td>Kelas</td>
                <td>Kemampuan</td>
                <td>
                    <img src="wallpaperflare.com_wallpaper (3).jpg" alt="">
                </td>
                <td>
                    <a href="index.php?ubah=1" type="button" >Edit</a>
                    <a href="proses.php?hapus=1" style="background-color: red;">hapus</a>
                </td>                
            </tr>
        </table>
    </div>
</body>
</html>
