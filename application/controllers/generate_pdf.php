<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/generate_pdf.php'; // Tidak perlu memasukkan file generate_pdf.php ke dalam controller

class YourController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Panggil fungsi generate_pdf() ketika halaman diakses
        $this->generate_pdf();
    }

    public function generate_pdf() {
        // Isi skrip TCPDF di sini
        // Pastikan untuk menyesuaikan data yang dibutuhkan untuk PDF
        
        // $data tidak bisa langsung diakses di sini karena generate_pdf.php tidak memiliki akses ke variabel $data dari detail.php

        // Inisialisasi TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Atur properti PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Your Title');
        $pdf->SetSubject('Your Subject');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Tambahkan halaman
        $pdf->AddPage();

        // Tambahkan konten ke PDF
        $html = '
            <h1>Sample Title</h1>
            <p>Sample content...</p>
        ';

        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF ke browser
        $pdf->Output('example.pdf', 'D'); // 'D' untuk mendownload, 'I' untuk tampilkan di browser
    }

}
?>
