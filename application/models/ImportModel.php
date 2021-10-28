<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImportModel extends CI_Model
{

    public function insert($data)
    {
        // echo '<pre>';
        // print_r($data);
        // die();
        $insert = $this->db->insert_batch('tbl_m_prosessor', $data);
        if ($insert) {
            return true;
        }
    }
    public function getData()
    {
        $this->db->select('*');
        return $this->db->get('tbl_data2')->result_array();
    }
}
