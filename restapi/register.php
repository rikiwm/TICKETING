<?php
  require_once 'koneksi.php';

          $nama = null;
          $username = null;
          $email = null;
          $password = null;
          $user_id=null;

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $email = $_POST ['email'];
            $password = $_POST ['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);

          }
          //   if($_SERVER['REQUEST_METHOD']=='GET'){
          //   $nama = $_GET['nama'];
          //   $username = $_GET['username'];
          //   $email = $_GET ['email'];
          //   $password = $_GET ['password'];
          // }
         
            $sql = "INSERT INTO tbl_user (nama, email, password,username) VALUES ('$nama','$email','$password','$username')";
            $result=mysqli_query($konek,$sql);

          if($result)
          {
          
          $response = array("response"=>"success");
              echo json_encode($response);
          }
          else
          {
              $response = array("response"=>"failure");
              echo json_encode($response);
          }

        

?>