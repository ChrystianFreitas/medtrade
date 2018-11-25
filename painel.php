<?php
    session_start();
    include('verifica_conexao.php');
    include('conexao.php');

    $usuario = $_SESSION['usuario'];
    $query2 = "select * from usuario where usuario = '{$usuario}'";
    $result2 = mysqli_query($conexao,$query2);
    $rows = mysqli_fetch_assoc($result2);

    $_SESSION['nomeServidor']=$rows['nome'];

    $administrador=$rows['administrador'];
    if($administrador =='sim'){
        $_SESSION['adm']=true;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/painel.css">

</head>

<body>

<header>
   
<input type="checkbox" id="chk">
        <label for="chk" class="menu-icon">&#9776</label>
        <div class="estrutura_header">
        
        
        <div class="imagem-logo">
            <img src="./imagens/login_celular.png" id="id_img_logo">
        </div>
        <label for="chk" class="menu-icon">&#9776</label>
        <div class="bg"></div>

        
    </div>
    <nav class="menu" id="principal">
        <ul>


            <li><a class="voltar" href="painel.php">MENU PRINCIPAL</a></li>

            <li><a href="./telasMenu/lista_medicamentos.php">ANTIONEOPLÁSTICO</a></li>
            <li><a href="#">IMUNOSSUPRESSORES</a></li>
            <li><a href="#">IMUNOGLOBINAS</a></li>
            <li><a href="#">ANTI-INFLAMATÓRIOS</a></li>
            <li><a href="#">PRODUTOS COM DESCONTO</a></li>
            <li><a href="#">FARMACOS</a></li>
            <li><a href="logout.php">SAIR</a></li>

           

        </ul>
    </nav>




</header>

    <div class="segundo-header">
        <div class="boas-vindas">
            <div><h1>Olá</h1></div>
            <div><h1 class="title">
                        <h2 id="servNome"><?php echo strtoupper($_SESSION['nomeServidor']).'!'?></h2>
                    </h1>
            </div>
        </div>
        <div class="estrutura-searchbar">
            <form method="get" action="/search" id="search">
               </span> <input name="q" type="text" size="40" placeholder="Procurando um medicamento?" />
            </form>
        </div>
    </div>
    <div>



    <table style="padding-top: 5% !important;">
        <tbody>
            <tr>
                <td>
                    <img style="width: 105%;" src="./imagens/01.png">
                </td>
                <td>
                    <img style="width: 105%;" src="./imagens/02.png">
                </td>
                <td>
                    <img style="width: 105%;" src="./imagens/03.png">
                </td>
            </tr>
            <tr>
                <td>
                    <h6 style="font-family:Palatino Linotype">ANTIONEOPLÁSTICO</h6>
                </td>
                <td>
                    <h6 style="font-family:Palatino Linotype">IMUNOSSUPRESSORES</h6>
                </td>
                <td>
                    <h6 style="font-family:Palatino Linotype">IMUNOGLOBINAS</h6>
                </td>
            </tr>
        <tbody>
    </table>
    <hr style="margin-right: 30%; margin-top: 9%;">
    <table>
        <tbody>
            <tr>
                <td>
                    <img style="width: 105%;" src="./imagens/04.png">
                </td>
                <td>
                    <img style="width: 105%;" src="./imagens/05.png">
                </td>
                <td>
                    <img style="width: 105%;" src="./imagens/06.png">
                </td>
            </tr>
            <tr>
                <td>
                    <h6 style="font-family:Palatino Linotype">ANTI-INFLAMATÓRIOS</h6>
                </td>
                <td>
                    <h6 style="font-family:Palatino Linotype">PRODUTOS COM</h6>
                    <h6 style="font-family:Palatino Linotype">DESCONTO</h6>
                </td>
                <td>
                    <h6>FARMACOS</h6>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
        <div class="rodape">
            <div><label class="labelRodape">CNPJ:12.345.678/0009-42</label></div>
            <div><label class="labelRodape2">Contato: medtrade@yahoo.com</label></div>
        </div>
</body>


</html>