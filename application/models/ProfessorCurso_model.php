<?php
class ProfessorCurso_model extends CI_Model {
    private $tableName = 'professorcurso';

    public function get($id){
        return $this->db->where('id', $id)->get($this->tableName)->result()[0];
    }

    public function getByProfessor($id){
        return $this->db->where('professor_id', $id)->get($this->tableName)->result();
    }

    public function getByCurso($curso_id){
        return $this->db->where('curso_id', $curso_id)->get($this->tableName)->result();
    }

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function insert($data){
        return $this->db->insert($this->tableName, $data);
    }

    public function deleteAll($professor_id){
        return $this->db->delete($this->tableName, ['professor_id' => $professor_id]);
    }
}
?>
