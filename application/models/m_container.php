<?php

class m_container extends CI_Model
{
    public function getContainer()
    {
        $this->db->select('*');
        $this->db->from('tb_container');
        return $this->db->get()->result();
    }

    public function tambahdata($data)
    {
        $this->db->insert('tb_container', $data);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tb_container', $data);
    }

    public function deletedata($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tb_container', $data);
    }

    public function excel()
    {
        $this->db->select('*');
        $this->db->from('tb_container');
        return $this->db->get()->result();
    }
}
