<?php
class TurmaCurso_model extends CI_Model {
    private $tableName = 'turmacurso';

    public function get($id){
        return $this->db->where('id', $id)->get($this->tableName)->result()[0];
    }

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function getAllByTurma($turma_id){
        return $this->db->where('turma_id', $turma_id)->get($this->tableName)->result();
    }

    public function insert($data){
        return $this->db->insert($this->tableName, $data);
    }

}
?>
