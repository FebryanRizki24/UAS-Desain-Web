<!DOCTYPE html>

<html>
<head>
 <title>LOGIN MULTIUSER PHP</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <h1>Membuat Login MultiLevel Dengan PHP </h1>
 <h3>Febryan Rizki Hidayatullah</h3>

 <?php
 if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
   echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>

 <div class="panel_login">
  <p class="tulisan_atas">Silahkan Masuk</p>

  <form action="cek_login.php" method="post">
   <label>Username</label>
   <input type="text" name="username" class="form_login" placeholder="Masukkan username anda..." required="required">

   <label>Password</label>
   <input type="password" name="password" class="form_login" placeholder="Masukkan password anda..." required="required">

   <input type="submit" class="tombol_login" value="LOGIN">

   <br/>
   <br/>
   
  </form>
  
 </div>


</body>
</html>