<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "xhapussaja";

$koneksinya = mysqli_connect($host,$user,$password,$db);

if (!$koneksinya){
    die("Koneksi Gagal:". mysqli_connect_error());
}


//Fungsi tampil data
function tampil($tampil) {
    global $koneksinya;
    $result = mysqli_query($koneksinya, $tampil);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//Amankan dari script dan sqlinjecton
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Fungsi tambah data
function tambah($tambah){
    global $koneksinya;
    $nama = input($tambah['nama']);
    $hp  = input($tambah['hp']);
    $tgl_lahir = input($tambah['tgl_lahir']);
    
    $query = "INSERT INTO data_mhs
                VALUES ('','$nama','$hp','$tgl_lahir')
            ";
    
    mysqli_query($koneksinya,$query);

    return mysqli_affected_rows($koneksinya);
}

//Fungsi hapus data
function hapus($hapus){
    global $koneksinya;
    mysqli_query($koneksinya, "DELETE FROM data_mhs WHERE id_tes = $hapus");
    return mysqli_affected_rows($koneksinya);
}

//Fungsi edit data
function edit($edit){
    global $koneksinya;

    $id = input($edit['id']);
    $nama = input($edit['nama']);
    $hp = input($edit['hp']);
    $tgl_lahir = input($edit['tgl_lahir']);

    $query = "UPDATE data_mhs SET
                nama = '$nama',
                hp = '$hp',
                tgl_lahir = '$tgl_lahir'
              WHERE id_tes = $id
            ";
    mysqli_query($koneksinya,$query);
    return mysqli_affected_rows($koneksinya);
}

?>