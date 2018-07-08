<?php

class Usuario_model extends CI_Model {
    private $tableName = 'usuario';

    public function insert($data){
        date_default_timezone_set('America/Sao_Paulo');

        $data = [
            'usuario' => $data['usuario'],
            'senha' => md5($data['senha']),
            'ativo' => $data['ativo'],
            'email' => $data['email'],
            'ultimoAcesso' => date('Y-m-d H:i:s'),
            'dataCadastro' => date('Y-m-d'),
            'nivelAcesso' => $data['nivelAcesso']
        ];
        return $this->db->insert($this->tableName, $data);
    }

    public function update($id, $model){
        $data = [
            'usuario' => $model['usuario'],
            'ativo' => $model['ativo'],
            'nivelAcesso' => $model['nivelAcesso'],
            'email' => $model['email']
        ];

        if(!empty($model['senha'])){
            $data['senha'] = md5($model['senha']);
        }

        return $this->db->where('id', $id)->update($this->tableName, $data);
    }

    public function updateLastAcess($id){
        date_default_timezone_set('America/Sao_Paulo');
        return $this->db->where('id', $id)->update($this->tableName, ['ultimoAcesso' => date('Y-m-d H:i:s')]);
    }

    public function delete($id){
        return $this->db->delete($this->tableName, ['id' => $id]);
    }

    public function get($id){
        return $this->db->get_where($this->tableName, ['id' => $id])->result()[0];
    }

    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function verificarUsuario($usuario, $senha){
        $query = $this->db
                    ->where('usuario', $usuario)
                    ->where('senha', md5($senha))
                    ->where('ativo', 1)
                    ->limit(1)
                    ->get($this->tableName);

        if($query->num_rows() > 0){
            return $query->row();
        }
        return false;
    }

    public function verificarUsuarioExiste($usuario){
        $query = $this
                    ->db
                    ->where('usuario', $usuario)
                    ->limit(1)
                    ->get($this->tableName);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
    public function verificarEmailExiste($email){
        $query = $this
                    ->db
                    ->where('email', $email)
                    ->limit(1)
                    ->get($this->tableName);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
}

?>
