<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
$conn = mysqli_connect("localhost","root","","uasweb");

// Check connection
if (mysqli_connect_errno()){
 echo "Koneksi database gagal : " . mysqli_connect_error();
}

// menangkap data yang dikirim dari form login
$username = $_POST["username"];
$password = $_POST["password"];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
$fetch = mysqli_fetch_array($login);
$passwordnow = $fetch['password'];

// cek apakah username dan password di temukan pada database
if($cek > 0){

 $data = $fetch['level'];

 // cek jika user login sebagai admin
 if(password_verify($password,$passwordnow)){
    if($data=="admin"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:halamanAdmin.php");
      
       // cek jika user login sebagai user
       }else if($data=="user"){
        // buat session login dan user
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        // alihkan ke halaman dashboard user
        header("location:uasFebryan.php");
       }else{
          echo '
          <script>alert("data tidak ada");
          </script>';
        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
       } 
 }else{
    echo '
          <script>alert("data tidak ada");
          </script>';
 }
}else{
 header("location:index.php?pesan=gagal");
}
