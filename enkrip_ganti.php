<?Php
error_reporting(0);
if($_POST['ok']==' ')
{
$a=$_POST['no'];
$b=$_POST['nipp'];
$c=$_POST['nama_pegawai'];
$d=$_POST['golongan'];
$e=$_POST['tugas'];
$f=$_POST['masa_kerja'];
$t=$_POST['ok'];
if($t==true)
{
include "sambung.php";
$query = "update data_pegawai set nipp = '$b',nama_pegawai = '$c',golongan = '$d',tugas = '$e',masa_kerja = '$f' where no ='".$a."' ";
$result = mysqli_query($link,$query) or die('Error query:  '.$query);
echo "<script language=\"Javascript\">\n";
echo "window.alert('Data Telah Di Ganti');";
echo "</script>";
include"enkrip.php";
exit(0);
}
}
include"atas.php";
include "sambung.php";
echo"<h2><strong>Data <span class='highlight primary'>Pegawai</span></strong></h2>";
$a=$_GET['no'];
$query = mysqli_query($link,"select * from data_pegawai where no ='$a'");
$jmlh=mysqli_fetch_array($query);
echo"<br><form action=enkrip_ganti.php method=POST enctype=multipart/form-data>";
echo"<table>
	<tr>
		<td><font face='Trebuchet MS'>NIPP</font></td>
		<td>&nbsp;</td>
		<td><input type=hidden name=no value='$jmlh[0]'>
		<input type=text name=nipp style='font-family:Trebuchet MS;width:102px;' value='$jmlh[1]'>
		<input type=submit name=ok class='simpan' value=' '></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>NAMA PEGAWAI</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=nama_pegawai style='font-family:Trebuchet MS;width:102px;' value='$jmlh[2]'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>GOLONGAN</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=golongan style='font-family:Trebuchet MS;width:102px;' value='$jmlh[3]'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>TUGAS</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=tugas style='font-family:Trebuchet MS;width:102px;' value='$jmlh[4]'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>MASA KERJA</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=masa_kerja style='font-family:Trebuchet MS;width:102px;' value='$jmlh[5]'></td>
		<td>&nbsp;</td>
	</tr>
	</table><br><br><br><br><br><br><br><br><br><br><br><br>";
include"bawah.php";
?>