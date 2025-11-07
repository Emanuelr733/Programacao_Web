<?php
require_once 'clsConexao.php';
class clsPessoa{

    private $conexao;
    private $id;
    private $nome;
    private $idade;

    public function __construct(){
        $this->conexao = clsConexao::getInstancia();
    }

    //propriedade nome
    public function setNome($valor){$this->nome = $valor;}
    public function getNome(){return $this->nome;}

    //propriedade idade
    public function setIdade($valor){$this->idade = $valor;}
    public function getIdade(){return $this->idade;}

    //propriedade id
    public function setId($valor){$this->id = $valor;}
    public function getId(){return $this->id;}

    //metodo para inserir uma pessoa no banco
    public function inserir(){
        $sql = 'INSERT INTO tb_pessoa (nome, idade) VALUES (?, ?);';
        $parametros = [$this->nome, $this->idade];
        $resultado = $this->conexao->executarSQL($sql, $parametros);
        return $resultado->affected_rows > 0;
    }
    //metodo para excluir uma pessoa no banco
    public function excluir(){
        $sql = 'DELETE FROM tb_pessoa WHERE id = ?;';
        $parametros = [$this->id];
        $resultado = $this->conexao->executarSQL($sql, $parametros);
        return $resultado->affected_rows > 0;
    }
    //metodo para consultar as pessoas no banco
    public function listar(){
        $sql = 'SELECT * FROM tb_pessoa;';
        $resultado = $this->conexao->executarSQL($sql);
        $tabela = $resultado->get_result();
        return $tabela->fetch_all(MYSQLI_ASSOC);
    }
}
?>