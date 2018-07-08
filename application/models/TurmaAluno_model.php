<?php
class TurmaAluno_model extends CI_Model {
    private $tableName = 'turmaaluno';

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

    public function delete($id){
        return $this->db->where('id', $id)->delete($this->tableName);
    }

    public function verificarAlunoTurma($turma_id, $aluno_id){
        $result = $this->db->where('turma_id', $turma_id)->where('aluno_id', $aluno_id)->get($this->tableName)->result()[0];

        if(!empty($result))
            return true;
        else
            return false;
    }
}
?>
