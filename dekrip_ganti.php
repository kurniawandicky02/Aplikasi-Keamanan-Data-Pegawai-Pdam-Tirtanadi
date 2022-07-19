<?Php
error_reporting(0);
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
function dekrip($skata){
	$kx=$_POST['x'];
	$kp=$_POST['p'];
    $xxx="";
        for($i=0;$i<=strlen($skata)-1;$i+=2){
            $y[$i]=ord($skata[$i]);
            $d[$i]=ord($skata[$i+1]);
            if($d[$i]==183){ $d[$i] = 0;}
            if($d[$i]==184){ $d[$i] = 1;}
            if($d[$i]==185){ $d[$i] = 2;}

           
            $pkt = ($kp - 1 - $kx);
            $m[$i] = moduls($d[$i], $y[$i], $pkt, $kp);
            $xxx = $xxx . Chr($m[$i]);		
		}
        Return $xxx;
}
if($_POST['dekrip']==','){	
	$nomor=$_POST['no'];
	$nipp=$_POST['nipp'];
	$nama_pegawai=dekrip($_POST['nama_pegawai']);
	$golongan=dekrip($_POST['golongan']);
	$tugas=dekrip($_POST['tugas']);
	$masa_kerja=dekrip($_POST['masa_kerja']);
}
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
echo"$query<br>";
echo "<script language=\"Javascript\">\n";
echo "window.alert('Data Telah Di Ganti');";
echo "</script>";
include"dekrip.php";
exit(0);
}
}
include"atas.php";
include "sambung.php";
echo"<h2><strong>Data <span class='highlight primary'>Pegawai</span></strong></h2>";
$a=$_GET['no'];
$query = mysqli_query($link,"select * from data_pegawai where no ='$a'");
$jmlh=mysqli_fetch_array($query);
echo"<br><form action=dekrip_ganti.php method=POST enctype=multipart/form-data>";
echo"<table>
	<tr>
		<td><font face='Trebuchet MS'>NIPP</font></td>
		<td>&nbsp;</td>
		<td><input type=hidden name=no value='$jmlh[0]$nomor'>
		<input type=text name=nipp style='font-family:Trebuchet MS;width:102px;' value='$jmlh[1]$nipp'>
		<input type=submit name=ok class='simpan' value=' '></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>NAMA PEGAWAI</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=nama_pegawai style='font-family:Trebuchet MS;width:102px;' value='$jmlh[2]$nama_pegawai'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>GOLONGAN</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=golongan style='font-family:Trebuchet MS;width:102px;' value='$jmlh[3]$golongan'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>TUGAS</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=tugas style='font-family:Trebuchet MS;width:102px;' value='$jmlh[4]$tugas'></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face='Trebuchet MS'>MASA KERJA</font></td>
		<td>&nbsp;</td>
		<td><input type=text name=masa_kerja style='font-family:Trebuchet MS;width:102px;' value='$jmlh[5]$masa_kerja'></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign=top>
		<td><font face='Trebuchet MS'>Kunci</font></td>
		<td>&nbsp;</td>
		<td>X:<input type=text name=x style='font-family:Trebuchet MS;width:102px;' value='$kx'><br>
			P&nbsp;:<input type=text name=p style='font-family:Trebuchet MS;width:102px;' value='$kp'><br>
			<input type=submit name=dekrip class='cari' value=','>
		</td>
		<td>&nbsp;</td>
	</tr>
	</table></form><br><br><br><br><br><br><br><br><br><br><br><br>";
include"bawah.php";
?>