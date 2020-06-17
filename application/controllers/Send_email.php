<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'juwendays@gmail.com',  // Email gmail
            'smtp_pass'   => 'kosong77',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@udinus.com', 'udinus.com');

        // Email penerima
        $this->email->to('juwendays@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('File.png');

        // Subject email
        $this->email->subject('SMA 10 Semarang || Penerimaan peserta didik baru');

        // Isi email
        $this->email->message("Selamat anda diterima sebagai peserta didik baru di SMAN 10 Semarang.<br><br> Klik <strong><a>www.sman10-smg.sch.ida</a></strong> untuk melihat data peserta didik baru baru.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}