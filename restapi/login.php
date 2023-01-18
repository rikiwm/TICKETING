<?php
    require_once 'koneksi.php';

    $nama = null;
    $username = null;
    $email = null;
    $password = null;
    $user_id=null;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$sql_select="SELECT * FROM `tbl_user` WHERE `email`='$email' && `password`= '$password' ";
$result_select=mysqli_query($konek,$sql_select);

$result_count=mysqli_num_rows($result_select);
if($result_count>1)
{
    while($row=mysqli_fetch_array($result_select))
        {
            
            $nama = $row['nama'];
            $username = $row['username'];
            $email = $row ['email'];
            $password = $row ['password'];
           
             $UserDetails=array(
                                "id_user" =>$user_id,
                                "nama" =>$nama,
                                 "password" =>$password,
                                "email" => $email

                                );
        }
}

    if($result_count)
    {          
       $response=array("response"=> $UserDetails);
       echo json_encode($response);
       
    }else
    {
        $response=array("response"=> "failure");
        echo json_encode($response);
    }



    
