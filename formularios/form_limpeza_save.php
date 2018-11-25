<?php
    //Verifica se o usuário está logado
    session_start();
    include('../verifica_conexao.php');
    include('../conexao.php');


    //Faz uma consulta no banco e retorna os dados do usuario logado
    $usuario1 = $_SESSION['usuario'];
    $query2 = "select * from usuario where usuario = '{$usuario1}'";
    $result2 = mysqli_query($conexao,$query2);
    $rows = mysqli_fetch_assoc($result2);

    //as variáveis recebem os dados enviados do formulário
    $veiculo = $_POST['inputVeiculo'];
    $resposta1= $_POST['question1'];
    $resposta2= $_POST['question2'];
    $resposta3= $_POST['question3'];
    $resposta4= $_POST['question4'];
    $observacao= $_POST['areaObs'];

    //Algoritmo para pegar informaçoes sobre data e hora local
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    $hora = date('H:i');
    $mesTodos=array('', 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');
    $mes=$mesTodos[date('m')];
    $dia = date('d-m-Y');
    $ano=date('Y');

    //Insere no banco a data atual em que o formulario foi preenchido
    $queryData = "insert into data(dia,mes,ano,hora) VALUES ('{$dia}','{$mes}','{$ano}','{$hora}');";
    $resultadoQueryData = mysqli_query($conexao,$queryData);

    //Consulta para retornar o id da data, para sincronizar posteriormente com os dados do formulário
    $queryDataId= "select data_id from data where dia='{$dia}' and hora='{$hora}';";
    $resultadoQueryDataId= mysqli_query($conexao,$queryDataId);
    $idData = mysqli_fetch_assoc($resultadoQueryDataId);

    //Insere os dados do formulário no banco
    $usuarioId= $rows['usuario_id'];
    $queryInsertForm = "INSERT INTO form_limpeza(usuario_id,veiculo,resposta1,resposta2,resposta3,resposta4,observacao,data_id) VALUES('{$usuarioId}','{$veiculo}','{$resposta1}','{$resposta2}','{$resposta3}','{$resposta4}','{$observacao}','{$idData['data_id']}')";
    $insertQuery=mysqli_query($conexao,$queryInsertForm);

    echo $date."</br>";
    echo $rows['nome']."</br>";
    echo $veiculo."</br>";
    echo $resposta1."</br>";
    echo $resposta2."</br>";
    echo $resposta3."</br>";
    echo $resposta4."</br>";
    echo $observacao;

    ?>