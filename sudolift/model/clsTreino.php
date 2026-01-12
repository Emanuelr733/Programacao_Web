<?php
// Arquivo: model/clsTreino.php
require_once '../controller/clsConexao.php';

class clsTreino
{
    private $id;
    private $usuario_id;
    private $nome_treino;
    private $data_treino;
    private $comentario;

    // Getters e Setters
    public function setId($v) { $this->id = $v; }
    public function getId() { return $this->id; }

    public function setUsuarioId($v) { $this->usuario_id = $v; }
    public function getUsuarioId() { return $this->usuario_id; }

    public function setNomeTreino($v) { $this->nome_treino = $v; }
    public function getNomeTreino() { return $this->nome_treino; }

    public function setDataTreino($v) { $this->data_treino = $v; }
    
    public function setComentario($v) { $this->comentario = $v; }

    // --- MÉTODOS ---

    // 1. INICIAR NOVO TREINO
    public function inserir()
    {
        $conexao = new clsConexao();
        $sql = "INSERT INTO treinos (usuario_id, nome_treino, data_treino, comentario) 
                VALUES ('$this->usuario_id', '$this->nome_treino', '$this->data_treino', '$this->comentario')";
        
        $conexao->executaSQL($sql);
        
        // Retorna o ID desse treino que acabou de ser criado (precisaremos disso para adicionar exercícios nele)
        return $conexao->ultimoID();
    }

    // 2. LISTAR TREINOS DE UM USUÁRIO ESPECÍFICO
    public function listarMeusTreinos($id_do_usuario)
    {
        $conexao = new clsConexao();
        // Ordena do mais recente para o mais antigo
        $sql = "SELECT * FROM treinos WHERE usuario_id = $id_do_usuario ORDER BY data_treino DESC";
        return $conexao->executaSQL($sql);
    }
}
?>