<?php

//include master file
include $_SERVER["DOCUMENT_ROOT"]."/POS/vendor/PDF/fpdf.php";
// include ('PDF/fpdf.php');
ob_start();
class KartuBerobat extends FPDF{


    function kop($teks1, $teks2, $teks3){
        $this->Cell(10);
        $this->SetFont('arial','B','18');
        $this->Cell(0,8,$teks1,0,1,'C');
        $this->Cell(10);
        $this->SetFont('arial','B','20');
        $this->Cell(0,8,$teks2,0,1,'C');
        $this->Cell(10);
        $this->SetFont('arial','B','18');
        $this->Cell(0,10,$teks3,0,1,'C');
    }

    function gariskop(){
        $this->SetLineWidth(1);
        $this->Line(13,58,197,58);
        $this->SetLineWidth(0);
        $this->Line(13,59,197,59);
    }

    function spasi1($teks1){
        $this->SetFont('arial','','20');
        $this->MultiCell(0,20,$teks1,0,'J');
    }

    function spasi2($teks1){
        $this->SetLeftMargin(30);
        $this->SetRightMargin(25);
        $this->SetFont('arial','','20');
        $this->MultiCell(0,15,$teks1,0,'J');
    }
    function spasi3($teks1){
        $this->SetLeftMargin(30);
        $this->SetRightMargin(25);
        $this->SetFont('arial','','20');
        $this->MultiCell(0,10,$teks1,0,'J');
    }

}
//instantisasi objek
$pdf = new KartuBerobat();

//Mulai dokumen
$pdf->AddPage('l', 'A5');
$pdf->spasi1('');
//meletakkan judul disamping logo diatas
$pdf->kop('KARTU BEROBAT', 'SENYUM SEHAT DENTAL CARE','drg. MUNADIYAH ASY SYAHIDAH');
//membuat garis ganda tebal dan tipis
$pdf->gariskop();

$pdf->SetWidths(array(45,5,100));
$pdf->spasi2('');
foreach($pasien as $u){
    $pdf->Row(array('No Pasien',':',$u->no_pasien));
    $pdf->spasi3('');
    $pdf->Row(array('Nama',':',$u->nama));
    $pdf->spasi3('');
    $pdf->Row(array('Alamat',':',$u->alamat));

$pdf->Output();
}
?>
