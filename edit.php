<?php 
require_once "koneksiku.php";

$id = $_GET['id'];

$ambildata = tampil("SELECT * FROM data_mhs WHERE id_tes= $id ")[0];

if(isset($_POST['submit'])){
    if(edit($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil diubah');
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal diubah');
                document.location.href='index.php';
            </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Rangga Tes</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $ambildata['id_tes']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Enter email" required value="<?= $ambildata['nama']; ?>"> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">HP</label>
    <input type="number" class="form-control" id="hp" name="hp" placeholder="Password" value="<?php echo $ambildata['hp']; ?>"> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tgl Lahir</label>
    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Password" value="<?php echo $ambildata['tgl_lahir']; ?>"> 
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
</form>
<br><br>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>