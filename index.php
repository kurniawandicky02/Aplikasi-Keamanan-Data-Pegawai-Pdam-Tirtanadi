<style>
.ganti{
  padding:5px 15px;
  background-image: url("images/ganti.png");
  background-size: 30px;
  background-position: 0px 0px;
  background-repeat: no-repeat;
}
.simpan{
  padding:5px 32px;
  background-image: url("images/simpan.png");
  background-size: 30px;
  background-position: 16px 0px;
  background-repeat: no-repeat;
}
.hapus{
  padding:5px 15px;
  background-image: url("images/hapus.png");
  background-size: 30px;
  background-position: 0px 0px;
  background-repeat: no-repeat;
}
.cetak{
  padding:5px 15px;
  background-image: url("images/cetak.png");
  background-size: 30px;
  background-position: 0px 0px;
  background-repeat: no-repeat;
}
.cari{
  padding:5px 15px;
  background-image: url("images/cari.png");
  background-size: 30px;
  background-position: 0px 0px;
  background-repeat: no-repeat;
}
</style>
<table width='100%' border=0>
	<tr>
		<td width='9%' align=center><img src='images/logo.png' width=100px height=100px></td>
		<td width='91%'>
			<font size='5vw'><b>APLIKASI KEAMANAN DATA PEGAWAI</font><br>
			<font color=blue>PDAM TIRTANADI</b></font><br>
			Berbasis Website<br>
			<font color=red>Metode Elgamal</font>
		</td>
	</tr>
</table>
<hr>
<form action=masuk.php method=POST>
<div align=right>
<br>
</div>
<center>Silahkan Login :
<table>
<tr>
<td colspan=2>&nbsp;</td>
</tr>
<tr>
<td><font color=Blue>USERNAME</font></td>
<td>
	<select name=username style='width:147px'>
		<option value=''></option>
		<option value='Admin'>Admin</option>
	</select>
</td>
</tr>
<tr>
<td><font color=Blue>PASSWORD</font></td>
<td><font color=red><input type=password name=password></font></td>
</tr>
<tr>
<td colspan=2>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type=submit value=SUBMIT>
</tr>
<tr>
<td colspan=2>&nbsp;</td>
</tr>
</table>
</center>
</form>
<?php
include"bawah.php";
?>