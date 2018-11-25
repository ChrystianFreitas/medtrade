<?php
    session_start();
    include('../verifica_conexao.php');
    ?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>AMTT</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../css/bulma.min.css"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
            <link rel="stylesheet" href="../css/painel.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="../css/afericao_combustivel.css">

            <script type="text/javascript">
                function fMasc(objeto,mascara) {
                    obj=objeto;
                    masc=mascara;
                    setTimeout("fMascEx()",1);
                }
                function fMascEx() {
                    obj.value=masc(obj.value);
                }

                function mNum(num){
                    num=num.replace(/\D/g,"")
                   // num=num.replace(/(\d)(\d{1})/,"$1.$2")
                    num=num.replace(/(\d{1})(\d{1,1})$/,"$1.$2") // coloca virgula antes dos ultimos 2 digitos
                    return num
                }
            </script>

            <script language='JavaScript'>
                function SomenteNumero(e){
                    var tecla=(window.event)?event.keyCode:e.which;
                    if((tecla>47 && tecla<58)) return true;
                    else{
                        if (tecla==8 || tecla==0) return true;
                        else  return false;
                    }
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
                        <h2 id="servNome"><?php echo $_SESSION['nomeServidor'] ?> </h2>
                    </h1>

                </div>
            </div>

            <nav class="menu" id="principal">
                <ul>


                    <li><a class="voltar" href="../painel.php">Menu Principal</a></li>

                    <li><a href="../logout.php">Sair</a></li>

                </ul>
            </nav>


            <div class="bg"> </div>
            </header>

        <div class="corpo">
                <div class="titulo">
                    <h1>Aferição Combustível</h1>
                </div>
            <form method="POST" action="afericao_combustivel_save.php" enctype="multipart/form-data">
                <div class="estrutura">
                    <div class="linhas">
                        <div class="linhaParte1">
                            <label  for="txtVeiculo">Veículo</label>
                            <?php
                                    if(isset($_SESSION['error-afericao'])):
                                ?>
                                    <p class="help is-danger">Veículo inválido</p>
                                <?php
                                    endif;
                                    
                                ?>
                            <div class="inputs">
                                <input input class="input is-info" type="text" onkeypress='return SomenteNumero(event)' maxlength="4"  name="inputVeiculo" id="txtVeiculo" placeholder="Prefixo do veículo" required  <?php if(isset($_SESSION['error-afericao'])):?>value="<?php $veiculo=$_SESSION['campos-afericao'];echo $veiculo[0];?>" <?php endif; ?>>
                               

                                <input type="file" accept="image/*;capture=camera" id="fotoVeiculo" required name="foto_veiculo" onchange="previewFile('#previewFotoVeiculo','#fotoVeiculo')">
                                <div class="botao">
                                    <label class="botaoLabel" for="fotoVeiculo">Tirar Foto<span class="glyphicon glyphicon-camera"></label>
                                </div>
                            </div>
                        </div>
                        <div class="linhaParte2">
                            <img class="images" src="" alt="" id="previewFotoVeiculo">
                        </div>
                    </div>

                    <div class="linhas">
                        <div class="linhaParte1">
                            <Label for="txtOdometro">Odômetro</Label>
                            <div class="inputs">
                                <input input class="input is-info" onkeypress='return SomenteNumero(event)' onkeydown="javascript: fMasc(this, mNum);" type="text" maxlength="9"  name="inputOdometro" id="txtOdometro" placeholder="Quilometragem" required <?php if(isset($_SESSION['error-afericao'])):?>value="<?php $odometro=$_SESSION['campos-afericao'];echo $odometro[1];?>" <?php endif; ?>>
                                <input type="file" accept="image/*;capture=camera" required id="fotoOdometro" name="foto_odometro" onchange="previewFile('#previewFotoOdometro','#fotoOdometro')">
                                <div class="botao">
                                    <label class="botaoLabel" for="fotoOdometro">Tirar Foto<span class="glyphicon glyphicon-camera"></label>
                                </div>
                            </div>
                        </div>
                        <div class="linhaParte2">
                            <img class="images" src="" alt="" id="previewFotoOdometro">
                        </div>

                    </div>

                    <div class="linhas">
                        <div class="linhaParte1">
                            <Label for="txtLitros">Litros abastecidos</Label>
                            <div class="inputs">
                                <input input class="input is-info" type="text" maxlength="6" onkeypress='return SomenteNumero(event)' onkeydown="javascript: fMasc(this, mNum);" name="inputLitros" id="txtLitros" placeholder="Litros Abastecidos" required <?php if(isset($_SESSION['error-afericao'])):?>value="<?php $litros=$_SESSION['campos-afericao'];echo $litros[2];?>" <?php endif; unset($_SESSION['campos-afericao']); unset($_SESSION['error-afericao'])?>>
                                <input type="file" accept="image/*;capture=camera" required id="fotoLitros" name="foto_litros" onchange="previewFile('#previewFotoLitros','#fotoLitros')">
                                <div class="botao">
                                    <label class="botaoLabel" for="fotoLitros">Tirar Foto<span class="glyphicon glyphicon-camera"></label>
                                </div>
                            </div>
                        </div>
                        <div class="linhaParte2">
                            <img class="images" src="" alt="" id="previewFotoLitros">
                        </div>



                    </div>
                    <div class="btnSalvar">
                        <input class="button is-info" type="submit" value="Enviar">

                    </div>
                </div>
            </form>
        </div>

            <script type="text/javascript" src="../js/afericao_combustivel.js"></script>

        </body>

    </html>



