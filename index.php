<?php
require_once 'model/ClientePF.php';
require_once 'model/ClientePJ.php';
require_once './dao/ClienteDAO.php';
require_once 'util/Conexao.php';
function listaClientes(){
    $clienteDao = new ClienteDAO();
    $clientes = $clienteDao->listarClientes();
    foreach ($clientes as $c) {
        printf("%d | %s | %s | %s | %s\n", $c->getId(), $c->getTipo(), $c->getNomeSocial(), $c->getIdentificacao(), $c->getNroDoc(), $c->getEmail());
    }
}
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
            listaClientes();
            break;
        case 4:
            listaClientes();
            $id = readline("Digite o ID do cliente: ");
            $clienteDao = new  ClienteDAO();
            $c = $clienteDao->buscarPorId($id) ;
            if ($c) {
                printf("%d | %s | %s | %s | %s\n", $c->getId(), $c->getTipo(), $c->getNo1meSocial(), $c->getIdentificacao(), $c->getNroDoc(), $c->getEmail());
            }else{
                echo "\nCliente com id ".$id." não encontrado!\n";
            }
            break;
        case 5:
            listaClientes();
            $id = readline("Digite o ID do cliente a ser excluido: ");
            $clienteDao = new ClienteDAO();
            $c = $clienteDao->buscarPorId($id) ;
            if ($c != null) {
                if($clienteDao->excluirCliente($c->getId())){
                    echo "\nCliente excluido com sucesso!\n";
                }else{
                    echo "\nErro ao excluir cliente!\n";
                }
            }else{
                echo "\nCliente com id ".$id." não encontrado!\n";
            }
            break;
        case 0:
            echo "\nPrograma encerrado\n";
            break;

        default:
            echo "\nOpção Inválida\n";
            break;
    }
} while ($opcao != 0);
