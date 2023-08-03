<?php
require('../include/fpdf186/fpdf.php');
include '../include/conn.php';

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../include/img/icon.png', 10, 10, 30);
        $this->SetFont('Arial', 'B', 14);
        $printTime = date('d-m-Y H:i:s');
        $this->Cell(190, 10, "Print Laporan Transaksi '$printTime'", 0, 1, 'C');
        $this->Ln(15);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(15, 15, 'ID', 1, 0, 'C');
        $this->Cell(40, 15, 'Nama Peminjam', 1, 0, 'C');
        $this->Cell(50, 15, 'Judul Buku', 1, 0, 'C');
        $this->Cell(30, 15, 'TGL Pinjam', 1, 0, 'C');
        $this->Cell(30, 15, 'TGL Kembali', 1, 0, 'C');
        $this->Cell(25, 15, 'Status', 1, 1, 'C');
    }


    function Row($data)
    {
        $this->SetFont('Arial', '', 8);
        $rowHeight = 8;
        $this->Cell(15, $rowHeight, $data['id'], 1, 0, 'C');
        $this->Cell(40, $rowHeight, $data['nama_peminjam'], 1, 0, 'L');
        $this->Cell(50, $rowHeight, $data['judul_buku'], 1, 0, 'L');
        $this->Cell(30, $rowHeight, $data['tanggal_meminjam'], 1, 0, 'C');
        $this->Cell(30, $rowHeight, $data['tanggal_pengembalian'], 1, 0, 'C');
        $this->Cell(25, $rowHeight, ($data['status_pengembalian'] ? 'Sudah' : 'Belum'), 1, 1, 'C');
    }
}

$pdf = new PDF();
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$query = "SELECT * FROM transaction";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Row($row);
    }
} else {
    $pdf->Cell(190, 10, 'Tidak ada data transaksi.', 1, 1, 'C');
}

$pdf->Output();
