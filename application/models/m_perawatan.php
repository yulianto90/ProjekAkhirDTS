<?php
class M_perawatan extends CI_Model{

    function tampil_perawatan()
    {
        $this->db->select('*');
        $this->db->from('perawatan');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $perawatan[] = $data;
                }
            return $perawatan;
            }
    }

}
?>