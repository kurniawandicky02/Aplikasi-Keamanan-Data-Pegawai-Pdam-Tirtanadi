<?Php
error_reporting(0);
function modulus($c, $d, $n){
        if ($d % 2 == 0) {			
            $g = 1;
		}
        else{
            $g = $c;
		}
        for($i=1;$i<=($d / 2);$i++){			
            $f = $c * $c % $n;
            $g = $f * $g % $n;
		}
        return $g;
}
function moduls($a, $c, $d, $n){
        if ($d % 2 == 0) {			
            $g = 1;
		}
        else{
            $g = $c*$a;
		}
        for($i=1;$i<=($d / 2);$i++){			
            $f = $c * $c % $n;
            $g = $f * $g % $n;
		}
        return $g;
}
function enkrip($skata){
	$kg=$_POST['g'];
	$kx=$_POST['x'];
	$kp=$_POST['p'];
	$ky=modulus($kg,$kx,$kp);
    $xxx="";
    $jum = strlen($skata);
        for($i=0;$i<=$jum-1;$i++){
            if($i==0){$k = 11;}
            if($i==1){$k = 13;}
            if($i==2){$k = 17;}
            if($i==3){$k = 19;}
            if($i==4){$k = 23;}
            if($i==5){$k = 29;}
            if($i==6){$k = 31;}
            if($i==7){$k = 37;}
            if($i==8){$k = 41;}
            if($i==9){$k = 43;}
            if($i==10){$k = 47;}
            if($i==11){$k = 53;}
            if($i==12){$k = 59;}
            if($i==13){$k = 61;}
            if($i==14){$k = 67;}
            if($i==15){$k = 71;}
            if($i==16){$k = 73;}
            if($i==17){$k = 79;}
            if($i==18){$k = 83;}
            if($i==19){$k = 89;}
            $m[$i]=ord($skata[$i]);
            $a[$i] = modulus($kg, $k, $kp);
            $d[$i] = moduls($m[$i], $ky, $k, $kp);
            if($d[$i]==0){ $d[$i] = 183;}
            if($d[$i]==1){ $d[$i] = 184;}
            if($d[$i]==2){ $d[$i] = 185;}
            //echo"Chr($a[$i]) . Chr($d[$i])";
            $xxx = $xxx . Chr($a[$i]) . Chr($d[$i]);
		}
        Return $xxx;
}
if($_POST['enkrip']==','){	
	$kg=$_POST['g'];
	$kx=$_POST['x'];
	$kp=$_POST['p'];
	$ky=modulus($kg,$kx,$kp);
	$nipp=$_POST['nipp'];
	$nama_pegawai=enkrip($_POST['nama_pegawai']);
	$golongan=enkrip($_POST['golongan']);
	$tugas=enkrip($_POST['tugas']);
	$masa_kerja=enkrip($_POST['masa_kerja']);
}
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
echo"<form action=enkrip.php method=POST>";
$query = mysqli_query($link,"select * from data_pegawai ORDER BY no ASC");
echo"<center>
	<table border=0 class='table1' width=100%>
		<tr align=center height=20 bgcolor=blue style='color:white'>
			<td><font size=2>KUNCI</font></td>
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
			<td><input type=hidden name=no value='$auto'>
			G<input type=text name=g style='width:30px' value='$kg'>
			X<input type=text name=x style='width:30px' value='$kx'><br>
			P<input type=text name=p style='width:30px' value='$kp'>
			Y<input type=text name=y style='width:30px' value='$ky'>
			</td>
			<td><input type=text name=nipp style='width:100%' value='$nipp'></td>
			<td><input type=text name=nama_pegawai style='width:100%' value='$nama_pegawai'></td>
			<td><input type=text name=golongan style='width:100%' value='$golongan'></td>
			<td><input type=text name=tugas style='width:100%' value='$tugas'></td>
			<td><input type=text name=masa_kerja style='width:100%' value='$masa_kerja'></td>
			<td><input type=submit name=enkrip class='cari' value=','></td>
			<td><input type=submit name=simpan class='simpan' value='.'></td>
		</tr>";
while($jmlh=mysqli_fetch_array($query))
{
	echo"
		<tr align=center>
			<td><font size=2><label style='border:none'>&nbsp;</font></td>
			<td><font size=2><label style='border:none'>$jmlh[1]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[2]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[3]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[4]</font></td>
			<td><font size=2><label style='border:none'>$jmlh[5]</font></td>
			<td><font size=2><input type='button' class='ganti' onclick=window.location.href='enkrip_ganti.php?no=$jmlh[0]'></font></td>
			<td><font size=2><input type='button' class='hapus' onclick=window.location.href='enkrip.php?no=$jmlh[0]&hps=hps'></font></td>
		</tr>";
}
echo"
<tr align=center><td colspan=8><hr color=blue style='height:2px'></td></tr>
</table>
</form>";
include"bawah.php";
?>