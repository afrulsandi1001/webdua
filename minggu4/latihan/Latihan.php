<html>
<head><title>Input Nilai</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$nimErr = $progdiErr ="" ;
$nim = $tugas = $uts = $uas = $nilai = $grade = $status = $interaktif = $terlambat = $kehadiran = $progdi ="" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nim"])) {
    $nimErr = "NIM is required";
  } else {
    $nim = test_input($_POST["nim"]);
  }
  if (empty($_POST["progdi"])) {
    $progdiErr = "Program Studi is required";
  } else {
    $progdi = test_input($_POST["progdi"]);
  }
  if (empty($_POST["tugas"])) {
    $tugas = "";
  } else {
    $tugas = test_input($_POST["tugas"]);
  }
  if (empty($_POST["uts"])) {
    $uts = "";
  } else {
    $uts = test_input($_POST["uts"]);
  }
  if (empty($_POST["uas"])) {
    $uas = "";
  } else {
    $uas = test_input($_POST["uas"]);
  }
  if (empty($_POST["nilai"])) {
    $nilai = "";
  } else {
    $tugas = test_input($_POST["nilai"]);
  }
  if (empty($_POST["tugas"])) {
    $tugas = "";
  } else {
    $tugas = test_input($_POST["progdi"]);
  }
  if (empty($_POST["grade"])) {
    $grade = "";
  } else {
    $grade = test_input($_POST["grade"]);
  }
  if (empty($_POST["status"])) {
    $status = "";
  } else {
    $tugas = test_input($_POST["status"]);
  }
  if (empty($_POST["interaktif"])) {
    $interaktif = "";
  } else {
    $tugas = test_input($_POST["interaktif"]);
  }
  if (empty($_POST["kehadiran"])) {
    $kehadiran = "";
  } else {
    $tugas = test_input($_POST["kehadiran"]);
  }
  if (empty($_POST["terlambat"])) {
    $terlambat = "";
  } else {
    $tugas = test_input($_POST["terlambat"]);
  }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Form Input Data Mahasiswa</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<table width="500">
<thead>
<tr>
<td>Nim</td>
<td><input type="text" name="nim" placeholder="example (A22.2020.02825)">
<span class="error">* <?php echo $nimErr;?></span>
</td>
</tr>
<tr>
<td>Program Studi</td> 
<td><select name="progdi">
<option value=""></option> 
<option value="Teknik Informatika S1">A11</option>
<option value="Sistem Informasi S1">A12</option>
<option value="Teknik Informatika D3">A22</option>
</select>
<span class="error">* <?php echo $nimErr;?></span>
</td>
</tr>
<tr>
<td>Nilai Tugas</td>
<td><input type="number" min = "0" max = "100" step "1" name="tugas" placeholder="0-100"></td>
</tr>
<tr>
<td>Nilai UTS</td> 
<td><input type="number" min = "0" max = "100" step "1" name="uts" placeholder="0-100"></td>
</tr>
<tr>
<td>Nilai UAS</td>  
<td><input type="number" min = "0" max = "100" step "1" name="uas" placeholder="0-100"></td>
</tr>
<tr>
<td>Catatan Khusus</td>
<td><input type="checkbox" name="kehadiran" value="Kehadiran >=70%"> Kehadiran >=70%</td>
</tr>
<tr>
<td></td>
<td><input type="checkbox" name="interaktif" value="Interaktif dikelas"> Interaktif dikelas</td>
</tr>
<tr>
<td></td>
<td><input type="checkbox" name="terlambat" value="Tidak terlambat mengumpulkan tugas">Tidak terlambat mengumpulkan tugas</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Simpan" value="Simpan">
</tr>
</form>
</table>
<table align="center" border="2">
<?php
echo "<h2>Hasil Input :</h2>";
if (isset($_POST['Simpan'])) {
$nim = $_POST['nim'];
$progdi = $_POST['progdi'];
function grade($nilai)
{
 if($nilai <= 100 ) { $grade = "A"; }
 if($nilai <  85 )  { $grade = "B"; }
 if($nilai <  70 )  { $grade = "C"; }
 if($nilai <  60 )  { $grade = "D"; }
 if($nilai <  50 )  { $grade = "E"; }
 if($nilai >  100 )  { $grade = "penilaian hanya berlaku 0-100"; }

 return $grade;
}
function status($nilai)
{
 if($nilai >= 60 ) {$status = "lulus"; }
 if($nilai < 60 )  {$status = "gagal"; }

 return $status;
}
$tugas  = trim($_POST['tugas']);
$uts  = trim($_POST['uts']);
$uas  = trim($_POST['uas']);
$nilai  =($tugas*0.4)+ ($uts*0.3)+ ($uas*0.3);

$grade  = grade($nilai);
$status = status($nilai);
}
?>
<tr>
<th>Program Studi</th>
<th>NIM</th>
<th>Nilai Angka</th>
<th>Nilai Huruf</th>
<th>STATUS</th>
<th>Catatan Khusus</th>
</tr>
<tr>
<td align="center"><?php echo$progdi; ?></td>
<td align="center"><?php echo$nim;?></td>
<td align="center"><?php echo$nilai;?></td>
<td align="center"><?php echo$grade;?></td>
<td align="center"><?php echo$status;?></td>
<td align="center">
<?php echo $kehadiran;?><br>
<?php echo $interaktif;?><br>
<?php echo $terlambat;?>
</td>
</tr>
</table>
</body>
</html>





