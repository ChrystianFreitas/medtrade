<?php
    session_start();
    include('../verifica_conexao.php');
    include('../conexao.php');



    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMTT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/form_limpeza.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/painel.css">

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




<!--img src="./imagens/onibus.jpg" class="imagem"-->




<div class="corpo">

    <form class="limp" method="POST" action="form_limpeza_save.php">

        <div class="formulario">
            <h1>Formulário Nível de Limpeza</h1>
            <div class="field">
                <!--h2 id="servMat">Matriula: <?php echo $rows['matricula']?></h2></br-->
                <div class="control">
                    <label class="label_veiculo" for="txtVeiculo">Veículo <input class="input is-info" type="text" maxlength="4"  name="inputVeiculo" id="txtVeiculo" placeholder="Prefixo do veículo" required></label></br>
                </div>
            </div>

            <div class="divField1">
                <fieldset class="field1"><legend class="lgdLimp">Limpeza do Veículo</legend>
                    <div class="contDivField1">

                            <div class="linhas">
                                <div class="divLabels">
                                    <label >Ausente de barro / poeira na parte externa.</label>
                                </div>
                                <div class="radioBtn">
                                    <label class="radio">
                                        <input type="radio" name="question1" id="respostaSim1" value="Sim" checked>Sim</label>
                                    <label class="radio"><input type="radio" name="question1" id="respostaNao1" value="Nao">Não</label>
                                </div>

                            </div>


                            <div class="linhas">
                                <div class="divLabels">
                                    <label >Ausente de barro / poeira na parte interna.</label>
                                </div>
                                <div class="radioBtn">
                                    <label class="radio">
                                        <input type="radio" name="question2" id="respostaSim2" value="Sim" checked>Sim</label>
                                    <label class="radio"><input type="radio" name="question2" id="respostaNao2" value="Nao">Não</label>
                                </div>
                            </div>

                            <div class="linhas">
                                <div class="divLabels">
                                    <label >Ausente lixo no interior do veículo.</label>
                                </div>
                                <div class="radioBtn">
                                    <label class="radio">
                                        <input type="radio" name="question3" id="respostaSim3" value="Sim" checked>Sim</label>
                                    <label class="radio"><input type="radio" name="question3" id ="respostaNao3" value="Nao">Não</label>
                                </div>
                            </div>

                            <div class="linhas">
                                <div class="divLabels">
                                    <label>Ausente mau odor no interior do vículo.</label>
                                </div>
                                <div class="radioBtn">
                                    <label class="radio">
                                        <input type="radio" name="question4" id="respostaSim4" value="Sim" checked>Sim</label>
                                    <label class="radio"><input type="radio" name="question4" id="respostaNao4" value="Nao">Não</label>
                                </div>
                            </div>


                    </div>

                </fieldset>
            </div>

            <div class="divField2">
                <fieldset class="field2"><legend class="lgdObs">Observação</legend>
                    <div class ="divTextArea">
                        <div class="control">
                            <textarea class="textarea is-small" type="text" id="textAreaLimpeza" name="areaObs" placeholder="Observação"></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="btnSalvar">
                <input class="button is-info" type="submit" value="Salvar">
            </div>
        </div>
    </form>
</div>



</body>

</html>

