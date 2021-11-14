<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Render_Controller
{
    public function index()
    {
        // Page Settings
        $this->title = 'Users - Users';
        $this->navigation = ['Users', 'Users'];
        $this->plugins = ['datatables', 'select2'];

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url();
        $this->breadcrumb_2 = 'Users';
        $this->breadcrumb_2_url = '#';
        $this->breadcrumb_3 = 'Users';
        $this->breadcrumb_3_url = base_url() . 'pengaturan/profile';

        $get_lv = $this->session->userdata('data')['level'];
        if ($get_lv == 'Partner L2') {
            $this->content      = 'pengaturan/profile/list-p';
        } else {
            // content
            $this->content      = 'pengaturan/profile/list';
        }

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

    public function ajax_select_list_partner()
    {
        $return = $this->model->list_partner();
        $this->output_json($return);
    }


    public function export_excel()
    {
        // data body
        $order = [
            'order' => $this->input->post('order'),
            'columns' => $this->input->post('columns')
        ];

        $filter = [
            'partner' => $this->input->get("filter-partner")
        ];

        $details = $this->model->getAllData(null, null, null, null, $order, $filter)->result_array();
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
        $col_end = "O";
        $title_excel = "AuditAny_Data_Master_Profile";
        // Header excel ================================================================================================
        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $spreadsheet->getProperties()
            ->setCreator("Audit System End to End")
            ->setLastModifiedBy("Administrator")
            ->setTitle($title_excel)
            ->setSubject("Administrator")
            ->setDescription("List Profile $date")
            ->setKeywords("Laporan, Report")
            ->setCategory("Laporan, Report");
        // set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(11);


        // header 2 ====================================================================================================
        $row += 1;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "List Profile");
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
            'Level',
            'Partner',
            'NIK',
            'Email',
            'Nama Depan',
            'Nama Belakang',
            'Jenis Kelamin',
            'Membership',
            'Tipe Kontak',
            'Kontak',
            'Alamat',
            'Peristiwa',
            'Pendidikan',
            'Tanggal',
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
            $tanggal = is_null($detail['updated_at']) || $detail['updated_at'] == '' ?  $detail['created_at'] :  $detail['updated_at'];
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['lev_nama']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_partner']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nik']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['email']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_depan']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_belakang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['jk']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['membership']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['tipe_contact_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['contact_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['alamat_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['peristiwa_formal']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['gelar_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row",  $tanggal);
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

        // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);

        // set alignment
        $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
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
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);

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

    public function downloadSample()
    {
        // data body
        $order = [
            'order' => $this->input->post('order'),
            'columns' => $this->input->post('columns')
        ];
        $details = ['0' => [
            'nik' => "999999999",
            'lev_nama' => "Reader",
            'email' => "dummy@gmail.com",
            'nama_depan' => "Dummy",
            'nama_belakang' => "-",
            'jk' => "Laki-Laki",
            'nama_partner' => "AuditAny Cabang1",
            'membership' => "Manager",
            'tipe_contact_sekarang' => "HandPhone",
            'contact_sekarang' => "081352483646546",
            'alamat_sekarang' => "Bandung",
            'peristiwa_formal' => "Tanggal Masuk",
            'gelar_sekarang' => "Sarjana",
            'status_str' => "Aktif",
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]];
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
        $col_end = "O";
        $title_excel = "AuditAny_Data_Master_Profile_Sample";
        // Header excel ================================================================================================
        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $spreadsheet->getProperties()
            ->setCreator("Audit System End to End")
            ->setLastModifiedBy("Administrator")
            ->setTitle($title_excel)
            ->setSubject("Administrator")
            ->setDescription("List Profile $date")
            ->setKeywords("Laporan, Report")
            ->setCategory("Laporan, Report");
        // set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(11);


        // header 2 ====================================================================================================
        $row += 1;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "List Profile");
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
            'Level',
            'Partner',
            'NIK',
            'Email',
            'Nama Depan',
            'Nama Belakang',
            'Jenis Kelamin',
            'Membership',
            'Tipe Kontak',
            'Kontak',
            'Alamat',
            'Peristiwa',
            'Pendidikan',
            'Tanggal',
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
            $tanggal = is_null($detail['updated_at']) || $detail['updated_at'] == '' ?  $detail['created_at'] :  $detail['updated_at'];
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['lev_nama']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_partner']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nik']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['email']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_depan']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['nama_belakang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['jk']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['membership']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['tipe_contact_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['contact_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['alamat_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['peristiwa_formal']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail['gelar_sekarang']);
            $sheet->setCellValue(chr(65 + ++$c) . "$row",  $tanggal);
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

        // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);

        // set alignment
        $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
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

        // function for width column
        function wd($width)
        {
            return 0.71 + $width;
        }


        // set width column
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);

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
        // title name
        $title_name = "List Profile";

        // document name
        $doc_name = "AuditAny_Data_Master_Profile";

        // set table header
        $headers = [
            'No',
            'Level',
            // 'Partner',
            'NIK',
            'Email',
            'Nama Depan',
            'Nama Belakang',
            'Jenis Kelamin',
            'Membership',
            'Kontak',
            'Alamat',
            'Peristiwa',
            'Pendidikan',
            // 'Tanggal',
        ];
        $thead_title = '';
        $thead_number = '';
        foreach ($headers as $i => $head) {
            $num = $i + 1;
            $thead_title .= "<th style=\"text-align:center;\">$head</th>";
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

        $filter = [
            'partner' => $this->input->get("filter-partner")
        ];

        $partnerGroup = $this->model->getPathner($filter);
        array_push($partnerGroup, ['id' => '-', 'text' => 'Belum ada partner']);

        // insert html
        $body_head = '<div style="text-align:center">';
        $build_html = "<h3>$title_name</h3>";
        foreach ($partnerGroup as $bypart) {

            $filters = [
                'partner' => $bypart['id']
            ];

            $details = $this->model->getAllData(null, null, null, null, $order, $filters)->result_array();

            $body_table = '';
            foreach ($details as $i => $detail) {
                $contact = $this->db->select('a.*, b.nama as tipe_contact')->from('contact a')->join('tipe_contact b', 'a.id_tipe_contact = b.id', 'left')->where('a.id_profile', $detail['id'])->where('a.status', 1)->order_by('a.created_at', 'desc')->limit(1)->get()->result_array();
                $alamat = $this->db->select('a.*, b.nama as jenis_alamat')->from('alamat a')->join('jenis_alamat b', 'a.id_jenis_alamat = b.id', 'left')->where('a.id_profile', $detail['id'])->where('a.status', 1)->order_by('a.tanggal_mulai', 'desc')->limit(1)->get()->result_array();
                $data_formal = $this->db->select('a.*, b.name as dtm_peristiwa')->from('data_formal a')->join('dtm_peristiwa b', 'a.dtm_peristiwa_id = b.id', 'left')->where('a.id_profile', $detail['id'])->where('a.status', 1)->order_by('a.tanggal_data_formal', 'desc')->limit(1)->get()->result_array();
                $gelar = $this->db->select('a.*, b.nama as jenis_gelar')->from('gelar a')->join('jenis_gelar b', 'a.id_jenis_gelar = b.id', 'left')->where('a.id_profile', $detail['id'])->where('a.status', 1)->order_by('a.tanggal_lulus', 'desc')->limit(1)->get()->result_array();

                if (empty($contact)) {
                    $vcontact = '<td></td>';
                } else {
                    $vcontact = "<td>{$contact[0]['tipe_contact']} : {$contact[0]['keterangan']}</td>";
                }

                if (empty($alamat)) {
                    $valamat = '<td></td>';
                } else {
                    $valamat = "<td>{$alamat[0]['jenis_alamat']} : {$alamat[0]['alamat']}, {$alamat[0]['domisili']}</td>";
                }

                if (empty($data_formal)) {
                    $vdata_formal = '<td></td>';
                } else {
                    $vdata_formal = "<td>{$data_formal[0]['dtm_peristiwa']} : {$data_formal[0]['keterangan']}, {$data_formal[0]['tempat']},{$data_formal[0]['tanggal_data_formal']}</td>";
                }

                if (empty($gelar)) {
                    $vgelar = '<td></td>';
                } else {
                    $vgelar = "<td>{$gelar[0]['jenis_gelar']} tahun {$gelar[0]['tanggal_lulus']} dari {$gelar[0]['lembaga']}</td>";
                }

                $tanggal = is_null($detail['updated_at']) || $detail['updated_at'] == '' ?  $detail['created_at'] :  $detail['updated_at'];
                $num = $i + 1;
                $body_table .= '<tr>';
                $body_table .= "<td style=\"text-align:center\">{$num}</td>";
                $body_table .= "<td>{$detail['lev_nama']}</td>";
                // $body_table .= "<td>{$detail['nama_partner']}</td>";
                $body_table .= "<td>{$detail['nik']}</td>";
                $body_table .= "<td>{$detail['email']}</td>";
                $body_table .= "<td>{$detail['nama_depan']}</td>";
                $body_table .= "<td>{$detail['nama_belakang']}</td>";
                $body_table .= "<td>{$detail['jk']}</td>";
                $body_table .= "<td>{$detail['membership']}</td>";
                $body_table .= $vcontact;
                $body_table .= $valamat;
                $body_table .= $vdata_formal;
                $body_table .= $vgelar;
                // $body_table .= "<td>{$tanggal}</td>";
                $body_table .= '</tr>';
            }

            $build_html .= '<h4 style="text-align:left">Partner : ' . $bypart['text'] . '</h4>';
            $build_html .= "<table>
        $thead_title
        $thead_number
        $body_table
        </table>
        ";
        }
        $footer = '</div>';
        $this->create_pdf([
            'html' => $body_head . $build_html . $footer,
            'doc_name' => $doc_name,
            'orientation' => 'landscape',
            'paper_size' => 'A2'
        ]);
    }

    public function import_excel()
    {

        // Fungsi upload file
        $fileName = $_FILES['file']['name'];
        $config['upload_path'] = './assets/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx'; //tipe file yang diperbolehkan
        $config['max_size'] = 100000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        $file_location = "";

        if (!$this->upload->do_upload('file')) {
            echo json_encode(['code' => 1, 'message' => $this->upload->display_errors()]);

            exit();
        } else {
            $file_location = array('upload_data' => $this->upload->data());
            $file_location = $file_location['upload_data']['full_path'];
        }

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_location);
        // hapus file setelah digunakan
        unlink($file_location);
        $array_from_excel = $spreadsheet->getActiveSheet()->toArray();
        $num = 1;
        $no_resi1 = '';
        $error_message = '';
        $kode_penjualan = '';
        // var_dump($array_from_excel);
        // die;
        // get kode admin by session id_user

        $no_resi = [];
        $this->db->trans_start();
        foreach ($array_from_excel as $val) {
            if ($num > 5 && $val[13]) {

                $partner = $this->db->get_where('partner', "nama like '%$val[2]%'")->row_array();
                $tipe_contact = $this->db->get_where('tipe_contact', "nama like '%$val[9]%'")->row_array();
                $dtm_peristiwa = $this->db->get_where('dtm_peristiwa', "name like '%$val[12]%'")->row_array();
                $jenis_gelar = $this->db->get_where('jenis_gelar', "nama like '%$val[13]%'")->row_array();
                $level = $this->db->get_where('level', "lev_nama like '%$val[1]%'")->row_array();

                if ($tipe_contact == null) {
                    $tipe_contact = ['id' => 0];
                }

                if ($dtm_peristiwa == null) {
                    $dtm_peristiwa = ['id' => NULL];
                }

                if ($jenis_gelar == null) {
                    $jenis_gelar = ['id' => 0];
                }

                if ($level == null) {
                    $level = ['lev_id' => 123];
                }

                $tbh = $this->db->insert('users', [
                    "id_partner"   => $partner['id'],
                    "nik"   => $val[3] == "" ? NULL : $val[3],
                    "user_nama"  => $val[5] == "" ? NULL : $val[5],
                    "user_email"  => $val[4] == "" ? NULL : $val[4],
                    "user_email_status"  => 0,
                    "user_phone"  => $val[11] == "" ? NULL : $val[11],
                    "user_password"  => $this->b_password->bcrypt_hash('123456'),
                    "user_status"         => 1,
                    "created_at"    => date("Y-m-d H:i:s")
                ]);
                $id_user = $this->db->insert_id();

                $tbh = $this->db->insert('role_users', [
                    "role_user_id "   => $id_user,
                    "role_lev_id"   => $level['lev_id']
                ]);

                $tbh = $this->db->insert('profile', [
                    "id_user "   => $id_user,
                    "nama_depan"   => $val[5] == "" ? NULL : $val[5],
                    "nama_belakang"  => $val[6] == "" ? NULL : $val[6],
                    "jenis_kelamin"  => $val[7] == "" ? NULL : $val[7],
                    "status"         => 1,
                    "created_at"    => date("Y-m-d")
                ]);
                $id_profile = $this->db->insert_id();

                $tbh = $this->db->insert('contact', [
                    "id_profile  "   => $id_profile,
                    "id_tipe_contact"   => $tipe_contact['id'],
                    "keterangan"  => $val[10] == "" ? NULL : $val[10],
                    "status"         => 1,
                    "created_at"    => date("Y-m-d")
                ]);

                $tbh = $this->db->insert('alamat', [
                    "id_profile  "   => $id_profile,
                    "id_jenis_alamat"   => 0,
                    "alamat"  => $val[11] == "" ? NULL : $val[11],
                    "domisili"  => "-",
                    "tanggal_mulai"  => null,
                    "tanggal_selesai"  => null,
                    "status"         => 1,
                    "created_at"    => date("Y-m-d")
                ]);

                $tbh = $this->db->insert('data_formal', [
                    "id_profile  "   => $id_profile,
                    "dtm_peristiwa_id"   => $dtm_peristiwa['id'],
                    "status"         => 1,
                    "created_at"    => date("Y-m-d")
                ]);

                $tbh = $this->db->insert('gelar', [
                    "id_profile  "   => $id_profile,
                    "id_jenis_gelar"   => $jenis_gelar['id'],
                    "tanggal_lulus"  => date("Y-m-d"),
                    "lembaga"  => '-',
                    "status"         => 1,
                    "created_at"    => date("Y-m-d")
                ]);
            }
            $num++;
        }


        // database transaction complete
        $this->db->trans_complete();

        $code = $tbh ? 200 : 500;
        $this->output_json(["data" => $tbh], $code);
    }
    public function getContact()
    {
        $id = $this->input->post('id');
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $data = $this->model->getContact($id, $order)->result_array();
        $count = $this->model->getContact($id, $order)->num_rows();
        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data]);
    }
    public function getContact1()
    {
        $idp = $this->input->post('idp');
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $data = $this->model->getContact1($idp, $order)->result_array();
        $count = $this->model->getContact1($idp, $order)->num_rows();
        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data]);
    }

    public function getAlamat()
    {
        $idp = $this->input->post('idp');
        $id = $this->input->post('id');
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $data = $this->model->getAlamat($id, $idp, $order)->result_array();
        $count = $this->model->getAlamat($id, $idp, $order)->num_rows();
        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data]);
    }

    public function getFormal()
    {
        $idp = $this->input->post('idp');
        $id = $this->input->post('id');
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $data = $this->model->getFormal($id, $idp, $order)->result_array();
        $count = $this->model->getFormal($id, $idp, $order)->num_rows();
        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data]);
    }

    public function getEducation()
    {
        $idp = $this->input->post('idp');
        $id = $this->input->post('id');
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $data = $this->model->getEducation($id, $idp, $order)->result_array();
        $count = $this->model->getEducation($id, $idp, $order)->num_rows();
        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data]);
    }

    public function tambah($id = null)
    {
        // Page Settings
        $this->title = 'Users - Users';
        $this->navigation = ['Users', 'Users'];
        $this->plugins = ['datatables', 'select2', 'masonry'];

        // Breadcrumb setting
        $this->breadcrumb_1 = 'Dashboard';
        $this->breadcrumb_1_url = base_url();
        $this->breadcrumb_2 = 'Users';
        $this->breadcrumb_2_url = '#';
        $this->breadcrumb_3 = 'Users';
        $this->breadcrumb_3_url = base_url() . 'pengaturan/profile/tambah';
        $this->data['isUbah'] = $id != null;

        // content
        $this->content      = 'pengaturan/profile/tambah';

        $ceknew = $this->model->cekNew($id);
        if ($ceknew == null) {
            redirect('/pengaturan/profile');
            return;
        }

        $this->data['membership'] = $this->model->listmembership();
        $this->data['peristiwa'] = $this->model->listperistiwa();
        $this->data['jenisalamat'] = $this->model->listjenisalamat();
        $this->data['jenisgelar'] = $this->model->listjenisgelar();
        $this->data['tipekontak'] = $this->model->listtipekontak();
        $this->data['getID'] = $ceknew['id'];
        // $this->data['contact'] = $this->model->getContact($ceknew['id'])->result_array();
        $this->data['profile'] = $ceknew;
        $this->data['isUbah'] = $id != null;
        $this->data['partner'] = $this->model->getPathner();
        $this->data['level'] = $this->model->getLevel();

        // Send data to view
        $this->render();
    }

    public function insert_contact()
    {
        $id = $this->input->post("id_contact");
        $id_profile = $this->input->post("id_profile");
        $tipe_kontak = $this->input->post("tipe_kontak");
        $keterangan = $this->input->post("keterangan");
        $status = $this->input->post("statusk");
        $result = $this->model->insert_contact($id, $id_profile, $tipe_kontak, $keterangan, $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function update_contact()
    {
        $id = $this->input->post("id_contact");
        $tipe_kontak = $this->input->post("tipe_kontak");
        $keterangan = $this->input->post("keterangan");
        $status = $this->input->post("statusk");
        $result = $this->model->update_contact($id, $tipe_kontak, $keterangan, $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function insert_alamat()
    {
        $id = $this->input->post("id_alamat");
        $id_profile = $this->input->post("id_profile");
        $jenis_alamat = $this->input->post("jenis_alamat");
        $alamat = $this->input->post("alamat");
        $domisili = $this->input->post("domisili");
        $tanggal_mulai = $this->input->post("tanggal_mulai");
        $tanggal_selesai = $this->input->post("tanggal_selesai");
        $status = $this->input->post("status");
        $result = $this->model->insert_alamat($id, $id_profile, $jenis_alamat, $alamat, $domisili, $tanggal_mulai, $tanggal_selesai, $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function update_alamat()
    {
        $id = $this->input->post("id_alamat");
        $id_profile = $this->input->post("id_profile");
        $jenis_alamat = $this->input->post("jenis_alamat");
        $alamat = $this->input->post("alamat");
        $domisili = $this->input->post("domisili");
        $tanggal_mulai = $this->input->post("tanggal_mulai");
        $tanggal_selesai = $this->input->post("tanggal_selesai");
        $status = $this->input->post("status");
        $result = $this->model->update_alamat($id, $id_profile, $jenis_alamat, $alamat, $domisili, $tanggal_mulai, $tanggal_selesai, $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function insert_formal()
    {
        $id = $this->input->post("id_formal");
        $id_profile = $this->input->post("id_profile");
        $peristiwa_formal = $this->input->post("peristiwa_formal");
        $keterangan = $this->input->post("peristiwa_keterangan");
        $tempat = $this->input->post("tempat");
        $tanggal_data_formal = $this->input->post("tanggal_data_formal");
        $status = $this->input->post("statusf");
        $result = $this->model->insert_formal($id, $id_profile, $peristiwa_formal, $tempat, $tanggal_data_formal, $status, $keterangan);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function update_formal()
    {
        $id = $this->input->post("id_formal");
        $id_profile = $this->input->post("id_profile");
        $peristiwa_formal = $this->input->post("peristiwa_formal");
        $keterangan = $this->input->post("peristiwa_keterangan");
        $tempat = $this->input->post("tempat");
        $tanggal_data_formal = $this->input->post("tanggal_data_formal");
        $status = $this->input->post("statusf");
        $result = $this->model->update_formal($id, $id_profile, $peristiwa_formal, $tempat, $tanggal_data_formal, $status, $keterangan);
        $this->output_json(["data" => $result]);
    }

    public function insert_education()
    {
        $id = $this->input->post("id_education");
        $id_profile = $this->input->post("id_profile");
        $nama = $this->input->post("nama");
        $tanggal_lulus = $this->input->post("tanggal_lulus");
        $lembaga = $this->input->post("lembaga");
        $status = $this->input->post("statuse");
        $result = $this->model->insert_education($id, $id_profile, $nama, $tanggal_lulus, $lembaga, $status);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function update_education()
    {
        $id = $this->input->post("id_education");
        $id_profile = $this->input->post("id_profile");
        $nama = $this->input->post("nama");
        $tanggal_lulus = $this->input->post("tanggal_lulus");
        $lembaga = $this->input->post("lembaga");
        $status = $this->input->post("statuse");
        $result = $this->model->update_education($id, $id_profile, $nama, $tanggal_lulus, $lembaga, $status);
        $this->output_json(["data" => $result]);
    }

    public function hapusDaftar()
    {
        $id = $this->input->post("id");
        $tbl = $this->input->post("tbl");
        $result = $this->model->hapusDaftar($id, $tbl);
        $code = $result ? 200 : 500;
        $this->output_json(["data" => $result], $code);
    }

    public function ajax_select_list_membership()
    {
        $return = $this->model->listmembership();
        $this->output_json($return);
    }

    public function emailCheck()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('id_user', 'Id User', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $email = $this->input->post('email');
            $id_user = $this->input->post('id_user');
            $result = $this->model->emailCheck($email, $id_user);

            $code = $result == null ? 200 : 409;
            $status = $result == null;
            $this->output_json([
                'status' => $status,
                'length' => 1,
                'data' =>  $result,
                'message' => $status ? 'Email belum digunakan' : 'Email sudah terdaftar'
            ], $code);
        }
    }

    public function nikCheck()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required|numeric');
        $this->form_validation->set_rules('id_user', 'Id User', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $nik = $this->input->post('nik');
            $id_user = $this->input->post('id_user');
            $result = $this->model->nikCheck($nik, $id_user);

            $code = $result == null ? 200 : 409;
            $status = $result == null;
            $this->output_json([
                'status' => $status,
                'length' => 1,
                'data' =>  $result,
                'message' => $status ? 'Nik belum terdaftar' : 'Nik sudah terdaftar'
            ], $code);
        }
    }

    public function getMembership()
    {
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $start = $this->input->post('start');
        $draw = $this->input->post('draw');
        $draw = $draw == null ? 1 : $draw;
        $length = $this->input->post('length');
        $cari = $this->input->post('search');
        $order['profile']['id_profile'] = $this->input->post('idp');

        if (isset($cari['value'])) {
            $_cari = $cari['value'];
        } else {
            $_cari = null;
        }

        $data = $this->model->getMembership($draw, $length, $start, $_cari, $order)->result_array();
        $count = $this->model->getMembership(null, null, null, $_cari, $order, null)->num_rows();

        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
    }

    public function getKontak()
    {
        $order = ['order' => $this->input->post('order'), 'columns' => $this->input->post('columns')];
        $start = $this->input->post('start');
        $draw = $this->input->post('draw');
        $draw = $draw == null ? 1 : $draw;
        $length = $this->input->post('length');
        $cari = $this->input->post('search');
        $order['profile']['id_profile'] = $this->input->post('idp');

        if (isset($cari['value'])) {
            $_cari = $cari['value'];
        } else {
            $_cari = null;
        }

        $data = $this->model->getKontak($draw, $length, $start, $_cari, $order)->result_array();
        $count = $this->model->getKontak(null, null, null, $_cari, $order, null)->num_rows();

        $this->output_json(['recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $_cari, 'data' => $data]);
    }

    public function membershipCheck()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_jenis', 'id Jenis Membership', 'trim|required|numeric');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id_jenis = $this->input->post('id_jenis');
            $id_profile = $this->input->post('id_profile');
            $result = $this->model->membershipCheck($id_jenis, $id_profile);

            $code = $result == null ? 200 : 409;
            $status = $result == null;
            $this->output_json([
                'status' => $status,
                'length' => 1,
                'data' =>  $result,
                'message' => $status ?   'Jenis membership belum terdaftar' : 'Jenis membership sudah terdaftar'
            ], $code);
        }
    }

    public function insert_membership()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('membership_jenis', 'id Jenis Membership', 'trim|required|numeric');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'trim|required|numeric');
        $this->form_validation->set_rules('membership_tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id_jenis = $this->input->post('membership_jenis');
            $id_profile = $this->input->post('id_profile');
            $tanggal = $this->input->post('membership_tanggal');
            $result = $this->model->insert_membership($id_jenis, $id_profile, $tanggal);

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

    public function update_membership()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_membership', 'id Membership', 'trim|required|numeric');
        $this->form_validation->set_rules('membership_jenis', 'id Jenis Membership', 'trim|required|numeric');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'trim|required|numeric');
        $this->form_validation->set_rules('membership_tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id = $this->input->post('id_membership');
            $id_jenis = $this->input->post('membership_jenis');
            $id_profile = $this->input->post('id_profile');
            $tanggal = $this->input->post('membership_tanggal');
            $result = $this->model->update_membership($id, $id_jenis, $id_profile, $tanggal);

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

    public function set_active_membersip()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_membership', 'id Membership', 'trim|required|numeric');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id = $this->input->post('id_membership');
            $id_profile = $this->input->post('id_profile');
            $result = $this->model->set_active_membersip($id, $id_profile);

            $code = $result != null ? 200 : 400;
            $status = $result != null;
            $this->output_json([
                'status' => $status,
                'length' => 1,
                'data' =>  $result,
                'message' => $status ? 'Data berhasil diaktifkan' : 'Data gagal diaktifkan'
            ], $code);
        }
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id', 'id Profile', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        // $this->form_validation->set_rules('id', 'id Level', 'trim|required|numeric');
        // $this->form_validation->set_rules('current_email', 'Current Email', 'trim|required');
        // $this->form_validation->set_rules('tgl-verifikasi', 'Tanggal', 'trim|required');
        // $this->form_validation->set_rules('approved', 'Approved', 'trim|required');
        // $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required');
        // $this->form_validation->set_rules('id_partner', 'Partner', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $current_email = $this->input->post('current_email');
            $nik = $this->input->post('nik');
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $jk = $this->input->post('jk');
            $id_partner = $this->input->post('id_partner');
            $id_level = $this->input->post('id_level');
            $change_email = $email != $current_email;
            // $tgl = $this->input->post('tgl-verifikasi');
            // $approved = $this->input->post('approved');
            $result = $this->model->simpan(
                $id,
                $email,
                $nik,
                $nama_depan,
                $nama_belakang,
                $jk,
                $id_partner,
                $id_level,
                $change_email
                // $tgl,
                // $approved,
            );

            // send email
            $user = $this->db->select('id_user, user_email_status')->from('profile')->join('users', 'profile.id_user = users.user_id')->where('id', $id)->get()->row_array();
            $send = $user == null ? 0 : $user['user_email_status'];
            if ($change_email || $send == 0) {
                $id_user = $user['id_user'];
                $result = $this->sendConfirmEmail($id_user, $email);
                // debug
                if ($this->debug) {
                    var_dump($result);
                    die;
                }
            }

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


    private function sendConfirmEmail($id, $email)
    {
        $this->load->model('loginModel', 'login');
        $token = $this->login->insertToken($id);
        $qstring = $this->base64url_encode($token);
        $url = base_url() . 'Login/konfirmasi_email?t=' . $qstring;
        $content = '<p>Email anda telah dimasukan kedalam aplikasi Audit System End to End. Untuk kofnirmasi <a href="' . $url .
            '">klik disini</a></p><br>Token berlaku selama satu hari, sampai jam 24:00 hari ini';
        // debug
        if ($this->debug) {
            return [
                'url' => $url
            ];
        }
        // production
        $this->send_email($email, $content, 'Konfirmasi Email');
        return (true);
    }

    public function sendEmailConfirm()
    {
        $return =  $this->sendConfirmEmail($this->input->post('id'), $this->input->post('email'));
        $this->output_json($return);
    }

    public function delete()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'trim|required|numeric');
        $this->form_validation->set_rules('id_user', 'Id user', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->output_json([
                'status' => false,
                'data' => null,
                'message' => validation_errors()
            ], 400);
        } else {
            $id_profile = $this->input->post('id_profile');
            $id_user = $this->input->post('id_user');
            $result = $this->model->delete($id_profile, $id_user);

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

    function __construct()
    {
        parent::__construct();
        // Cek session
        $this->sesion->cek_session();
        $akses = ['Super Admin', 'Admin Staff', 'Partner L1', 'Partner L2'];
        $get_lv = $this->session->userdata('data')['level'];
        if (!in_array($get_lv, $akses)) {
            redirect('my404', 'refresh');
        }

        $this->load->model("pengaturan/ProfileModel", 'model');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');
    }
}
