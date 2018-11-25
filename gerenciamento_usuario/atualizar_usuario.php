<?php
    session_start();
    include('../verifica_conexao.php');
    include('verifica.adm.php');
    include('../conexao.php');

    $nome='Chrystian freitas';
    $query="select * from usuario;";
    $pesquisaQuery=mysqli_query($conexao,$query);

    $numLinhas=mysqli_num_rows($pesquisaQuery);

    ?>


<!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8">
                <title>Menu Principal</title>
                <--! <meta name="viewport" content="width=device-width, initial-scale=1"> -->
                <link rel="stylesheet" href="../css/painel.css">
                <link rel="stylesheet" href="../css/bulma.min.css">
                <link rel="stylesheet" href="../css/atualizar_usuario.css">

            </head>



        <body>

            <header>
                <div class="divNomeMat">
                    <div>
                        <h1 class="title">
                            <h2 id="servNome"><?php echo $_SESSION['nomeServidor'] ?> </h2>
                        </h1>

                    </div>
                </div>
            <!--img src="./imagens/amtt.png"-->
                <input type="checkbox" id="chk">
                <label for="chk" class="menu-icon">&#9776</label>

                <nav class="menu" id="principal">
                    <ul>
                        <li><a class="voltar" href="../painel.php">Menu Principal</a></li>
                        <li><a  href="#">Atualizar usuários</a></li>
                        <li><a href="../logout.php">Sair</a></li>
                    </ul>
                </nav>
                <div class="bg"> </div>
            </header>



        <div class="corpo">
            <div>
            <table class="table">
                <thead t>
                <tr>
                    <th>N</th>
                    <th>NOME</th>

                    <th>CPF</th>
                    <th>MATRICULA</th>
                    <th>ADM</th>
                </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>
                <?php
                    if($numLinhas>0):
                        while ($resultQuery=mysqli_fetch_assoc($pesquisaQuery)) {

                ?>
                    <tr>
                        <th>1</th>
                        <td><?= $resultQuery['nome']?></td>
                        <td><?= $resultQuery['cpf'] ?></td>
                        <td><?= $resultQuery['matricula'] ?></td>
                        <td><?= $resultQuery['administrador'] ?></td>
                    </tr>
                <?php
                        }
                    endif;

                ?>
                </tbody>
            </table>
            </div>
        </div>


        </body>
    </html>