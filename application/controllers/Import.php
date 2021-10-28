<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('excel', 'session'));
    }

    public function index()
    {
        // $this->load->model('ImportModel');
        // $data = array(
        // 'list_data'    => $this->ImportModel->getData()
        // );
        $this->load->view('import_excel.php');
    }

    public function import_excel()
    {
        if (isset($_FILES["fileExcel"]["name"])) {
            // echo '<pre>';
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            // print_r($object);
            // die();
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id             = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    // $lokasi_tempat_id             = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama             = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    // $asset_happy_ending           = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    // $asset_rv           = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    // $asset_tahun           = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    // $asset_nama           = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    // $asset_harga           = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    // $asset_barcode           = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    // $asset_serial_number           = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    // $asset_company           = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    // $asset_image_id           = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    // $asset_kategori_id           = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    // $asset_tipe_id           = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    // $asset_section_id           = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    // $asset_manufaktur_id           = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    // $asset_kondisi           = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    // $asset_keterangan           = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    // $asset_ram_id           = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    // $asset_periode_garansi           = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    // $asset_qty           = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    // $asset_infrastruktur           = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    // $asset_status           = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    // $asset_tetap           = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    // $asset_pecah           = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    // $asset_habis          = $worksheet->getCellByColumnAndRow(22, $row)->getValue();

                    // $time = strtotime($asset_tahun);
                    // $newformat = date('Y-m-d', $time);
                    $temp_data[] = array(
                        'id'                => $id,
                        // 'lokasi_tempat_id' => $lokasi_tempat_id,
                        'nama' => $nama
                    );
                    // $temp_data[] = array(
                    //     'id'                => $id,
                    //     'asset_happy_ending'              => $asset_happy_ending,
                    //     'asset_rv'              => $asset_rv,
                    //     'asset_tahun'              => $asset_tahun,
                    //     'asset_nama'              => $asset_nama,
                    //     'asset_harga'              => $asset_harga,
                    //     'asset_barcode'              => $asset_barcode,
                    //     'asset_serial_number'              => $asset_serial_number,
                    //     'asset_company'              => $asset_company,
                    //     'asset_image_id'              => $asset_image_id,
                    //     'asset_kategori_id'              => $asset_kategori_id,
                    //     'asset_tipe_id'              => $asset_tipe_id,
                    //     'asset_section_id'              => $asset_section_id,
                    //     'asset_manufaktur_id'              => $asset_manufaktur_id,
                    //     'asset_kondisi'              => $asset_kondisi,
                    //     'asset_keterangan'              => $asset_keterangan,
                    //     'asset_ram_id'              => $asset_ram_id,
                    //     'asset_periode_garansi'              => $asset_periode_garansi,
                    //     'asset_qty'              => $asset_qty,
                    //     'asset_infrastruktur'              => $asset_infrastruktur,
                    //     'asset_status'              => $asset_status,
                    //     'asset_tetap'              => $asset_tetap,
                    //     'asset_pecah'              => $asset_pecah,
                    //     'asset_habis'       => $asset_habis
                    // );
                }


                // $highestRow = $worksheet->getHighestRow();
                // $highestColumn = $worksheet->getHighestColumn();
                // for ($row = 2; $row <= $highestRow; $row++) {
                //     $id             = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                //     $asset_id           = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                //     $lokasi_asset           = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                //     // $keterangan_asset           = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                //     $user_support           = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                //     $qty           = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                //     $k_nik           = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                //     $k_nama           = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                //     $k_divisi           = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                //     $company           = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

                //     $temp_data[] = array(
                //         'id'                => $id,
                //         'asset_id'              => $asset_id,
                //         'lokasi_asset'              => $lokasi_asset,
                //         // 'keterangan_asset'              => $keterangan_asset,
                //         'user_support'              => $user_support,
                //         'qty'              => $qty,
                //         'k_nik'              => $k_nik,
                //         'k_nama'              => $k_nama,
                //         'k_divisi'              => $k_divisi,
                //         'company'              => $company,
                //     );
                // }
            }




            $this->load->model('ImportModel');
            $insert = $this->ImportModel->insert($temp_data);
            if ($insert) {
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }
}
