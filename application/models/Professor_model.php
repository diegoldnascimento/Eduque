<?php
class Professor_model extends CI_Model {
    private $tableName = 'professor';

    public function get($id){
        return $this->db->where('id', $id)->get($this->tableName)->result()[0];
    }

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }
    public function getLastInserted() { return $this->db->insert_id(); }

    public function insert($data){
        $data = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'bio' => $data['bio'],
            'observacao' => $data['observacao'],
            'contrato' => $data['contrato'],
            'titulacao' => $data['titulacao']
        ];
        return $this->db->insert($this->tableName, $data);
    }

    public function update($id, $data){
        $data = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'bio' => $data['bio'],
            'observacao' => $data['observacao'],
            'contrato' => $data['contrato'],
            'titulacao' => $data['titulacao']
        ];
        
        return $this->db->update($this->tableName, $data, ['id' => $id]);
    }

    public function delete($id){
        return $this->db->where('id', $id)->delete($this->tableName);
    }


}

?>
