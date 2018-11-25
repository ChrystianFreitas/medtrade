<?php
    session_start();
    include('../verifica_conexao.php');
    include('../conexao.php');

    $query="SELECT * FROM afericao_combustivel inner join afericao_fotos on afericao_combustivel.afericao_fotos_id = afericao_fotos.afericao_fotos_id inner join usuario on usuario.usuario_id = afericao_combustivel.usuario_id inner join data on afericao_combustivel.data_id = data.data_id inner join frota_vcg on frota_vcg.id= afericao_combustivel.frota_vcg_id;";
    $pesquisaQuery=mysqli_query($conexao, $query);
    $resusltQuery= mysqli_fetch_assoc($pesquisaQuery);

    $numLinhas=mysqli_num_rows($pesquisaQuery);



    ?>


<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>AMTT</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
            <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="../css/painel.css">
            <link rel="stylesheet" href="../css/registros.css">


            <script language='JavaScript'>
                function SomenteNumero(e){
                    var tecla=(window.event)?event.keyCode:e.which;
                    if((tecla>47 && tecla<58)) return true;
                    else{
                        if (tecla==8 || tecla==0) return true;
                        else  return false;
                    }
                }

                function preViewVeiculo(idFoto){
                    texto='src="./fotos/'+idFoto+'"';
                    document.getElementById("fotoVeiculoView").style="display:block";
                    document.getElementById("fotoVeiculoView").texto;

                }


                function desviewVeiculo(){
                    document.getElementById("fotoVeiculoView").style="display:none";

                }
            </script>



        </head>
        <body>

            <header>
            <input type="checkbox" id="chk">
            <label for="chk" class="menu-icon">&#9776</label>
            <!--img src="../imagens/amtt.png"-->
            <div class="divNomeMat">
                <div>
                    <h1 class="title">
                        <h2 id="servNome"><?php echo $_SESSION['nomeServidor'];?> </h2>
                    </h1>

                </div>
            </div>

            <nav class="menu" id="principal">
                <ul>


                    <li><a class="voltar" href="../painel.php">Menu Principal</a></li>

                    <li><a href="../logout.php">Sair</a></li>

                </ul>
            </nav>


            <div class="bg"></div>
            </header>
            <div class="estrutura-registros">
                <div class="content">
                    <table id="lista">
                        <thead>
                            <tr>
                                <th>Servidor</th>
                                <th>Veículo</th>
                                <th>Odometro</th>
                                <th>Litros</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($numLinhas>0):
                                $i=0;
                            while ($resultQuery=mysqli_fetch_assoc($pesquisaQuery)) {

                                ?>
                                <tr <?= $resultQuery['afericao_combustivel_id']; ?>>
                                    <td onmousemove='preViewVeiculo()'  id="<?=$resultQuery['usuario_id'];?>"><?= $resultQuery['nome'];?></td>
                                    <td id="<?=$resultQuery['fotoVeiculo']?>"><?= $resultQuery['prefixo'];?></td>
                                    <td id="<?=$resultQuery['fotoOdometro']?>"><?= $resultQuery['odometro'];?></td>
                                    <td id="<?=$resultQuery['fotoLitros']?>"><?= $resultQuery['litros'];?></td>
                                    <td <?="'.(++$i)"; ?>><?= $resultQuery['dia'];?></td>
                                </tr>

                                <?php
                            }
                            endif;
                        ?>


                        </tbody>
                    </table>

                </div>
                <img id="fotoVeiculoView" src="fotos/1a9179dac76c25e1de4e344a5c4b4232.jpg" style="display: none">
            </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript">
                $(document).ready( function () {
                    $('#lista').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
                        }
                    });
                } );
            </script>
        </body>
</html>