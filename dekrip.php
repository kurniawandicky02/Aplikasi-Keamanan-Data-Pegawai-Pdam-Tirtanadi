<?Php
error_reporting(0);
if($_POST['simpan']==".")
{
	$a=$_POST['no'];
	$b=$_POST['nipp'];
	$c=$_POST['nama_pegawai'];
	$d=$_POST['golongan'];
	$e=$_POST['tugas'];
	$f=$_POST['masa_kerja'];
	include "sambung.php";
	$query = "insert into data_pegawai(no,nipp,nama_pegawai,golongan,tugas,masa_kerja) values('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."')";
	$result = mysqli_query($link,$query) or die('Error query:  '.$query);
	echo "<script language=\"Javascript\">\n";
	echo "window.alert('Data Telah Di Simpan');";
	echo "</script>";
}
if($_GET['hps']=="hps")
{
	$a=$_GET["no"];
	include "sambung.php";
	$query = "delete from data_pegawai where no ='".$a."'";
	$result = mysqli_query($link,$query) or die('Error query:  '.$query);
	echo "<script language=\"Javascript\">\n";
	echo "window.alert('Data Telah Di Hapus');";
	echo "</script>";
}
include"atas.php";
include "sambung.php";
echo"<h2><strong>Data <span class='highlight primary'>Pegawai</span></strong></h2>";
$query = mysqli_query($link,"select * from data_pegawai");
$jmlh=mysqli_fetch_array($query);
echo"<form action=dekrip.php method=POST>";
$query = mysqli_query($link,"select * from data_pegawai ORDER BY no ASC");
echo"<center>
	<table border=0 class='table1' width=100%>
		<tr align=center height=20 bgcolor=blue style='color:white'>
			<td><font size=2>NIPP</font></td>
			<td><font size=2>NAMA PEGAWAI</font></td>
			<td><font size=2>GOLONGAN</font></td>
			<td><font size=2>TUGAS/UNIT KERJA</font></td>
			<td><font size=2>MASA KERJA</font></td>
			<td colspan=2><font size=2>AKSI</font></td>
		</tr>";
$auto=1;
$queryk = mysqli_query($link,"select * from data_pegawai ORDER BY no ASC");
while($jmlah=mysqli_fetch_array($queryk))
{
	$auto=$jmlah[0]+1;
}
echo"<tr align=center>
			<td><input type=hidden name=no value='$auto'><input type=text name=nipp style='width:100%'></td>
			<td><input type=text name=nama_pegawai style='width:100%'></td>
			<td><input type=text name=golongan style='width:100%'></td>
			<td><input type=text name=tugas style='width:100%'></td>
			<td><input type=text name=masa_kerja style='width:100%'></td>
			<td colspan=2><input type=submit name=simpan class='simpan' value='.'></td>
		</tr>";
while($jmlh=mysqli_fetch_array($query))
{
	echo"
		<tr align=center>
			<td><font size=2><label style='border:none'>$jmlh[1]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[2]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[3]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[4]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[5]</font></td>
			<td><font size=2><input type='button' class='ganti' onclick=window.location.href='dekrip_ganti.php?no=$jmlh[0]'></font></td>
			<td><font size=2><input type='button' class='hapus' onclick=window.location.href='dekrip.php?no=$jmlh[0]&hps=hps'></font></td>
		</tr>";
}
echo"
<tr align=center><td colspan=8><hr color=blue style='height:2px'></td></tr>
</table>
</form>";
include"bawah.php";
?>