<?php
    include 'koneksi.php';

    $query = "SELECT * FROM siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

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
                        <input type="checkbox" name="Kemampuan" value="Pemrograman" id="pemrograman">
                        <label for="pemrograman">Pemrograman</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" value="Jaringan" id="jaringan">
                        <label for="jaringan">Jaringan</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" value="Desain" id="desain">
                        <label for="desain">Desain</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan" value="Editing Video" id="editing-video">
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
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                <tr>
                    <td>
                        <?php echo ++$no ?>.
                    </td>
                    <td>
                    <?php echo $result['NIS']; ?>
                    </td>
                    <td>
                    <?php echo $result['Nama']; ?>
                    </td>
                    <td>
                    <?php echo $result['Jenis_Kelamin']; ?>
                    </td>
                    <td>
                    <?php echo $result['Jurusan']; ?>
                    </td>
                    <td>
                    <?php echo $result['Kelas']; ?>
                    </td>
                    <td>
                    <?php echo $result['Kemampuan']; ?>
                    </td>
                    <td>
                        <img src="wallpaperflare.com_wallpaper (3).jpg" alt="">
                    </td>
                    <td class="aksi">
                        <a href="index.php?ubah=<?php echo $result['id']; ?>" type="button" >Edit</a>
                        <a href="proses.php?hapus=<?php echo $result['id']; ?>" style="background-color: red;">hapus</a>
                    </td>                
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
