<?php 
require_once ("../model/Cliente.php");
require_once ("../model/ClientePF.php");
require_once ("../model/ClientePJ.php");
class ClienteDAO {

    public  function inserirCliente(Cliente $cliente){
        $sql = "INSERT INTO clientes (tipo,nome_social,email,nome,cpf,razao_social,cnpj) 
        VALUES 
        (?,?,?,?,?,?,?)";
    }
}

?>