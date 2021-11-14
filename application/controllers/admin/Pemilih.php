<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title = 'Data Pemilih';
        $this->navigation = ['Pemilih'];
        $this->plugins = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url();
        $this->breadcrumb_4 = 'Pemilih';
        $this->breadcrumb_4_url = base_url() . 'admin/pemilih/list';
        // content
        $this->content      = 'admin/pemilih/list';

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


    public function getList()
    {
        $result = $this->model->getList();
        $code = $result ? 200 : 500;
        $this->output_json($result, $code);
    }

    public function insert()
    {
        $this->db->trans_start();
        $npp = $this->input->post("npp");
        $nama = $this->input->post("nama");
        $keterangan = $this->input->post("keterangan");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->insert($user_id, $nama, $npp, $keterangan,  $status);

        $this->db->trans_complete();
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function update()
    {
        $id = $this->input->post("id");
        $npp = $this->input->post("npp");
        $nama = $this->input->post("nama");
        $keterangan = $this->input->post("keterangan");
        $status = $this->input->post("status");
        $user_id = $this->id;
        $result = $this->model->update($id, $user_id, $nama, $npp, $keterangan,  $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $result = $this->model->delete($this->id, $id);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function undang_pdf($id = null)
    {
        // get data
        $data = $this->model->dataPemilih($id);
        $header = '
        <body style="font-family:Arial">
        <div class="header">
            <center>
                <h3><span style="text-align:center; ">Undangan Pemilihan Ketua Operasional<br>DKM Ulil Albab</span></h3>
                <p style="font-size:11px; margin-top:-10px;">AYO MEMILIH PILIH SESUAI DENGAN HATI NURANI ANDA</p></center>
            </center>
            <hr>
        </div>
        ';
        $body = "
        {$header}
        <table width=\"100%\" style=\"font-weight:bold; font-size:14px;\">
        <tr>
            <td>NPP</td>
            <td>:</td>
            <td>{$data->npp}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{$data->nama}</td>
        </tr>
        <tr>
            <td>Token</td>
            <td>:</td>
            <td>{$data->token}</td>
        </tr>
        <tr>
            <td>Status Pemilihan</td>
            <td>:</td>
            <td>{$data->sudah_pilih}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>{$data->keterangan}</td>
        </tr>
        </table>
        </div>
        </body>
        ";


        // document name
        $doc_name = "{$data->nama} ({$data->npp})  - Undagan Pemilihan Ketua Umum";

        $this->create_pdf([
            'html' => $body,
            'doc_name' => $doc_name,
            'paper_size' => 'A5'
        ]);
    }

    public function export_excel()
    {
        // data body
        $details = $this->model->dataPemilih();
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
        $col_end = "G";
        $title_excel = "List_Data_Pemilih";
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
            ->setCellValue("A$row", "Daftar Pemilih Ketua Operasional DKM Ulil Albab");
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 13
            ],
            "alignment" => [
                "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        $row++;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "AYO MEMILIH PILIH SESUAI DENGAN HATI NURANI ANDA");
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
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
            'Nama',
            'NPP',
            'Token',
            'Sudah Memilih',
            'Terakhir Login',
            'Status'
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
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 6));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->nama);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->npp);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->token);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->sudah_pilih);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->last_login);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->status_str);
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

        // waktu dan tangggal
        $row++;
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
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(w(15));
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

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
        $doc_name = "List_Data_Pemilih";

        // set table header
        $headers = [
            'No',
            'Nama',
            'NPP',
            'Token',
            'Sudah Memilih',
            'Terakhir Login',
            'Status'
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
        $details = $this->model->dataPemilih();
        $body_table = '';
        foreach ($details as $i => $detail) {
            $num = $i + 1;
            $body_table .= '<tr>';
            $body_table .= "<td style=\"text-align:center\">{$num}</td>";
            $body_table .= "<td>{$detail->nama}</td>";
            $body_table .= "<td>{$detail->npp}</td>";
            $body_table .= "<td>{$detail->token}</td>";
            $body_table .= "<td>{$detail->sudah_pilih}</td>";
            $body_table .= "<td>{$detail->last_login}</td>";
            $body_table .= "<td>{$detail->status_str}</td>";
            $body_table .= '</tr>';
        }


        // insert html
        $tanggal = date("d-m-Y H:i:s");
        $body_head = '<div style="text-align:center">';
        $build_html = '
                        <h3><span style="text-align:center; ">Daftar Pemilih Ketua Operasional DKM Ulil Albab</span></h3>
                        <p style="font-size:11px; margin-top:-10px;">AYO MEMILIH PILIH SESUAI DENGAN HATI NURANI ANDA</p></center>' . "
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



























    public function cari()
    {
        $key = $this->input->post('q');
        // jika inputan ada
        if ($key) {
            $this->output_json([
                "results" => $this->model->cari($key)
            ]);
        } else {
            $this->output_json([
                "results" => []
            ]);
        }
    }

    public function noUrut()
    {
        $kelas_id = $this->input->post('kelas_id');
        $result = $this->model->noUrut($kelas_id);
        $code = $result ? 200 : 500;
        $this->output_json($result, $code);
    }

    public function cekNoUrut()
    {
        $kelas_id = $this->input->post('kelas_id');
        $no = $this->input->post('no');
        $result = $this->model->cekNoUrut($kelas_id, $no);
        $this->output_json($result, 200);
    }

    function __construct()
    {
        parent::__construct();
        $this->sesion->cek_session();
        $akses = ['Super Admin'];
        $get_lv = $this->session->userdata('data')['level'];
        if (!in_array($get_lv, $akses)) {
            redirect('my404', 'refresh');
        }
        $this->id = $this->session->userdata('data')['id'];
        $this->photo_path = './files/admin/pemilih/';
        $this->load->model("admin/PemilihModel", 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
