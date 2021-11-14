<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Count extends Render_Controller
{
  public function index()
  {
    // Page Settings
    $this->title = 'Data Count';
    $this->navigation = ['Perhitungan Suara'];
    $this->plugins = ['datatables', 'plot'];

    // Breadcrumb setting
    $this->breadcrumb_1 = 'Dashboard';
    $this->breadcrumb_1_url = base_url();
    $this->breadcrumb_4 = 'Count';
    $this->breadcrumb_4_url = base_url() . 'admin/count/list';
    // content
    $this->content      = 'admin/count/list';

    // Send data to view
    $this->render();
  }

  public function ajax_data()
  {
    $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
    $start = $this->input->post('start');
    $draw = $this->input->post('draw');
    $draw = $draw == null ? 1 : $draw;
    $length = $this->input->post('length');
    $cari = $this->input->post('search');

    if (isset($cari['value'])) {
      $_cari = $cari['value'];
    } else {
      $_cari = null;
    }

    $kategori = $this->input->post('kategori');
    $kelas = $this->input->post('kelas');
    $filter = [
      'kategori' => $kategori,
      'kelas' => $kelas,
    ];

    $data = $this->model->getAllData($draw, $length, $start, $_cari, $order, $filter)->result_array();
    $count = $this->model->getAllData(null, null, null, $_cari, $order, $filter)->num_rows();

    $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
  }

  public function export_excel()
  {
    // data body

    $details = $this->model->getAllCount();
    $bulan_array = [
      1 => 'Januari',
      2 => 'February',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember',
    ];
    $today_m = (int)Date("m");
    $today_d = (int)Date("d");
    $today_y = (int)Date("Y");

    $last_date_of_this_month =  date('t', strtotime(date("Y-m-d")));

    $date = $today_d . " " . $bulan_array[$today_m] . " " . $today_y;

    // laporan baru
    $row = 1;
    $col_start = "A";
    $col_end = "D";
    $title_excel = "Rekapitulasi_Hasil_Perhitungan_Suara";
    // Header excel ================================================================================================
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Dokumen Properti
    $spreadsheet->getProperties()
      ->setCreator("KPU DKM")
      ->setLastModifiedBy("Isep Lutpi Nur")
      ->setTitle($title_excel)
      ->setSubject("Isep Lutpi Nur")
      ->setDescription("LIst Company $date")
      ->setKeywords("Laporan, Report")
      ->setCategory("Laporan, Report");
    // set default font
    $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(11);


    // header 2 ====================================================================================================
    $row += 1;
    $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
      ->setCellValue("A$row", "Rekapitulasi Hasil Perhitungan Suara");
    $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
      "font" => [
        "bold" => true,
        "size" => 13
      ],
      "alignment" => [
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
      ],
    ]);

    // Tabel =======================================================================================================
    // Tabel Header
    $row += 2;
    $styleArray = [
      'font' => [
        'bold' => true,
      ],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
      ],
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
      ],
      'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => [
          'rgb' => '93C5FD',
        ]
      ],
    ];
    $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);
    $row++;
    $styleArray['fill']['startColor']['rgb'] = 'E5E7EB';
    $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);

    // poin-poin header disini
    $headers = [
      'No',
      'No Urut',
      'Nama',
      'Jumlah Suara'
    ];

    // apply header
    for ($i = 0; $i < count($headers); $i++) {
      $sheet->setCellValue(chr(65 + $i) . ($row - 1), $headers[$i]);
      $sheet->setCellValue(chr(65 + $i) . $row, ($i + 1));
    }

    // tabel body
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '000000'],
        ],
      ],
      "alignment" => [
        'wrapText' => TRUE,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP
      ]
    ];
    $start_tabel = $row + 1;
    foreach ($details as $detail) {
      $c = 0;
      $row++;
      $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->no_urut);
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->nama);
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->jumlah_suara);
    }
    // format
    // nomor center
    $sheet->getStyle($col_start . $start_tabel . ":" . $col_start . $row)
      ->getAlignment()
      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // border all data
    $sheet->getStyle($col_start . $start_tabel . ":" . $col_end . $row)
      ->applyFromArray($styleArray);

    // $code_rm = '_-[$RM-ms-MY]* #.##0,00_-;-[$RM-ms-MY]* #.##0,00_-;_-[$RM-ms-MY]* "-"??_-;_-@_-';
    // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);
    // $sheet->getStyle("G" . $start_tabel . ":" . "G" . $row)
    //     ->getNumberFormat()
    //     ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    // $sheet->getStyle("I" . $start_tabel . ":" . "I" . $row)
    //     ->getNumberFormat()
    //     ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    // // set alignment
    // $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
    // $sheet->getStyle("B" . $start_tabel . ":" . "B" . $row)->getAlignment()->setHorizontal('center');
    // $sheet->getStyle("C" . $start_tabel . ":" . "C" . $row)->getAlignment()->setHorizontal('center');
    // $sheet->getStyle("C" . $start_tabel . ":D" . $row)
    //     ->getAlignment()
    //     ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

    // footer
    // $row += 3;
    // $sheet->setCellValue("Q" . $row, "Kasui, $date");

    // $row += 3;
    // $sheet->setCellValue("Q" . $row, "(.....................................)");

    $row += 2;
    // waktu dan tangggal
    $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
      ->setCellValue("A$row", "Rincian Data Pemilihan:");

    $row++;
    $sheet->mergeCells($col_start . $row . ":B" . $row)
      ->setCellValue("A$row", "Total Pemilih");
    $sheet->mergeCells("C" . $row . ":" . $col_end . $row)
      ->setCellValue("C$row", ": {$this->pemilih} Orang");

    $row++;
    $sheet->mergeCells($col_start . $row . ":B" . $row)
      ->setCellValue("A$row", "Sudah Pilih");
    $sheet->mergeCells("C" . $row . ":" . $col_end . $row)
      ->setCellValue("C$row", ": {$this->sudahPilih} Orang");

    $row++;
    $sheet->mergeCells($col_start . $row . ":B" . $row)
      ->setCellValue("A$row", "Belum Pilih");
    $sheet->mergeCells("C" . $row . ":" . $col_end . $row)
      ->setCellValue("C$row", ": {$this->belumPilih} Orang");

    $row += 2;
    // waktu dan tangggal
    $tanggal = date("d-m-Y H:i:s");
    $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
      ->setCellValue("A$row", "Data ini diambil pada tanggal dan waktu: $tanggal");

    // function for width column
    function w($width)
    {
      return 0.71 + $width;
    }


    // set width column
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(w(8));
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

    // set  printing area
    $spreadsheet->getActiveSheet()->getPageSetup()->setPrintArea($col_start . '1:' . $col_end . $row);
    $spreadsheet->getActiveSheet()->getPageSetup()
      ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
    $spreadsheet->getActiveSheet()->getPageSetup()
      ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

    // margin
    $spreadsheet->getActiveSheet()->getPageMargins()->setTop(1);
    $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0);
    $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0);
    $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0);

    // page center on
    $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
    $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

    // $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    // $writer->save($title_excel);
    // header("Location: " . base_url($title_excel));
    $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);


    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $title_excel . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }

  public function export_pdf()
  {
    // document name
    $doc_name = "Rekapitulasi_Hasil_Perhitungan_Suara";

    // set table header
    $headers = [
      'No',
      'No Urut',
      'Nama',
      'Jumlah Suara'
    ];
    $thead_title = '';
    $thead_number = '';
    foreach ($headers as $i => $head) {
      $num = $i + 1;
      $thead_title .= "<th style=\"text-align:center\">$head</th>";
      $thead_number .= "<th style=\"background-color:#E5E7EB; text-align:center; padding-top:2px; padding-bottom:2px;\">$num</th>";
    }
    $thead_title = "<tr>$thead_title</tr>";
    $thead_number = "<tr>$thead_number</tr>";
    // set body table
    // data body
    $order = [
      'order' => $this->input->post('order'),
      'columns' => $this->input->post('columns')
    ];
    $details = $this->model->getAllCount();
    $body_table = '';
    foreach ($details as $i => $detail) {
      $num = $i + 1;
      $body_table .= '<tr>';
      $body_table .= "<td style=\"text-align:center\">{$num}</td>";
      $body_table .= "<td>{$detail->no_urut}</td>";
      $body_table .= "<td>{$detail->nama}</td>";
      $body_table .= "<td>{$detail->jumlah_suara}</td>";
      $body_table .= '</tr>';
    }


    // insert html
    $tanggal = date("d-m-Y H:i:s");
    $body_head = '<div style="text-align:center">';
    $build_html = '
                      <h3><span style="text-align:center; ">Rekapitulasi Hasil Perhitungan Suara</span></h3>' . "
      <table>
      $thead_title
      $thead_number
      $body_table
      </table>
      <br>
      <table style='padding:2px; background-color:white; width:auto; border:0'>
      <tr>
        <td style='padding:2px; background-color:white; width:auto; border:0' colspan=\"2\">Rincian Data Pemilihan:</td>
      </tr>
      <tr>
        <td style='padding:2px; background-color:white; width:auto; border:0'>Total Pemilih</td>
        <td style='padding:2px; background-color:white; width:auto; border:0'>: {$this->pemilih} Orang</td>
      </tr>
      <tr>
        <td style='padding:2px; background-color:white; width:auto; border:0'>Sudah Pilih</td>
        <td style='padding:2px; background-color:white; width:auto; border:0'>: {$this->sudahPilih} Orang</td>
      </tr>
      <tr>
        <td style='padding:2px; background-color:white; width:auto; border:0'>Belum Pilih</td>
        <td style='padding:2px; background-color:white; width:auto; border:0'>: {$this->belumPilih} Orang</td>
      </tr>
    </table>
      <br>
      <span style='text-align:left'>Data ini diambil pada tanggal dan waktu: $tanggal</span>
      ";

    $footer = '</div>';
    $this->create_pdf([
      'html' => $body_head . $build_html . $footer,
      'doc_name' => $doc_name,
      'orientation' => 'potrait'
    ]);
  }

  public function plot()
  {
    $result = $this->model->plot();
    $this->output_json($result);
  }

  function __construct()
  {
    parent::__construct();
    $this->sesion->cek_session();
    $akses = ['Super Admin'];
    $get_lv = $this->session->userdata('data')['level'];
    // if (!in_array($get_lv, $akses)) {
    //   redirect('my404', 'refresh');
    // }
    $this->id = $this->session->userdata('data')['id'];
    $this->photo_path = './files/admin/pemilih/';
    $this->load->model("admin/CountModel", 'model');
    $this->load->model("DashboardModel", 'dashboard');
    $this->pemilih = $this->dashboard->jumlahPemilih();
    $this->sudahPilih = $this->dashboard->jumlahsudahPilih();
    $this->belumPilih =  $this->pemilih - $this->sudahPilih;


    $this->default_template = 'templates/dashboard';
    $this->load->library('plugin');
    $this->load->helper('url');
  }
}
