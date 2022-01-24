<?php

$conn = mysqli_connect("localhost", "root", "", "findk");


/*===============================================================================================================*/
/*=============================================== Tampil Data ===================================================*/
/*===============================================================================================================*/

function data($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

/*===============================================================================================================*/
/*=============================================== Tambah Mapel ==================================================*/
/*===============================================================================================================*/

function tambah_mapel($data){
    global $conn;
    //ambil data pada tiap elemen form
    // htmlspecial chars untuk mencegah user memasukkan html di form
    $kelas = htmlspecialchars($data['kelas']);
    $nama_mapel = htmlspecialchars($data['nama_mapel']);
    $id_admin = htmlspecialchars($data['id_admin']);
    $gambar = upload();

    // cek upload gambar
    if( !$gambar ){ //Kalau fungsi uploadnya gagal atau false maka
        return false; // Kita kembalikan ke fungsi tambah dengan false sehingga code yang dibawah tidak dieksekusi
    }

    //panggil query insert data
    $query = "INSERT INTO mapel VALUES ('', '$kelas', '$nama_mapel', '$gambar', '$id_admin')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/*===============================================================================================================*/
/*=============================================== Upload Gambar =================================================*/
/*===============================================================================================================*/

function upload() {
    // $_FILES memiliki array 2 dimensi dengan gambar sebagai pembukanya
    // Panggil data yang ada pada FILE gambar yang di upload
    $namaFile = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // 1) cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        
        return false;
    }

    // 2) cek harus file gambar yang diupload
    $extensiGambarValid = ['jpg', 'jpeg', 'png', 'bmp'];
    $extensiGambar = explode('.', $namaFile); // fungsi untuk memecah string menjadi "ARRAY"
                                              // misal : laskar.jpg maka akan dipecah menjadi $extensiGambar = ['laskar', 'jpg']
    $extensiGambar = strtolower(end($extensiGambar)); // fungsi end maksudnya mengambil index terakhir dari array $extensiGambar
                                                     // fungsi strtolower untuk mengubah extensi huruf kapital menjadi huruf kecil
        // cek apakah extensi gambar sudah benar
        if(!in_array($extensiGambar, $extensiGambarValid)) { //fungsi untuk mengecek apakah ada string didalam array
                                                          // misal cek apakah ada jpg/jpeg/png didalam array $extensiGambarValid
                                                          // Fungsinya menghasilkan true jika ada dan false jika tidak ada
            echo "<script>
                        alert('Extensi gambar yang diterima JPG, JPEG, PNG, BMP !!');
                </script>";
            return false;
        }

    // 3) Cek apakah ukuran file gambar sudah sesuai ketentuan
    if( $ukuranGambar > 2000000 ){
        echo "<script>
                    alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }


// Lolos pengecekan gambar siap di upload
// untuk mencegah nama file gambarnya sama kita gunakan nama uniq dengan fungsi uniqid()
$namaFileBaru = uniqid();
$namaFileBaru .= ".";
$namaFileBaru .= $extensiGambar;
move_uploaded_file($tmpName, 'gambarMapel/'. $namaFileBaru); //fungsi untuk upload file, pertama tmpName kemudian lokasi akan di upload 
                                                 // beserta nama gambarnya
return $namaFileBaru;

}

/*===============================================================================================================*/
/*=============================================== Edit Mapel ====================================================*/
/*===============================================================================================================*/

function edit_mapel($data){
    global $conn;

    $id_mapel = $data['id_mapel'];
    $kelas = htmlspecialchars($data['kelas']);
    $nama_mapel = htmlspecialchars($data['nama_mapel']);
    $id_admin = ($data['id_admin']);
    $gambar_lama = $data['gambar_lama'];

    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }

    // query
    $query = "UPDATE mapel SET id_mapel = $id_mapel,
                                kelas = '$kelas',
                                nama_mapel = '$nama_mapel',
                                id_admin = $id_admin,
                                gambar = '$gambar'
            WHERE id_mapel = $id_mapel";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*============================================== Hapus Mapel ====================================================*/
/*===============================================================================================================*/

function hapus_mapel($id){
    global $conn;
    $query = "DELETE FROM mapel WHERE id_mapel = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/*===============================================================================================================*/
/*=============================================== Registrasi ====================================================*/
/*===============================================================================================================*/

function registrasi($data){

    global $conn;

    // ubah ke huruf kecil ketika user memasukkan huruf kapital dan backslashes
    $username = strtolower(stripslashes($data['username']));
    $email = strtolower($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah dipakai atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                    alert('Username sudah terdaftar!')
            </script>";
        
            return false;
    }
    
    // cek konfirmasi password harus sama
    if( $password !== $password2 ){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password/acak
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru kedatabase
    $query = "INSERT INTO user VALUES('', '$username', '$email', '$password', 'gratis')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*============================================= Tambah Admin ====================================================*/
/*===============================================================================================================*/

function tambah_admin($datamin){

    global $conn;

    // ubah ke huruf kecil ketika user memasukkan huruf kapital dan backslashes
    $namamin = strtolower(stripslashes($datamin['nama']));
    $passwordmin = mysqli_real_escape_string($conn, $datamin['password']);
    $password2min = mysqli_real_escape_string($conn, $datamin['password2']);

    // cek username sudah dipakai atau belum
    $result = mysqli_query($conn, "SELECT nama FROM admin WHERE nama = '$namamin'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                    alert('Username sudah terdaftar!')
            </script>";
        
            return false;
    }

    // cek konfirmasi password harus sama
    if( $passwordmin !== $password2min ){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password/acak
    $passwordmin = password_hash($passwordmin, PASSWORD_DEFAULT);

    // tambahkan userbaru kedatabase
    $query = "INSERT INTO admin VALUES('', '$namamin', '$passwordmin')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/

/*===============================================================================================================*/
/*============================================= Tambah Materi ===================================================*/
/*===============================================================================================================*/


function tambah_materi($data){
    global $conn;
    //ambil data pada tiap elemen form
    // htmlspecial chars untuk mencegah user memasukkan html di form
    $nama_materi = htmlspecialchars($data['nama_materi']);
    $video = htmlspecialchars($data['video']);
    $isi = $data['isi'];
    $status = htmlspecialchars($data['status']);
    $id_mapel = htmlspecialchars($data['id_mapel']);
    $id_admin = htmlspecialchars($data['id_admin']);

    //panggil query insert data
    $query = "INSERT INTO materi VALUES ('', '$nama_materi', '$video', '$isi', '$status', '$id_mapel', '$id_admin')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/*===============================================================================================================*/
/*=============================================== Edit Mapel ====================================================*/
/*===============================================================================================================*/

function edit_materi($data){
    global $conn;

    $id_materi = $data['id_materi'];
    $nama_materi = htmlspecialchars($data['nama_materi']);
    $video = htmlspecialchars($data['video']);
    $isi = $data['isi'];
    $status = $data['status'];
    $id_mapel = $data['id_mapel'];
    $id_admin = $data['id_admin'];
    

    // query
    $query = "UPDATE materi SET id_materi = $id_materi,
                                nama_materi = '$nama_materi',
                                video = '$video',
                                isi = '$isi',
                                status = '$status',
                                id_mapel = $id_mapel,
                                id_admin = $id_admin
            WHERE id_materi = $id_materi";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*============================================== Hapus Mapel ====================================================*/
/*===============================================================================================================*/

function hapus_materi($id){
    global $conn;
    $query = "DELETE FROM materi WHERE id_materi = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/

/*===============================================================================================================*/
/*============================================= Tambah Quis ===================================================*/
/*===============================================================================================================*/


function tambah_quis($data){
    global $conn;
    //ambil data pada tiap elemen form
    // htmlspecial chars untuk mencegah user memasukkan html di form
    $judul_quis = htmlspecialchars($data['judul_quis']);
    $id_mapel = $data['id_mapel'];
    $id_admin = $data['id_admin'];

    //panggil query insert data
    $query = "INSERT INTO judul_quis VALUES ('', '$judul_quis', $id_mapel, $id_admin)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
/*===============================================================================================================*/
/*=============================================== Edit Mapel ====================================================*/
/*===============================================================================================================*/

function edit_quis($data){
    global $conn;

    $id_judul_quis = $data['id_judul_quis'];
    $judul_quis = htmlspecialchars($data['judul_quis']);
    $id_mapel = $data['id_mapel'];
    $id_admin = $data['id_admin'];
    

    // query
    $query = "UPDATE judul_quis SET id_judul_quis = $id_judul_quis,
                                judul_quis = '$judul_quis',
                                id_mapel = $id_mapel,
                                id_admin = $id_admin
            WHERE id_judul_quis = $id_judul_quis";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*============================================== Hapus Mapel ====================================================*/
/*===============================================================================================================*/

function hapus_quis($id){
    global $conn;
    $query = "DELETE FROM judul_quis WHERE id_judul_quis = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/

/*===============================================================================================================*/
/*=============================================== Tambah Soal ===================================================*/
/*===============================================================================================================*/


function buat_soal($data){
    global $conn;
    //ambil data pada tiap elemen form
    // htmlspecial chars untuk mencegah user memasukkan html di form
    $no_soal = htmlspecialchars($data['no_soal']);
    $soal = htmlspecialchars($data['soal']);
    $jwb_a = htmlspecialchars($data['jwb_a']);
    $jwb_b = htmlspecialchars($data['jwb_b']);
    $jwb_c = htmlspecialchars($data['jwb_c']);
    $jwb_d = htmlspecialchars($data['jwb_d']);
    $jwb_benar = htmlspecialchars($data['jwb_benar']);
    $id_judul_quis = $data['id_judul_quis'];
    $id_mapel = $data['id_mapel'];

    //panggil query insert data
    $query = "INSERT INTO quis VALUES ('', '$no_soal', '$soal', '$jwb_a', '$jwb_b', '$jwb_c', '$jwb_d', '$jwb_benar', $id_judul_quis, $id_mapel)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
/*===============================================================================================================*/
/*=============================================== Edit Soal ====================================================*/
/*===============================================================================================================*/

function edit_soal($data){
    global $conn;

    $id_quis = $data['id_quis'];
    $no_soal = htmlspecialchars($data['no_soal']);
    $soal = htmlspecialchars($data['soal']);
    $jawaban_a = htmlspecialchars($data['jawaban_a']);
    $jawaban_b = htmlspecialchars($data['jawaban_b']);
    $jawaban_c = htmlspecialchars($data['jawaban_c']);
    $jawaban_d = htmlspecialchars($data['jawaban_d']);
    $jawaban_benar = htmlspecialchars($data['jawaban_benar']);
    $id_judul_quis = $data['id_judul_quis'];
    $id_mapel = $data['id_mapel'];
    

    // query
    $query = "UPDATE quis SET id_quis = $id_quis,
                                no_soal = $no_soal,
                                soal = '$soal',
                                jawaban_a = '$jawaban_a',
                                jawaban_b = '$jawaban_b',
                                jawaban_c = '$jawaban_c',
                                jawaban_d = '$jawaban_d',
                                jawaban_benar = '$jawaban_benar',
                                id_judul_quis = $id_judul_quis,
                                id_mapel = $id_mapel 
            WHERE id_quis = $id_quis";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*============================================== Hapus Soal ====================================================*/
/*===============================================================================================================*/

function hapus_soal($id){
    global $conn;
    $query = "DELETE FROM quis WHERE id_quis = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/

/*===============================================================================================================*/
/*====================================================== Cari ===================================================*/
/*===============================================================================================================*/

function cari($kata){
    global $conn;
    $q = "SELECT mapel.*, admin.nama FROM mapel INNER JOIN admin ON mapel.id_admin = admin.id_admin WHERE 
                kelas LIKE '%$kata%' OR
                nama_mapel LIKE '%$kata%'
                ";
    return data($q);

}

/*===============================================================================================================*/
/*=============================================== Tambah Mapel ==================================================*/
/*===============================================================================================================*/

function transaksi($data){
    global $conn;
    //ambil data pada tiap elemen form
    // htmlspecial chars untuk mencegah user memasukkan html di form
    $tgl_bayar = $data['tgl_bayar'];
    $sampai_tgl = $data['sampai_tgl'];
    $id_user = htmlspecialchars($data['id_user']);
    $harga = htmlspecialchars($data['harga']);
    $bukti = upload_bukti();

    // cek upload gambar
    if( !$bukti ){ //Kalau fungsi uploadnya gagal atau false maka
        return false; // Kita kembalikan ke fungsi tambah dengan false sehingga code yang dibawah tidak dieksekusi
    }

    //panggil query insert data
    $query = "INSERT INTO transaksi VALUES ('', '$tgl_bayar', $harga, '$bukti', '$sampai_tgl', $id_user)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/*===============================================================================================================*/
/*============================================ Upload Bukti Transaksi ===========================================*/
/*===============================================================================================================*/

function upload_bukti() {
    // $_FILES memiliki array 2 dimensi dengan gambar sebagai pembukanya
    // Panggil data yang ada pada FILE gambar yang di upload
    $namaFile = $_FILES['bukti']['name'];
    $ukuranGambar = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

    // 1) cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        
        return false;
    }

    // 2) cek harus file gambar yang diupload
    $extensiGambarValid = ['jpg', 'jpeg', 'png', 'bmp'];
    $extensiGambar = explode('.', $namaFile); // fungsi untuk memecah string menjadi "ARRAY"
                                              // misal : laskar.jpg maka akan dipecah menjadi $extensiGambar = ['laskar', 'jpg']
    $extensiGambar = strtolower(end($extensiGambar)); // fungsi end maksudnya mengambil index terakhir dari array $extensiGambar
                                                     // fungsi strtolower untuk mengubah extensi huruf kapital menjadi huruf kecil
        // cek apakah extensi gambar sudah benar
        if(!in_array($extensiGambar, $extensiGambarValid)) { //fungsi untuk mengecek apakah ada string didalam array
                                                          // misal cek apakah ada jpg/jpeg/png didalam array $extensiGambarValid
                                                          // Fungsinya menghasilkan true jika ada dan false jika tidak ada
            echo "<script>
                        alert('Extensi gambar yang diterima JPG, JPEG, PNG, BMP !!');
                </script>";
            return false;
        }

    // 3) Cek apakah ukuran file gambar sudah sesuai ketentuan
    if( $ukuranGambar > 2000000 ){
        echo "<script>
                    alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }


// Lolos pengecekan gambar siap di upload
// untuk mencegah nama file gambarnya sama kita gunakan nama uniq dengan fungsi uniqid()
$namaFileBaru = uniqid();
$namaFileBaru .= ".";
$namaFileBaru .= $extensiGambar;
move_uploaded_file($tmpName, 'bukti_transaksi/'. $namaFileBaru); //fungsi untuk upload file, pertama tmpName kemudian lokasi akan di upload 
                                                 // beserta nama gambarnya
return $namaFileBaru;

}

/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/
/*===============================================================================================================*/

/*===============================================================================================================*/
/*=============================================== Edit User ====================================================*/
/*===============================================================================================================*/

function edit_user($data){
    global $conn;

    $id_user = $data['id_user'];
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $password = $data['password'];
    $status = $data['status'];
    

    // query
    $query = "UPDATE user SET id_user = $id_user,
                                username = '$username',
                                email = '$email',
                                password = '$password',
                                status = '$status'
            WHERE id_user = $id_user";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

/*===============================================================================================================*/
/*=============================================== Hapus User ====================================================*/
/*===============================================================================================================*/

function hapus_user($id){
    global $conn;
    $query = "DELETE FROM user WHERE id_user = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>