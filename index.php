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
        <h1>Edit Data Siswa</h1>
    <?php
    } else {
    ?>
        <h1>Tambah Data Siswa</h1>
    <?php
    }
    ?>
        <hr>
        <?php
            $inputid = '';
            $inputnis = '';
            $inputnama = '';
            $inputjeniskelamin = '';
            $inputjurusan = '';
            $inputkelas = '';
            $inputkemampuan = '';

            if(isset($_GET['ubah'])){
                $inputid = $_GET['ubah'];
                $inputquery = "SELECT * FROM siswa WHERE id = '$inputid';";
                $inputsql = mysqli_query($conn, $inputquery);

                $result = mysqli_fetch_assoc($inputsql);

                $inputnis = $result['NIS'];
                $inputnama = $result['Nama'];
                $inputjeniskelamin = $result['Jenis_Kelamin'];
                $inputjurusan = $result['Jurusan'];
                $inputkelas = $result['Kelas'];
                $inputkemampuan = $result['Kemampuan'];
            }
 
        ?>
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $inputid; ?>" name="id_siswa">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis" value="<?php echo $inputnis; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo $inputnama; ?>">
            </div>
            <div class="form-group">
                <label for="jenis-kelamin" >Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" name="jeniskelamin" value="Laki-Laki" id="laki-laki" <?php if($inputjeniskelamin == 'Laki-Laki'){ echo "checked";} ?>>
                    <label for="laki-laki">Laki-Laki</label>
                    <input type="radio" name="jeniskelamin" value="Perempuan" id="perempuan" <?php if($inputjeniskelamin == 'Perempuan'){ echo "checked";} ?>>
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan">
                    <option value="" disabled selected>-</option>
                    <option <?php if($inputjurusan == 'TJKT'){ echo "selected";} ?> value="TJKT">TJKT</option>
                    <option <?php if($inputjurusan == 'DKV'){ echo "selected";} ?> value="DKV">DKV</option>
                    <option <?php if($inputjurusan == 'PPLG'){ echo "selected";} ?> value="PPLG">PPLG</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <select name="Kelas" id="Kelas">
                    <option value="">-</option>
                    <option <?php if($inputkelas == 'X'){ echo "selected";} ?> value="X">X</option>
                    <option <?php if($inputkelas == 'XI'){ echo "selected";} ?> value="XI">XI</option>
                    <option <?php if($inputkelas == 'XII'){ echo "selected";} ?> value="XII">XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kemampuan">Kemampuan</label>
                <div class="checkbox-group">
                    <div>
                        <input type="checkbox" name="Kemampuan[]" value="Pemrograman" id="pemrograman">
                        <label for="pemrograman">Pemrograman</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan[]" value="Jaringan" id="jaringan">
                        <label for="jaringan">Jaringan</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan[]" value="Desain" id="desain">
                        <label for="desain">Desain</label>
                    </div>
                    <div>
                        <input type="checkbox" name="Kemampuan[]" value="Editing Video" id="editing-video">
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
        <h1>Daftar Siswa</h1>
        <hr>
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
                    <td class="wrap">
                    <?php echo $result['Kemampuan']; ?>
                    </td>
                    <td>
                        <img src="img/<?php echo $result['Foto']; ?>" alt="">
                    </td>
                    <td class="aksi">
                        <a href="index.php?ubah=<?php echo $result['id']; ?>" type="button" >Edit</a>
                        <a href="proses.php?hapus=<?php echo $result['id']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data??')" style="background-color: red;">hapus</a>
                    </td>                
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
