<?php
require_once 'model/ClientePF.php';
require_once 'model/ClientePJ.php';
require_once './dao/ClienteDAO.php';
require_once 'util/Conexao.php';
//Teste conexão
//$con = Conexao::getConn();
//print_r($con);
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
            //criar o objeto a ser persistido
            $cliente = new ClientePF();
            $cliente->setNome(readline("Nome:"));
            $cliente->setNomeSocial(readline("Nome Social:"));
            $cliente->setCpf(readline("CPF:"));
            $cliente->setEmail(readline("Email:"));
            $clienteDao = new ClienteDAO();
            $clienteDao->inserirCliente($cliente);
            echo "Cliente PF cadastrado com sucesso!\n";
            break;
        case 2:
            //Cadastra PJ
            $cliente = new ClientePJ();
            $cliente->setRazaoSocial(readline("Razão Social:"));
            $cliente->setNomeSocial(readline("Nome Social:"));
            $cliente->setCnpj(readline("CNPJ:"));
            $cliente->setEmail(readline("Email:"));
            $clienteDao = new ClienteDAO();
            $clienteDao->inserirCliente($cliente);
            echo "Cliente PJ cadastrado com sucesso!\n";

            break;
        case 3:
            //Buscar os objt do bdd
            $clienteDao = new ClienteDAO();
            $clientes = $clienteDao->listarClientes();
            foreach ($clientes as $c) {
                printf("%d | %s | %s | %s | %s\n", $c->getId(), $c->getTipo(), $c->getNomeSocial(), $c->getIdentificacao(), $c->getNroDoc(), $c->getEmail());
            }
            break;
        case 4:
            $clienteDao = new  ClienteDAO();
            $cliente = $clienteDao->buscarPorId($id);
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
