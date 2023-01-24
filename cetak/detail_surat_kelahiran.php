<?php

include('../config/koneksi.php');
require '../vendor/autoload.php';

// // // reference the Dompdf namespace
use Dompdf\Dompdf;

// // // instantiate and use the dompdf class
$dompdf = new Dompdf(); 

$html = '<style>
table, th, td {
    padding: 5px;
    vertical-align: top;
}

.judul {
    margin-bottom: 0px;
    font-size:16px;
    font-weight: bold;
}
</style>

<img src="../assets/img/logo.png" style="float:left; height: 75px; margin-left:20px">

<div style="text-align:center; margin-left:-50px">
    <div style="font-size: 20px">PEMERINTAH KABUPATEN TULUNGAGUNG</div>
    <div style="font-size:20px">KECAMATAN PAKEL</div>
    <div style="font-size:20px">DESA PAKEL</div>
    <div style="margin_left:90px; font-size: 16px">Dusun Krajan, Pakel, Pakel, Kabupaten Tulungagung, Jawa Timur 68472</div>
</div>

<hr style="border: 1.5px solid black; margin: 10px 5px 3px 5px;">
<hr style="border: 0.5px solid black; margin: 3px 5px 10px 5px;">


';

$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar where id = '$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

$sql_nilai = "SELECT * FROM nilai where pendaftar_id = '$id_pendaftar'";
$result_nilai = mysqli_query($koneksi, $sql_nilai);
$data_nilai = mysqli_fetch_array($result_nilai);

// cek hasil
if(!$result_nilai) {
    die('Query Error : '. mysqli_error($koneksi));
}


if($data_pendaftar['foto'] != '') {
    $gambar = '../uploads/' . $data_pendaftar['foto'];
} else {
    $gambar = '../assets/img/avatar.jpg';
}

if($data_pendaftar['jenis_kelamin'] == 'L') {
    $kelamin = "Laki-Laki";
} else {
    $kelamin = "Perempuan";
}

if($data_nilai['status'] == 0) {
    $status = "Pendaftaran Belum Dinilai";
} else if($data_nilai['status'] == 1) {
    $status = "LOLOS PENDAFTARAN";
} else {
    $status = "TIDAK LOLOS PENDAFTARAN";
}

$html .= '
<h3 class="" style="text-align:center;">SURAT KETERANGAN KELAHIRAN</h3>
<p class="" style="text-align:center; margin-top:-10px;">No. : 210/SE/'. $data_nilai['nilai_uts_1'] .'/2021</p>

<p style="margin-bottom:1px">Yang bertanda tangan dibawah ini kami Kepala Desa Pakel Kecamatan Pakel Kabupaten Tulungagung, dengan ini menerangkan bahwa : </p>

<table width="100%" style="">
    <tr >
        <td width="20%">Nama</td>
        <td width="1%">:</td>
        <td width="100%">Hedi Santosa, S.Si</td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>'. $data_pendaftar['tmpt_lahir'] .', '. $data_pendaftar['tgl_lahir'] .'</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>'. $kelamin .'</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>Swasta</td>
    </tr>
    <tr>
        <td width="0%">Alamat</td>
        <td width="0%">:</td>
        <td width="0%">RT 12 RW 21, Krajan, Pakel, Pakel, Tulungagung</td>
    </tr>
    
</table>

<p style="margin-bottom:1px">Adalah anak dari : </p>


<table width="100%" style="">

    <tr>
        
        <td width="30%">Nama Ayah kandung</td>
        <td width="1%">:</td>
        <td width="60%">' . $data_pendaftar['nama'] . '</td>
        
    </tr>
    
    <tr>
        
        <td width="16%">Nama Ibu Kandung</td>
        <td width="1%">:</td>
        <td width="60%">' . $data_pendaftar['nama'] . '</td>
        
    </tr>


    <tr>
        <td width="0%">Anak ke</td>
        <td width="0%">:</td>
        <td width="0%">2</td>
    </tr>
   
</table>




<!--
<h3 class="judul">B. DATA NILAI PENDAFTAR</h3>

<table>
    <tr>
        <td width="100px">Nilai Uts 1</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_uts_1'] .'</td>
    </tr>
    <tr>
        <td>Nilai US</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_us'] .'</td>
    </tr>
    <tr>
        <td>Nilai UN</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_un'] .'</td>
    </tr>
    <tr>
        <td>RATA"</td>
        <td>:</td>
        <td>'. number_format(($data_nilai['nilai_uts_1'] + $data_nilai['nilai_us'] + $data_nilai['nilai_un']) / 3, 2) .'</td>
    </tr>
    <tr>
        <td>HASIL</td>
        <td>:</td>
        <td><b>'.$status.'</b></td>
    </tr>
</table>
-->
<br>
<p style="margin-top:-5px">Demikian surat keterangan kelahiran ini dibuat untuk dapat dipergunakan seperlunya.</br></p>
<br>

<p align=right style=" margin-right:55px">Pakel, '. date("d-m-Y") .' </p>
<p align=right style=" margin-bottom:0px">Kepala Desa / Lurah Pakel</p>

<!-- <img src="../assets/img/ttd.png" width="90px" style="margin-right:40px" align=right> -->
<br> <br> <br>
<p style="margin-right:30px" align=right>Hedi Santosa,S.Si</p>


';

$dompdf->loadHtml($html);

// // // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// // // Render the HTML as PDF
$dompdf->render();

// // // Output the generated PDF to Browser
$dompdf->stream("data pendaftar.pdf", array("Attachment"=>0));
?>

