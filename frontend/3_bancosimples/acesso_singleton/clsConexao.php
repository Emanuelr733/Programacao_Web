<?php
//classe responsavel por gerenciar a conexao e o acesso ao mysql
//Padrao SINGLETON
class clsConexao{
    //variaveis privadas
    private static $instancia = null;
    private $conexao;
    //metodo construtor
    private function __construct(){
        $this->conexao = new mysqli('localhost','root','','bd_teste');

        if ($this->conexao->connect_error){
            die('Erro de conexão: '. $this->conexao->connect_error);
        }
    }

    //metodo que retorna uma conexao com o mysql
    public static function getInstancia(){
        if(!self::$instancia){
            self::$instancia = new clsConexao();
        }
        return self::$instancia;
    }

    private function detectarTipos($parametros){
        $tipos = '';
        foreach($parametros as $parametro){
            if(is_int($parametro)){
                $tipos .= 'i';
            } elseif(is_double($parametro) || is_float($parametro)){
                $tipos .= 'd';
            } elseif(is_string($parametro)){
                $tipos .= 's';
            } else{
                $tipos .= 'b';
            }
        }
        return $tipos;
    }

    public function executarSQL($sql, $parametros = []){
        $comando = $this->conexao->prepare($sql);

        if(!empty($parametros)){
            $tipos = $this->detectarTipos($parametros);
            $comando->bind_param($tipos, ...$parametros);
        }
        $comando->execute();
        return $comando;
    }
}
?>