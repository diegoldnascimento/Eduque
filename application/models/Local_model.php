<?php
class Local_model extends CI_Model {

    private $tableName = 'local';

    public function get($id){
        return $this->db->where('id', $id)->get($this->tableName)->result()[0];
    }

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function insert($data){
        $model = [
            'nome' => $data['nome'],
            'capacidade' => $data['capacidade'],
            'responsavel' => $data['responsavel'],
            'telefone' => $data['telefone'],
            'logradouro' => $data['logradouro'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'complemento' => $data['complemento'],
            'cep' => $data['cep'],
            'n' => $data['numero'],
            'estado' => $data['estado']
        ];
        return $this->db->insert($this->tableName, $model);
    }

    public function update($id, $data){
        $model = [
            'nome' => $data['nome'],
            'capacidade' => $data['capacidade'],
            'responsavel' => $data['responsavel'],
            'telefone' => $data['telefone'],
            'logradouro' => $data['logradouro'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'complemento' => $data['complemento'],
            'cep' => $data['cep'],
            'n' => $data['numero'],
            'estado' => $data['estado']
        ];
        return $this->db->where('id', $id)->update($this->tableName, $model);
    }

    public function delete($id){
        return $this->db->delete($this->tableName, ['id' => $id]);
    }
}
?>
