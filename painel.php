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
    <img src="./imagens/login_celular.png">

    <input type="checkbox" id="chk">

    <label for="chk" class="menu-icon">&#9776</label>
    <div class="bg"></div>

    <div class="divNomeMat">
        <div>
            <h1 class="title">
                <h2 id="servNome"><?php echo $_SESSION['nomeServidor'] ?></h2>
            </h1>

        </div>
    </div>
    <nav class="menu" id="principal">
        <ul>


            <li><a class="voltar" href="painel.php">Menu Principal</a></li>

            <li><a href="#Amostragem">Conferência por Amostragem<span>+</span></a></li>

            <li><a href="#Funcionamento">Indicador de Acessibilidade<span>+</span></a></li>

            <li><a href="#Limpeza">Indicador de Limpeza<span>+</span></a></li>

            <li><a href="#Afericao_combustivel">Aferição combustível<span>+</span></a></li>

            <?php
            if(isset($_SESSION['adm'])):
                ?>
                <li><a href="#Gerenciamento">Gerenciamento de usuários<span>+</span></a></li>
            <?php
            endif;
            ?>

            <li><a href="logout.php">Sair</a></li>


        </ul>
    </nav>


    <nav class="menu" id="Amostragem">
        <ul>
            <li><a href="#" class="voltar">Voltar</a></li>
            <li><a href="#">Registrar</a></li>
            <li><a href="#">Registros</a></li>
        </ul>
    </nav>

    <nav class="menu" id="Funcionamento">
        <ul>
            <li><a href="#" class="voltar">Voltar</a></li>
            <li><a href="#">Registrar</a></li>
            <li><a href="#">Registros</a></li>
        </ul>
    </nav>

    <nav class="menu" id="Limpeza">
        <ul>
            <li><a href="#" class="voltar">Voltar</a></li>
            <li><a href="./formularios/form_limpeza.php">Registrar</a></li>
            <li><a href="#">Registros</a></li>
        </ul>
    </nav>

    <nav class="menu" id="Afericao_combustivel">
        <ul>
            <li><a href="#" class="voltar">Voltar</a></li>
            <li><a href="./afericao/afericao_combustivel.php">Registrar</a></li>
            <li><a href="./afericao/registros.php">Registros</a></li>
        </ul>
    </nav>

    <nav class="menu" id="Gerenciamento">
        <ul>
            <li><a href="#" class="voltar">Voltar</a></li>
            <li><a href="./gerenciamento_usuario/cadastrar_usuario.php">Cadastrar usuário</a></li>
            <li><a href="./gerenciamento_usuario/atualizar_usuario.php">Atualizar usuários</a></li>
        </ul>
    </nav>





</header>



<!--img src="./imagens/onibus.jpg" class="imagem"-->









</body>
</html>