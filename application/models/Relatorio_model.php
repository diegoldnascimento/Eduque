<?php
class Relatorio_model extends CI_Model {

    public function pegarTotalAlunosTurma(){
        $sql = "SELECT COUNT(*) AS total
                FROM aluno AS a
                INNER JOIN turmaAluno AS ta ON (a.id = ta.aluno_id)";
        return $this->db->query($sql)->result()[0]->total;
    }

    public function pegarTotalAlunos($periodoInicial, $periodoFinal){
        $sql = "SELECT COUNT(*) AS total, CONCAT(YEAR(dtCadastro), '-', MONTH(dtCadastro)) as data
                FROM aluno AS a
                WHERE dtCadastro BETWEEN '{$periodoInicial}' AND '{$periodoFinal}'
                GROUP BY data
                ";

       return $this->db->query($sql)->result();
    }

    public function pegarAlunos($periodoInicial, $periodoFinal){
        $sql = "SELECT *
                FROM aluno AS a
                WHERE dtCadastro BETWEEN '{$periodoInicial}' AND '{$periodoFinal}'";

       return $this->db->query($sql)->result();
    }

    public function pegarUltimosAlunosCadastradosPorCurso($periodoInicial, $periodoFinal){
        $sql = "SELECT *
                FROM curso AS c
                INNER JOIN turmaCurso AS tc ON (c.id = tc.curso_id)
                INNER JOIN turma AS t ON (t.id = tc.turma_id)";

        $query = $this->db->query( $sql );

        $cursosQuery = $query->result();

        foreach($cursosQuery as $curso){
            $cursos[] = array(
                'id' => $curso->id,
                'nome' => $curso->nome,
                'codigo' => $curso->codigo,
                'turma_id' => $curso->turma_id
            );
        }

        foreach($cursos as $curso){
            $sql = "SELECT *
                    FROM turmaAluno AS ta
                    INNER JOIN aluno AS a ON (a.id = ta.aluno_id)
                    WHERE ta.turma_id = {$curso['turma_id']} AND (a.dtCadastro BETWEEN '{$periodoInicial}' AND '{$periodoFinal}')";

            @$resultado[] = [
                'aluno' => $this->db->query($sql)->result()[0],
                'curso' => $curso
            ];

        }
        return $resultado;
    }

    public function pegarTotalUltimosAlunosCadastradosPorCurso($periodoInicial, $periodoFinal){
        $sql = "SELECT *
                FROM curso AS c
                INNER JOIN turmaCurso AS tc ON (c.id = tc.curso_id)
                INNER JOIN turma AS t ON (t.id = tc.turma_id)";

        $query = $this->db->query( $sql );

        $cursosQuery = $query->result();

        foreach($cursosQuery as $curso){
            $cursos[] = array(
                'id' => $curso->id,
                'nome' => $curso->nome,
                'codigo' => $curso->codigo,
                'turma_id' => $curso->turma_id
            );
        }

        foreach($cursos as $curso){
            $sql = "SELECT COUNT(ta.aluno_id) as total
                    FROM turmaAluno AS ta
                    INNER JOIN aluno AS a ON (a.id = ta.aluno_id)
                    WHERE ta.turma_id = {$curso['turma_id']} AND (a.dtCadastro BETWEEN '{$periodoInicial}' AND '{$periodoFinal}')";

            $query = $this->db->query($sql)->result()[0];

            $resultado[] = array(
                'id' => $curso['id'],
                'nome' => $curso['nome'],
                'codigo' => $curso['codigo'],
                'total' => $query->total
            );
        }
        return $resultado;
    }

    public function pegarQuantidadeAcessos($periodoInicial, $periodoFinal){
        $sql = "SELECT *
                FROM usuario AS u
                WHERE DATE(ultimoAcesso) BETWEEN '{$periodoInicial}' AND '{$periodoFinal}'";

        $query = $this->db->query( $sql );
        return $query->result();
    }

    public function  pegarTotalQuantidadeAcessos($periodoInicial, $periodoFinal){
        $sql = "SELECT COUNT(*) AS total, CONCAT(YEAR(ultimoAcesso), '-', MONTH(ultimoAcesso)) as data
                FROM usuario AS u
                WHERE DATE(ultimoAcesso) BETWEEN '{$periodoInicial}' AND '{$periodoFinal}'

                GROUP BY data";

        $query = $this->db->query( $sql );

        return $query->result();
    }
}
?>
