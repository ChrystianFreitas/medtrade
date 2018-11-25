<?php
    session_start();
    include('conexao.php');

    //se um ou ambos dos campos estiverem vazios, retorna ao index
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: index.php');
        exit();
    }

    //As variaveis recebem os dados vindos através do POST
    $usuario = mysqli_real_escape_string($conexao,$_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);

    //Busca no banco de dados se a senha e usuário informado combinam com algum registro
    $query= "select usuario_id from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);

    //verifica se a senha e usuario informados estao corretos
    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: painel.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
    