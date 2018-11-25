<?php

    include('verifica.adm.php');
    include('../conexao.php');
    include('campos_cadastro.php');

//função para formatar cpf
function mask($val, $mask){
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        }
        else {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

    $cpfFormatado=mask($cpf,'###.###.###-##');

    //Pesquisas para verificar se os campos informados no formulário ja existem no banco
    $queryTesteUsuario="select usuario from usuario where usuario='{$usuario}';";
    $pesquisaQueryTesteUsuario=mysqli_query($conexao,$queryTesteUsuario);

    $queryTesteCpf="select usuario from usuario where cpf='{$cpfFormatado}';";
    $pesquisaQueryTesteCpf=mysqli_query($conexao,$queryTesteCpf);


    $queryTesteMatricula="select usuario from usuario where matricula='{$matricula}';";
    $pesquisaQueryTesteMatricula=mysqli_query($conexao,$queryTesteMatricula);


//Verifica se os dados informados ja existem no banco de dados
if(mysqli_num_rows($pesquisaQueryTesteUsuario)=='1'){
    header('Location: cadastrar_usuario.php');
    $_SESSION['usuario_invalido']=true;
    $_SESSION['error_campos']=true;
    $_SESSION['campos']=[$nome,$usuario,$cpf,$matricula];
    exit();
}elseif(mysqli_num_rows($pesquisaQueryTesteCpf)=='1'){
    header('Location: cadastrar_usuario.php');
    $_SESSION['cpf_invalido']=true;
    $_SESSION['error_campos']=true;
    $_SESSION['campos']=[$nome,$usuario,$cpf,$matricula];
    exit();
}elseif(mysqli_num_rows($pesquisaQueryTesteMatricula)=='1'){
    header('Location: cadastrar_usuario.php');
    $_SESSION['matricula_invalido']=true;
    $_SESSION['error_campos']=true;
    $_SESSION['campos']=[$nome,$usuario,$cpf,$matricula];
    exit();
}else {
    unset($_SESSION['campos']);
    unset($_SESSION['error_campos']);
}