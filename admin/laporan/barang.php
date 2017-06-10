<?php
include '../../xtcpdf.php';
include "../../koneksi.php";
set_time_limit(300000);
$posisi = isset($_GET['posisi']) && $_GET['posisi'] !='' ? $_GET['posisi'] : 'P';
$pdf = new XTCPDF($posisi, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mizno Kruge');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
//$pdf->SetHeaderData($logo,20, '','');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
#$pdf->SetDisplayMode($zoom='fullpage', $layout='TwoColumnRight', $mode='UseNone');
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setPrintFooter(FALSE);
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 28, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);
//---------------------------------------------------------- config end ---------------------------------------------------------------------------

$result = $koneksi->query("select * from master_brg");

$html = '<center><h1>Laporan Buku</h1></center>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
$html .= '<tr>';
$html .= '<td width="50">ID</td>';
$html .= '<td width="100">DDC</td>';
$html .= '<td width="100">Kode Register</td>';
$html .= '<td>Judul</td>';
$html .= '<td>Pengarang</td>';
$html .= '</tr>';
$no = 1;
while ($r = $result->fetch_array()) {
    $html .= '<tr>';
    $html .= '<td>' . $r['merk'] . '</td>';
    $html .= '<td>' . $r['nama_barang'] . '</td>';
    $html .= '<td>' . $r['merk'] . '</td>';
    $html .= '<td>' . $r['merk'] . '</td>';
    $html .= '<td>' . $r['merk'] . '</td>';
    $html .= '</tr>';
}
$html .= '</table>';
$pdf->writeHTML($html);
//$pdf->lastPage();
$pdf->Output('Laporan Koleksi.pdf', 'I');
//I: output ke browser
//D: Download
//F: output ke file di server
