<?php

//include master file
include $_SERVER["DOCUMENT_ROOT"]."/POS/vendor/PDF/fpdf.php";
// include ('PDF/fpdf.php');
ob_start();
class Kwitansi extends FPDF{


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
        $this->Line(13,29,135,29);
        $this->SetLineWidth(0);
        $this->Line(13,30,135,30);
    }

    function spasi2($teks1){
        $this->SetLeftMargin(13);
        $this->SetRightMargin(13);
        $this->SetFont('arial','','11');
        $this->MultiCell(0,7,$teks1,0,'J');
    }

    function paragraf($teks1){
        $this->SetLeftMargin(13);
        $this->SetRightMargin(13);
        $this->SetFont('arial','','11');
        $this->MultiCell(0,5,$teks1,0,'J');
    }

    function ttd($teks1, $teks2, $teks3){
        $this->SetLeftMargin(105);
        $this->SetRightMargin(13);
        $this->SetFont('arial','','11');
        $this->Cell(0,5,$teks1,0,1,'');
        $this->Cell(0,5,$teks2,0,1,'');
        $this->Ln(20);
        $this->SetFont('arial','','11');
        $this->Cell(0,5,$teks3,0,1,'');
    }
}
//instantisasi objek
$pdf = new Kwitansi();

//Mulai dokumen
$pdf->AddPage('P', 'A5');
//meletakkan judul disamping logo diatas
$pdf->kop('KWITANSI PERAWATAN', 'SENYUM SEHAT DENTAL CARE','drg. MUNADIYAH ASY SYAHIDAH');
//membuat garis ganda tebal dan tipis
$pdf->gariskop();

$pdf->SetWidths(array(25,5,35,25,5,35));
$pdf->spasi2('');

foreach($no_faktur as $a){
    $pdf->Row(array('No Fakur',':',$a->no_faktur,'No Pasien',':',$a->no_pasien));
    $pdf->Row(array('Nama',':',$a->nama, 'Umur',':',$a->umur. ' tahun'));
    $pdf->Row(array('Alamat',':',$a->alamat));
$pdf->spasi2('');  

$pdf->SetWidths(array(40,45,15,20)); 
foreach($rangPembayaran as $b){
    $pdf->Row1(array('Bahan', $b->nama_bahan, $b->jumlah, number_format($b->harga_jual)));
}   
foreach($rangkuman as $c){
    $pdf->Row1(array('Jenis Perawatan', $c->jenis_perawatan, '', number_format($c->biaya)));
    $pdf->Row1(array('Regio', $c->regio, '', ''));
    $pdf->Row1(array('Total', '', '', number_format($c->total)));
$pdf->spasi2(''); 

$pdf->paragraf('Telah di terima dari Tn/Ny/Nn '.$a->nama.' uang sebesar Rp'.number_format($c->total).' untuk biaya perawatan gigi tersebut di atas.');
$pdf->spasi2('');  
}

$pdf->ttd('Penerima', $this->session->userdata("akses").',', $this->session->userdata("name"));
 
$pdf->Output();
}
?>
