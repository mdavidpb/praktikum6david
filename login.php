<?php
session_start();
  require_once "connect.php";

$nis = $_POST['nis'];
$password = $_POST['password'];

if($nis == "" || $password == "")
{
    header("location: form-login.php");
}
else
{
  $query = "SELECT * FROM tb_siswa WHERE nis = '$nis' AND password = '$password'";
  $result = mysqli_query($connect, $query);

  $num = mysqli_num_rows($result);

  if ($num == 1)
  {
      header("location: add_data.php");
      $_SESSION['tb_siswa']=$nis;
  }
  else
  {
      echo "<script>alert('Masukkan ID atau Password anda dengan benar !');location.href='form-login.php';</script>";
  }

}

?>
