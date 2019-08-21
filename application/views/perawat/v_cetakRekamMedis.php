<?php

//include master file
include $_SERVER["DOCUMENT_ROOT"]."/POS/vendor/PDF/fpdf.php";
// include ('PDF/fpdf.php');
ob_start();
class RekamMedis extends FPDF{


    function kop($teks1, $teks2, $teks3){
        $this->Cell(5);
        $this->SetFont('arial','B','12');
        $this->Cell(0,6,$teks1,0,1,'C');
        $this->Cell(5);
        $this->SetFont('arial','B','14');
        $this->Cell(0,6,$teks2,0,1,'C');
        $this->Cell(5);
        $this->SetFont('arial','B','12');
        $this->Cell(0,6,$teks3,0,1,'C');
    }

    function gariskop(){
        $this->SetLineWidth(1);
        $this->Line(8,29,140,29);
        $this->SetLineWidth(0);
        $this->Line(8,30,140,30);
    }

    function spasi2($teks1){
        $this->SetLeftMargin(8);
        $this->SetRightMargin(8);
        $this->SetFont('arial','','10');
        $this->MultiCell(0,7,$teks1,0,'J');
    }

}
//instantisasi objek
$pdf = new RekamMedis();

//Mulai dokumen
$pdf->AddPage('P', 'A5');
//meletakkan judul disamping logo diatas
$pdf->kop('REKAM MEDIS', 'SENYUM SEHAT DENTAL CARE','drg. MUNADIYAH ASY SYAHIDAH');
//membuat garis ganda tebal dan tipis
$pdf->gariskop();

$pdf->SetWidths(array(28,5,35,30,5,35 ));
$pdf->spasi2('');

foreach($pasien as $a){
    $pdf->Row(array('No Pasien',':', $a->no_pasien, 'Riwayat Alergi', ':', $a->riwayat_alergi));
    $pdf->Row(array('Nama',':', $a->nama, 'Penyakit',':', $a->penyakit));
    $pdf->Row(array('Tanggal Lahir',':', $a->tgl_lahir, 'No HP',':', $a->no_hp));
    $pdf->Row(array('Umur',':', $a->umur. ' tahun'));
    $pdf->Row(array('Alamat',':', $a->alamat));
    $pdf->Row(array('Pekerjaan',':', $a->pekerjaan));

$pdf->spasi2(''); 
$pdf->SetFont('arial','B','10'); 
$pdf->SetWidths(array(30,40,40,22)); 

    $pdf->Row1(array('Tanggal', 'Keluhan', 'Diagnosa-Terapi', 'Ket'));
    $pdf->SetFont('arial','','10');

foreach($rekam_medis as $c){
    $pdf->Row1(array(format_tgl($c->tanggal), $c->keluhan, $c->diagnosa, $c->keterangan));
}

$pdf->Output();
}
?>
