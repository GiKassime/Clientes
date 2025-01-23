<?php 
require_once ("model/Cliente.php");
require_once ("model/ClientePJ.php");
require_once ("model/ClientePF.php");
require_once("util/Conexao.php");
class ClienteDAO {

    public  function inserirCliente(Cliente $cliente){
        $sql = "INSERT INTO clientes (tipo,nome_social,email,nome,cpf,razao_social,cnpj) 
        VALUES 
        (?,?,?,?,?,?,?)";
        $con = Conexao::getConn();
        $stm = $con->prepare($sql);
        if ($cliente instanceof ClientePF) {
            $stm->execute(array($cliente->getTipo(),
                                $cliente->getNomeSocial(),
                                $cliente->getEmail(),
                                $cliente->getNome(),
                                $cliente->getCpf(),
                                null,
                                null));
        }elseif ($cliente instanceof ClientePJ) {
            $stm->execute(array($cliente->getTipo(),
                                $cliente->getNomeSocial(),
                                $cliente->getEmail(),
                                null,
                                null,
                                $cliente->getRazaoSocial(),
                                $cliente->getCnpj()));
        }
        
    }
}

?>