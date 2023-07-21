<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Selamat Datang',
            'tanggal' => Carbon::now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, Do MMMM YYYY'),
        ];

        return view('welcome', $data);
    }

    public function submit()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_tamu');

        $validation = $this->validate([
            'nama' => 'required|min_length[3]',
            'no_hp' => 'required|min_length[10]|max_length[13]',
            'keperluan' => 'required|min_length[5]',
            'dengan' => 'required|min_length[5]'
        ]);

        if (!$validation) {
            session()->setFlashdata('gagal', 'Periksa kembali inputan anda. Mohon input data dengan benar.');
            return redirect()->to(base_url('/'));
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'no_hp' => $this->request->getVar('no_hp'),
                'keperluan' => $this->request->getVar('keperluan'),
                'dengan' => $this->request->getVar('dengan')
            ];

            $builder->insert($data);

            session()->setFlashdata('sukses', 'Terima kasih sudah mengisi buku tamu. Silahkan menunggu.');
            return redirect()->to(base_url('/'));
        }
    }

    public function rekap()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_tamu');

        $get = $builder->orderBy('tanggal', 'DESC')->get()->getResult();

        $data = [
            'title' => 'Rekap Buku Tamu',
            'data' => $get
        ];

        return view('/rekap', $data);
    }

    public function export()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('daftar_tamu');

        $get = $builder->orderBy('tanggal', 'DESC')->get()->getResult();

        $fileName = 'Rekap';

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama');
        $activeWorksheet->setCellValue('C1', 'No HP');
        $activeWorksheet->setCellValue('D1', 'Keperluan');
        $activeWorksheet->setCellValue('E1', 'Dengan Siapa');
        $activeWorksheet->setCellValue('F1', 'Tanggal');
        $row = 2;
        $no = 1;

        foreach ($get as $data) {
            $activeWorksheet->setCellValue('A' . $row, $no++);
            $activeWorksheet->setCellValue('B' . $row, $data->nama);
            $activeWorksheet->setCellValue('C' . $row, $data->no_hp);
            $activeWorksheet->setCellValue('D' . $row, $data->keperluan);
            $activeWorksheet->setCellValue('E' . $row, $data->dengan);
            $activeWorksheet->setCellValue('F' . $row, $data->tanggal);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
