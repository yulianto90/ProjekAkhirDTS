<?php

//include master file
include $_SERVER["DOCUMENT_ROOT"]."/POS/vendor/PDF/fpdf.php";
// include ('PDF/fpdf.php');
ob_start();
class NoAntrian extends FPDF{


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
        $this->Line(13,48,197,48);
        $this->SetLineWidth(0);
        $this->Line(13,49,197,49);

    }

    function spasi1($teks1){
        $this->SetFont('arial','','20');
        $this->MultiCell(0,10,$teks1,0,'J');
    }

    function spasi2($teks1){
        $this->SetLeftMargin(30);
        $this->SetRightMargin(25);
        $this->SetFont('arial','','150');
        $this->MultiCell(0,60,$teks1,0,'C');
    }

    function spasi3($teks1){
        $this->SetLeftMargin(30);
        $this->SetRightMargin(25);
        $this->SetFont('arial','','20');
        $this->MultiCell(0,10,$teks1,0,'C');
    }

    function spasi4($teks1){
        $this->SetLeftMargin(30);
        $this->SetRightMargin(25);
        $this->SetFont('arial','','16');
        $this->MultiCell(0,6,$teks1,0,'C');
    }
}
//instantisasi objek
$pdf = new NoAntrian();

//Mulai dokumen
$pdf->AddPage('l', 'A5');
$pdf->spasi1('');
//meletakkan judul disamping logo diatas
$pdf->kop('ANTRIAN PASIEN', 'SENYUM SEHAT DENTAL CARE','drg. MUNADIYAH ASY SYAHIDAH');
//membuat garis ganda tebal dan tipis
$pdf->gariskop();

foreach($antrian as $u){
    $pdf->spasi3('');
    $pdf->spasi2($u->no_antrian);
    $pdf->spasi4(format_waktu($u->waktu));    
    $pdf->spasi4('Senyum Semangat dengan Gigi Sehat');  
}
$pdf->Output();
?>
