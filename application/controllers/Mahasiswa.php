<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_mahasiswa');
    }

    public function index()
    {
        $data = ['mahasiswa' => $this->model_mahasiswa->getAll()];
        $this->load->view('mahasiswa/index', $data);
    }

    // public function export()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $spreadsheet->getProperties()->setCreator('Gun Gun Priatna - re:code lab')
    //         ->setLastModifiedBy('Gun Gun Priatna - re:code lab')
    //         ->setTitle('Tes Export Excel')
    //         ->setSubject('Tes Export Excel')
    //         ->setDescription('Tes Export Excel')
    //         ->setKeywords(' Tes Export Excel')
    //         ->setCategory('Test export excel');

    // //Add data
    //     $spreadsheet->setActiveSheetIndex(0)
    //         ->setCellValue('A1', 'NIM')
    //         ->setCellValue('B1', 'Nama')
    //         ->setCellValue('C1', 'Jenis Kelamin')
    //         ->setCellValue('D1', 'Tempat Lahir')
    //         ->setCellValue('E1', 'Tanggal Lahir')
    //         ->setCellValue('F1', 'Alamat');

    //     $i = 2;

    //     $mahasiswa = $this->model_mahasiswa->getAll();

    //     foreach ($mahasiswa as $row) {
    //         $spreadsheet->setActiveSheetIndex(0)
    //             ->setCellValue('A' . $i, $row->nim)
    //             ->setCellValue('B' . $i, $row->nama)
    //             ->setCellValue('C' . $i, $row->jenis_kelamin)
    //             ->setCellValue('D' . $i, $row->tempat_lahir)
    //             ->setCellValue('F' . $i, $row->tanggal_lahir)
    //             ->setCellValue('G' . $i, $row->alamat);
    //         $i++;
    //     }

    //     $spreadsheet->getActiveSheet()->setTitle('Report Excel' . date('Y-m-d'));
    //     $spreadsheet->setActiveSheetIndex(0);

    //     $filename = sha1(date("Y-m-d H:i:s")) . '-report-excel.xlsx';

    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save('excel/' . $filename);
        
    // }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Gun Gun Priatna - re:code lab')
            ->setLastModifiedBy('Gun Gun Priatna - re:code lab')
            ->setTitle('Tes Export Excel')
            ->setSubject('Tes Export Excel')
            ->setDescription('Tes Export Excel')
            ->setKeywords(' Tes Export Excel')
            ->setCategory('Test export excel');

    //Add data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NIM')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Jenis Kelamin')
            ->setCellValue('D1', 'Tempat Lahir')
            ->setCellValue('E1', 'Tanggal Lahir')
            ->setCellValue('F1', 'Alamat');

        $i = 2;

        $mahasiswa = $this->model_mahasiswa->getAll();

        foreach ($mahasiswa as $row) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $row->nim)
                ->setCellValue('B' . $i, $row->nama)
                ->setCellValue('C' . $i, $row->jenis_kelamin)
                ->setCellValue('D' . $i, $row->tempat_lahir)
                ->setCellValue('F' . $i, $row->tanggal_lahir)
                ->setCellValue('G' . $i, $row->alamat);
            $i++;
        }

        $spreadsheet->getActiveSheet()->setTitle('Report Excel' . date('Y-m-d'));
        $spreadsheet->setActiveSheetIndex(0);

      
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
        header('Cache-Control: max-age=0');

        header('Cache-Control: max-age=1');


        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;

    }
}