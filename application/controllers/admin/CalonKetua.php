<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CalonKetua extends Render_Controller
{
  public function index()
  {
    // Page Settings
    $this->title = 'Calon Ketua';
    $this->navigation = ['Calon Ketua'];
    $this->plugins = ['datatables'];

    // Breadcrumb setting
    $this->breadcrumb_1 = 'Dashboard';
    $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
    $this->breadcrumb_2 = 'Users';
    $this->breadcrumb_2_url = '#';
    $this->breadcrumb_3 = 'Users';
    $this->breadcrumb_3_url = base_url() . 'admin/CalonKetua';
    $this->content      = 'admin/calon_ketua/list';

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

    $partner = $this->input->post('partner');
    $filter = [
      'partner' => $partner,
    ];

    $data = $this->model->getAllData($draw, $length, $start, $_cari, $order, $filter)->result_array();
    $count = $this->model->getAllData(null, null, null, $_cari, $order, null, $filter)->num_rows();

    $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
  }

  public function simpan()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('id', 'id Calon', 'trim|required|numeric');
    $this->form_validation->set_rules('npm', 'npm', 'trim|required');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('no_urut', 'No Urut', 'trim|required|numeric');
    $this->form_validation->set_rules('visi', 'Visi', 'trim|required');
    $this->form_validation->set_rules('misi', 'Misi', 'trim|required');
    $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->output_json([
        'status' => false,
        'data' => null,
        'message' => validation_errors()
      ], 400);
    } else {
      $id = $this->input->post('id');
      $npm = $this->input->post('npm');
      $nama = $this->input->post('nama');
      $no_urut = $this->input->post('no_urut');
      $visi = $this->input->post('visi', false);
      $misi = $this->input->post('misi', false);
      $status = $this->input->post('status');
      $is_ubah = $this->input->post('is-ubah:');

      $result = $this->model->simpan($id, $npm, $nama, $no_urut, $visi, $misi, $status, $is_ubah);

      $code = $result != null ? 200 : 400;
      $status = $result != null;
      $this->output_json([
        'status' => $status,
        'length' => 1,
        'data' =>  $result,
        'message' => $status ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan'
      ], $code);
    }
  }


  public function tambah($id = null)
  {
    // Page Settings
    $this->title = is_null($id) ? 'Tambah Calon ketua' : 'Ubah Calon ketua';
    $this->navigation = ['Calon Ketua'];
    $this->plugins = ['datatables', 'select2', 'summernote'];

    // Breadcrumb setting
    $this->breadcrumb_1 = 'Dashboard';
    $this->breadcrumb_1_url = base_url() . 'admin/dashboard';
    $this->breadcrumb_2 = 'Calon Ketua';
    $this->breadcrumb_2_url = base_url() . 'admin/CalonKetua';
    $this->breadcrumb_3 = 'Tambah';
    $this->breadcrumb_3_url = base_url() . 'admin/CalonKetua/tambah';
    $this->data['isUbah'] = $id != null;

    // content
    $this->content      = 'admin/calon_ketua/tambah';

    $ceknew = $this->model->cekNew($id);
    if ($ceknew == null) {
      redirect('/admin/calon_ketua/profile');
      return;
    }


    $this->data['getID'] = $ceknew['id'];
    $this->data['profile'] = $ceknew;
    $this->data['isUbah'] = $id != null;

    // Send data to view
    $this->render();
  }


  public function delete()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
    $this->form_validation->set_rules('id_calon', 'Id Calon', 'trim|required|numeric');
    if ($this->form_validation->run() == FALSE) {
      $this->output_json([
        'status' => false,
        'data' => null,
        'message' => validation_errors()
      ], 400);
    } else {
      $id = $this->input->post('id_calon');
      $result = $this->model->delete($id);

      $code = $result != null ? 200 : 400;
      $status = $result != null;
      $this->output_json([
        'status' => $status,
        'length' => 1,
        'data' =>  $result,
        'message' => $status ? 'Data berhasil dihapus' : 'Data gagal dihapus'
      ], $code);
    }
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
    $title_excel = "Daftar_Calon_Ketua_Operasional";
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
      ->setCellValue("A$row", "Daftar Calon Ketua Operasional DKM Ulil Albab");
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
      'NPP',
      'Nama',
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
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->npm);
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->no_urut);
      $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->nama);
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
    $row++;
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
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
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
    $doc_name = "Daftar_Calon_Ketua_Operasional";

    // set table header
    $headers = [
      'No',
      'No Urut',
      'NPP',
      'Nama',
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
      $body_table .= "<td>{$detail->npm}</td>";
      $body_table .= "<td>{$detail->nama}</td>";
      $body_table .= '</tr>';
    }


    // insert html
    $tanggal = date("d-m-Y H:i:s");
    $body_head = '<div style="text-align:center">';
    $build_html = '
                      <h3><span style="text-align:center; ">Daftar Calon Ketua Operasional DKM Ulil Albab</span></h3>' . "
      <table>
      $thead_title
      $thead_number
      $body_table
      </table>
      <span style='text-align:left'>Data ini diambil pada tanggal dan waktu: $tanggal</span>
      ";

    $footer = '</div>';
    $this->create_pdf([
      'html' => $body_head . $build_html . $footer,
      'doc_name' => $doc_name,
      'orientation' => 'potrait'
    ]);
  }


  function __construct()
  {
    parent::__construct();
    // Cek session
    $this->sesion->cek_session();
    $akses = ['Super Admin'];
    $get_lv = $this->session->userdata('data')['level'];
    if (!in_array($get_lv, $akses)) {
      redirect('my404', 'refresh');
    }

    $this->load->model("admin/CalonKetuaModel", 'model');
    $this->default_template = 'templates/dashboard';
    $this->load->library('plugin');
    $this->load->helper('url');
  }
}
