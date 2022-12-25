<?php 
        $koneksi = mysqli_connect("localhost","root","","dbcontact");
        
        // $id = $_POST['id'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $deskripsi = $_POST['deskripsi'];
        $submit = $_POST['submit'];

        mysqli_query($koneksi,"INSERT INTO keluhan VALUES('','$email','$subject'
        ,'$deskripsi','$submit')");

        echo '<script>
        alert("Terimakasih pesanmu telah tersampaikan")
        </script>';
 ?>