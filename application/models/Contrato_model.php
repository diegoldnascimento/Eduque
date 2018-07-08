<?php
class Contrato_model extends CI_Model {
    public $tableName = 'contrato';

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function get($id){
        return $this->db->where('id', $id)->get($this->tableName)->result()[0];
    }

    public function insert($data){
        $this->db->set($data);
        return $this->db->insert($this->tableName);
    }
    public function update($id, $data){
        $this->db->set($data);
        return $this->db->where(['id' => $id])->update($this->tableName);
    }
    public function delete($id){
        return $this->db->delete($this->tableName, ['id' => $id]);
    }
}
?>
