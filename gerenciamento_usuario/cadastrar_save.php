<?php
    session_start();

    include('../verifica_conexao.php');
    include('campos_cadastro.php');
    include('verifica_campos_cadastro.php');
    //include('../conexao.php');


    $nome=strtoupper($nome);


    unset($_SESSION['campos']);

    //Query para inserir usuario no banco
    $query2= "insert into usuario(usuario,senha,nome,cpf,matricula,administrador) values('{$usuario}',md5('{$senha}'),'{$nome}','{$cpfFormatado}','{$matricula}','{$adm}');";
    $insereQuery2 = mysqli_query($conexao,$query2);

    if($insereQuery2==1){
        echo 'USUARIO INSERIDO COM SUCESSO.</br>.</br>';


    }else echo 'Não foi possivel inserir o usuario';



    ?>

<a href="../painel.php" font-size="20px"> Voltar para o menu principal</a></br>
<a href="cadastrar_usuario.php"> Voltar para a tela de cadastros</a></br>