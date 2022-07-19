<?php
$a=$_POST['username'];
$b=$_POST['password'];
include "sambung.php";
$query = mysqli_query($link,"select * from login where id_login ='1'");
$jmlh=mysqli_fetch_array($query);
if($a=='Admin' && $b==$jmlh[1])
{
	include"menu.php";
	exit(0);
}
if($a=='Admin' && $b!=$jmlh[1])
{
	echo "<script language=\"Javascript\">\n";
	echo "window.alert('Login Gagal');";
	echo "</script>";
	include"index.php";
	exit(0);
}
if($a=='User')
{
	include"MOORA.php";
	exit(0);
}
include"index.php";
echo "<script language=\"Javascript\">\n";
echo "window.alert('Isi Data Login');";
echo "</script>";
?>