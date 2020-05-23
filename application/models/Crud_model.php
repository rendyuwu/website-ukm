<?php

class Crud_model extends CI_model
{
    public function getJurusan()
    {
        $query = $this->db->get('jurusan');
        return $query->result_array();
    }

    public function getJabatan()
    {
        $query = $this->db->get('jabatan');
        return $query->result_array();
    }

    // public function getAnggotaUkm($ukm)
    // {
    //     $new_ukm = strtolower($ukm);
    //     $query = $this->db->get($new_ukm);
    //     return $query->result_array();
    // }

    public function tambahAnggotaUkm($ukm)
    {
        $new_ukm = strtolower($ukm);
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'jurusan' => $this->input->post('jurusan', true),
            'jabatan' => $this->input->post('jabatan', true),
            'telp' => $this->input->post('telp', true),
            'email' => $this->input->post('email', true)
        );
        $this->db->insert($new_ukm, $data);
    }

    public function hapusAnggotaUkm($ukm, $id)
    {
        $new_ukm = strtolower($ukm);
        $this->db->where('id', $id);
        $this->db->delete($new_ukm);
    }

    public function detailAnggotaUkmById($ukm, $id)
    {
        $new_ukm = strtolower($ukm);
        $query = $this->db->get_where($new_ukm, array('id' => $id));
        return $query->row_array();
    }

    public function ubahAnggotaUkm($ukm)
    {
        $new_ukm = strtolower($ukm);
        $data = array(
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'jurusan' => $this->input->post('jurusan', true),
            'jabatan' => $this->input->post('jabatan', true),
            'telp' => $this->input->post('telp', true),
            'email' => $this->input->post('email', true)
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update($new_ukm, $data);
    }

    // public function cariAnggotaUkm($ukm)
    // {
    //     $new_ukm = strtolower($ukm);
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('nama', $keyword);
    //     $this->db->or_like('nim', $keyword);
    //     $this->db->or_like('jurusan', $keyword);
    //     $this->db->or_like('jabatan', $keyword);
    //     $this->db->or_like('email', $keyword);
    //     $this->db->or_like('telp', $keyword);
    //     $query = $this->db->get($new_ukm);
    //     return $query->result_array();
    // }

    public function getAnggota($ukm, $limit, $start, $keyword = NULL)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('nim', $keyword);
            $this->db->or_like('jurusan', $keyword);
            $this->db->or_like('jabatan', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('telp', $keyword);
        }
        $new_ukm = strtolower($ukm);
        $query = $this->db->get($new_ukm, $limit, $start);
        return $query->result_array();
    }

    public function countAllAnggotaUkm($ukm)
    {
        $new_ukm = strtolower($ukm);
        $query = $this->db->get($new_ukm);
        return $query->num_rows();
    }
}
