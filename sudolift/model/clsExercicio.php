<?php
// Arquivo: model/clsExercicio.php
require_once '../controller/clsConexao.php';

class clsExercicio
{
    private $id;
    private $nome;
    private $grupo_muscular;
    private $tipo; // Barra, Halter, Máquina

    // Getters e Setters
    public function setId($valor) { $this->id = $valor; }
    public function getId() { return $this->id; }

    public function setNome($valor) { $this->nome = $valor; }
    public function getNome() { return $this->nome; }

    public function setGrupoMuscular($valor) { $this->grupo_muscular = $valor; }
    public function getGrupoMuscular() { return $this->grupo_muscular; }

    public function setTipo($valor) { $this->tipo = $valor; }
    public function getTipo() { return $this->tipo; }

    // --- MÉTODOS CRUD ---

    // 1. INSERIR (Create)
    public function inserir()
    {
        $conexao = new clsConexao();
        $sql = "INSERT INTO exercicios (nome, grupo_muscular, tipo) 
                VALUES ('$this->nome', '$this->grupo_muscular', '$this->tipo')";
        
        return $conexao->executaSQL($sql);
    }

    // 2. LISTAR TODOS (Read - para a tabela)
    public function listar()
    {
        $conexao = new clsConexao();
        $sql = "SELECT * FROM exercicios ORDER BY nome ASC";
        return $conexao->executaSQL($sql);
    }

    // 3. BUSCAR POR ID (Read - para preencher o formulário de edição)
    public function buscarPeloId($id_procurado)
    {
        $conexao = new clsConexao();
        $sql = "SELECT * FROM exercicios WHERE id = $id_procurado";
        $resultado = $conexao->executaSQL($sql);
        return mysqli_fetch_assoc($resultado);
    }
    
    // 4. EXCLUIR (Delete)
    public function excluir($id_para_deletar)
    {
        $conexao = new clsConexao();
        $sql = "DELETE FROM exercicios WHERE id = $id_para_deletar";
        return $conexao->executaSQL($sql);
    }
}
?>