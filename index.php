<?php 
session_start();
require_once "koneksiku.php";

if(!$_SESSION['login']){
  header('Location: login.php');
  exit;
}


$ambildata = tampil("SELECT * From data_mhs");

if(isset($_POST['submit'])){
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>    
    <div class="container">
      <h1 align="center">Daftar Mahasiswa</h1>
     
          <button type="submit" onclick="location.href='logout.php'" class="btn btn-warning float-right">Logout</button>
      <br>
      
    <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">HP</label>
    <input type="number" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tgl Lahir</label>
    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">HP</th>
      <th scope="col">Tgl Lahir</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php 
            $i=1;
            foreach($ambildata as $lihat) {
        ?>
      <td><?php echo $i++; ?></td>
      <td><?php echo $lihat['nama']; ?></td>    
      <td><?php echo $lihat['hp'];?></td>
      <td><?php echo $lihat['tgl_lahir'];?></td>
      <td>
          <a href="hapus.php?id=<?php echo $lihat["id_tes"];?>" onclick="return confirm('Yakin MENGHAPUS data ?');" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>   
          <a href="edit.php?id=<?php echo $lihat['id_tes']; ?>" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cog"></span> Edit</a> 
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>