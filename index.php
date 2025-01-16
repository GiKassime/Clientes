<?php
require_once 'model/ClientePF.php';
require_once 'model/ClientePJ.php';
// require_once 'util/Conexao.php';
//Teste conexão
// $con = Conexao::getConn();
// print_r($con)
do {
    echo "\n-----CADASTRO DE CLIENTES-----\n
    1- CADASTRAR CLIENTE PF\n
    2- CADASTRAR CLIENTE PJ\n
    3- LISTAR CLIENTES\n
    4- BUSCAR CLIENTE\n
    5- EXCLUIR CLIENTE\n
    0- SAIR \n\n";
    $opcao = readline("Informe a opção:");
    switch ($opcao) {
        case 1:
            $cliente = new ClientePF();
            $cliente->setNome(readline("Nome:"));            
            $cliente->setNomeSocial(readline("Nome Social:"));
            $cliente->setCpf(readline("CPF:"));
            $cliente->setEmail(readline("Email:"));
            break;
        case 2:
            $cliente = new ClientePJ();
            $cliente->setRazaoSocial(readline("Razão Social:"));            
            $cliente->setNomeSocial(readline("Nome Social:"));
            $cliente->setCnpj(readline("CNPJ:"));
            $cliente->setEmail(readline("Email:"));
            break;
        case 3:
            # code...
            break;
        case 4:
            # code...
            break;
        case 5:
            # code...
            break;
        case 0:
            echo "\nPrograma encerrado\n";
            break;

        default:
            echo "\nOpção Inválida\n";
            break;
    }
} while ($opcao != 0);
