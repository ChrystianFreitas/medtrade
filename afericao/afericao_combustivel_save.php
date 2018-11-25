<?php
    session_start();
    include('../verifica_conexao.php');
    include('../conexao.php');


    //Faz uma consulta no banco e retorna os dados do usuario logado
    $usuario = $_SESSION['usuario'];
    $query = "select * from usuario where usuario = '{$usuario}'";
    $result = mysqli_query($conexao,$query);
    $rows = mysqli_fetch_assoc($result);

    // Recupera os dados dos campos
    $veiculo = $_POST['inputVeiculo'];


    $fotoVeiculo = $_FILES["foto_veiculo"];

    $odometro= $_POST['inputOdometro'];
    $fotoOdometro= $_FILES['foto_odometro'];

    $litros = $_POST['inputLitros'];
    $fotoLitros = $_FILES['foto_litros'];

    //verifica se o veiculo existe
    $queryVeiculo="select * from frota_vcg where prefixo='{$veiculo}'";
    $pesquisaVeiculo= mysqli_query($conexao,$queryVeiculo);
    $resultVeiculo=mysqli_fetch_assoc($pesquisaVeiculo);
    $numRowsVeiculo=mysqli_num_rows($pesquisaVeiculo);
    if($numRowsVeiculo==0){
        $_SESSION['campos-afericao']=[$veiculo,$odometro,$litros];
        $_SESSION['error-afericao']=true;
        header('Location: afericao_combustivel.php');
        exit();
    }

    $error = array();

    function salvarfoto($foto1,$foto2,$foto3,$conexao){      
        // Se a foto estiver sido selecionada
        if (!empty($foto1["name"])){
            // Largura máxima em pixels
            $largura = 5000;
            // Altura máxima em pixels
            $altura = 5000;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 50000000000;
            $error = array();

            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto1["type"])){
                $error[1] = "Isso não é uma imagem.";
            }


            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto1["tmp_name"]);

            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }

            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }

            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($foto1["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }



                // Se não houver nenhum erro
                if (count($error) == 0) {

                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext);
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext);
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto3["name"], $ext);

                    // Gera um nome único para a imagem
                    $nome_imagem1 = md5(uniqid(time()).'foto1') . "." . $ext[1];
                    $nome_imagem2 = md5(uniqid(time()).'foto2') . "." . $ext[1];
                    $nome_imagem3 = md5(uniqid(time()).'foto3') . "." . $ext[1];
                    $_SESSION['fotos']=[$nome_imagem1,$nome_imagem2,$nome_imagem3];

                    // Caminho de onde ficará a imagem
                    $caminho_imagem1 = "fotos/" . $nome_imagem1;
                    $caminho_imagem2 = "fotos/" . $nome_imagem2;
                    $caminho_imagem3 = "fotos/" . $nome_imagem3;

                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto1["tmp_name"], $caminho_imagem1);
                    move_uploaded_file($foto2["tmp_name"], $caminho_imagem2);
                    move_uploaded_file($foto3["tmp_name"], $caminho_imagem3);

                    // Insere os dados no banco
                    $queryFoto ="INSERT INTO afericao_fotos(fotoVeiculo,fotoOdometro,fotoLitros) VALUES('{$nome_imagem1}','{$nome_imagem2}','{$nome_imagem3}');";

                    $sql=mysqli_query($conexao, $queryFoto);

                   
                }

                // Se houver mensagens de erro, exibe-as
                if (count($error) != 0) {
                    foreach ($error as $erro) {
                    echo $erro . "<br />";
                    }
                }
        }

        

    }

    //salvar fotos
    salvarfoto($fotoVeiculo,$fotoOdometro,$fotoLitros,$conexao);
    $fotosSession=$_SESSION['fotos'];
    $queryFoto="select * from afericao_fotos where fotoVeiculo = '{$fotosSession[0]}' and fotoOdometro='{$fotosSession[1]}'and fotoLitros ='{$fotosSession[2]}';";
    $pesquisaFoto= mysqli_query($conexao,$queryFoto);
    $resultFotos=mysqli_fetch_assoc($pesquisaFoto);
    
    

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

    $queryBanco= "insert into afericao_combustivel(usuario_id,frota_vcg_id,afericao_fotos_id,odometro,litros,data_id) values('{$rows['usuario_id']}','{$resultVeiculo['id']}','{$resultFotos['afericao_fotos_id']}', '{$odometro}', '{$litros}', '{$idData['data_id']}');";
    $queryInsereBanco = mysqli_query($conexao,$queryBanco);

    if($queryInsereBanco){
        unset($_SESSION['campos-afericao']);
        unset($_SESSION['error-afericao']);
    }

?>
    

    
<html>
    <!DOCTYPE html> 
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>AMTT</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../css/bulma.min.css"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="../css/afericao_combustivel.css">
            <link rel="stylesheet" type="text/css" media="screen" href="../css/afericao_sucesso.css">


        </head>


        <body>
            <div class="estrutura">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">AFERIÇÃO REALIZADA COM SUCESSO</h4>
                
                    <hr>
                    <a href='../painel.php' class="button is-link">Voltar para o menu principal</a>
                    <br>
                    <br>
                    <a href='./afericao_combustivel.php' class="button is-link">Realizar outra aferição</a>
                </div>
            </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pica/5.0.0/pica.min.js?fbclid=IwAR15CiTDPG7wwucUA8qgabrq4oZi2nThp0qb-6dHKxnWObReA6ScoOk-UuQ"></script>
        </body>
</html>

