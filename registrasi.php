<?php

    session_start();

    require "../fungsi.php";

    if(!isset($_SESSION['login'])){
        header("Location: ../login.php");
        exit;
    }

    if($_SESSION['peran'] != "pelamar"){
        header("Location: ../login.php");
        exit;
    }

    if(isset($_POST['registrasi'])){

    $hasil = registrasi($_POST);

    if($hasil > 0){
        echo "<script>
        alert('Data berhasil disimpan');
        document.location.href='registrasi.php';
        </script>";
    }else{
        echo "<script>alert('Data gagal disimpan');</script>";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi siswa baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">ASPMB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registrasi.php">Registrasi</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dokumen.php">Dokumen</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="kelulusan.php">Kelulusan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
          </li>
      </div>
    </div>
  </nav>


  <div lass="form-container">
    <h2>Formulir Registrasi</h2>
  </div>
  <div>
    <p>Silahkan isi biodata anda!!</p>
        <?php 
            $username = $_SESSION['username'];
            
            if(cekRegistrasi($username) == 0):
           
        ?>,
        <form action="" method="POST">
            <input type="hidden" name="username" value="<?= $username; ?>">
            <label for="namaDepan">Nama Depan</label>
            <td>:</td>
            <input type="text" class="form-control" name="namaDepan" id="namaDepan">
                <br>
            <label for="namaBelakang">Nama Belakang</label>
            <td>:</td>
            <input type="text" class="form-control" name="namaBelakang" id="namaBelakang"> <br><br>

            <label for="tempatLahir">Tempat Lahir</label>
            <td>:</td>
            <input type="text" class="form-control" name="tempatLahir" id="tempatLahir"> <br><br>

            <label for="tglLahir">Tanggal Lahir</label>
            <td>:</td>
            <input type="date" class="form-control" name="tglLahir" id="tglLahir"> <br><br>

            <label for="jenisKelamin">Jenis Kelamin</label>
            <td>:</td>
            <input type="radio" class="form-check-input" name="jenisKelamin" id="Laki-laki" value="Laki-laki">
            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
            <input type="radio" class="form-check-input" name="jenisKelamin" id="Perempuan" value="Perempuan">
            <label class="form-check-label" for="Perempuan">Perempuan</label> <br><br>

            <label for="nisn">NISN</label>
            <td>:</td>
            <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10"> <br><br>

            <label for="agama">Agama</label>
            <td>:</td>
            <select class="form-select" name="agama" id="agama">
                <option value="">Pilih salah Satu</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Protestan">Protestan</option>
                <option value="Katholik">Katholik</option>
                <option value="Budha">Budha</option>
            </select> <br><br>

            <label for="asalSekolah">Asal Sekolah</label>
            <td>:</td>
            <input type="text" class="form-control" name="sekolahAsal" id="asalSekolah"> <br><br>

            <label for="alamat">Alamat</label>
            <td>:</td>
            <textarea class="form-control"  name="alamat" id="alamat"></textarea> <br><br>

            <label for="telepon">Telepon/WA</label>
            <td>:</td>
            <input type="text" class="form-control" name="telepon" id="telepon"> <br><br>

            <hr>

            <h4>Data Orang Tua</h4>

            <label for="namaAyah">Nama Ayah</label>
            <td>:</td>
            <input type="text" class="form-control" name="namaAyah" id="namaAyah"> <br><br>

            <label for="pekerjaanAyah">Pekerjaan Ayah</label>
            <td>:</td>
            <input type="text" class="form-control" name="pekerjaanAyah" id="pekerjaanAyah"> <br><br>

            <label for="penghasilanAyah">Penghasilan Ayah</label>
            <td>:</td>
            <input type="number" class="form-control" name="penghasilanAyah" id="penghasilanAyah"> <br><br>

            <label for="namaIbu">Nama Ibu</label>
            <td>:</td>
            <input type="text" class="form-control" name="namaIbu" id="namaIbu"> <br><br>

            <label for="pekerjaanIbu">Pekerjaan Ibu</label>
            <td>:</td>
            <input type="text" class="form-control" name="pekerjaanIbu" id="pekerjaanIbu"> <br><br>

            <label for="penghasilanIbu">Penghasilan Ibu</label>
            <td>:</td>
            <input type="number" class="form-control" name="penghasilanIbu" id="penghasilanIbu"> <br><br>

            <td><br>
                <button type="submit" name="registrasi" class="btn btn-primary w-100">Registrasi</button>
            </td>
            

        </form>
        <?php 
            else:
                echo "Anda sudah mengisi formulir";
            
            endif;
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>        
</body>
</html>