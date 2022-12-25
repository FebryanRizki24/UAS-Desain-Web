<?php 
        $koneksi = mysqli_connect("localhost","root","","dbcontact");
        
        // $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $model = $_POST['model'];
        $deskripsi = $_POST['deskripsi'];

        mysqli_query($koneksi,"INSERT INTO booking VALUES('','$name','$date'
        ,'$time','$model','$deskripsi')");

        echo '<script>
        alert("Terimakasih pesanmu telah tersampaikan")
        </script>';

        // header("location:uasFebryan.php?booking berhasil");
 ?>
 <html>
    <body>
        <a href="uasFebryan.php"> << kembali</a>
    </body>
 </html>