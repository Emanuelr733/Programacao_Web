<?php
// Arquivo: model/clsUsuario.php

// Importa a classe de conexão que acabamos de criar
require_once '../controller/clsConexao.php';

class clsUsuario
{
    # VARIAVEIS PRIVADAS (Espelho da tabela 'usuarios' do banco)
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $perfil; // 'admin' ou 'atleta'
    
    # PROPRIEDADES (Getters e Setters)
    
    public function setId($valor) { $this->id = $valor; }
    public function getId() { return $this->id; }

    public function setNome($valor) { $this->nome = $valor; }
    public function getNome() { return $this->nome; }

    public function setEmail($valor) { $this->email = $valor; }
    public function getEmail() { return $this->email; }

    public function setSenha($valor) { $this->senha = $valor; }
    public function getSenha() { return $this->senha; }

    public function setPerfil($valor) { $this->perfil = $valor; }
    public function getPerfil() { return $this->perfil; }

    # METODOS
    
    /* Método para verificar login */
    public function logar()
    {
        $conexao = new clsConexao();
        
        // Busca o usuário pelo e-mail
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email'";
        $resultado = $conexao->executaSQL($sql);

        // Se achou alguém com esse email
        if (mysqli_num_rows($resultado) > 0) {
            $dados = mysqli_fetch_assoc($resultado);
            
            // Verifica a senha (usando hash seguro)
            // Se a senha no banco bater com a senha digitada:
            if (password_verify($this->senha, $dados['senha'])) {
                // Preenche os dados deste objeto com o que veio do banco
                $this->id     = $dados['id'];
                $this->nome   = $dados['nome'];
                $this->perfil = $dados['perfil'];
                return true; // Login Sucesso
            }
        }
        return false; // Login Falhou
    }
    // Método para alterar a senha
    public function atualizarSenha($nova_senha_hash)
    {
        $conexao = new clsConexao();
        // Atualiza a senha onde o ID for igual ao ID deste objeto
        $sql = "UPDATE usuarios SET senha = '$nova_senha_hash' WHERE id = $this->id";
        return $conexao->executaSQL($sql);
    }
}
?>