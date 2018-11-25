<?php
    session_start();
    include('verifica.adm.php');
    include('../verifica_conexao.php');





    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <--! <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/cadastrar_usuario.css">

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
            <li><a  href="atualizar_usuario.php">Atualizar usuários</a></li>
            <li><a href="../logout.php">Sair</a></li>
        </ul>
    </nav>
    <div class="bg"> </div>
</header>


<!--img src="./imagens/onibus.jpg" class="imagem"-->




<div class="cadastro">

    <form method="POST" action="cadastrar_save.php" class ="formCadastro">
        <div class="contCadastro">
            <h1>Cadastro de usuário</h1>
            <div class="field">
                <label class="label">Nome</label>
                <div class="control">
                    <input class="input" type="text" name="nome" placeholder="Nome do servidor"
                           <?php if(isset($_SESSION['error_campos'])):?>value="<?php $nome=$_SESSION['campos'];echo $nome[0];?>" <?php endif;?>
                       required>
                </div>
                <label class="label">Usuário</label>
                <div class="control">
                    <input class="input" type="text" name="usuario" placeholder="Digite um usuário válido"
                    <?php if(isset($_SESSION['error_campos'])):?>value="<?php $usuario=$_SESSION['campos'];echo $usuario[1];?>" <?php endif; ?>
                       required>



                    <?php
                    if(isset($_SESSION['usuario_invalido'])):
                    ?>
                     <p class="help is-danger">Usuário invalido</p>
                    <?php
                    endif;
                    unset($_SESSION['usuario_invalido']);
                    ?>
                </div>

                <label class="label">Senha</label>
                <div class="control">
                    <input class="input" type="password" name="senha" placeholder="Digite a senha"required>
                </div>

                <label class="label">CPF</label>
                <div class="control">
                    <input class="input" type="text" name="cpf" maxlength="11" minlength="11" placeholder="Digite apenas números"
                        <?php if(isset($_SESSION['error_campos'])):?>value="<?php $cpf=$_SESSION['campos'];echo $cpf[2];?>" <?php endif; ?>
                        required>
                    <?php
                    if(isset($_SESSION['cpf_invalido'])):
                    ?>
                    <p class="help is-danger">Cpf invalido</p>
                    <?php
                        endif;
                        unset($_SESSION['cpf_invalido']);
                    ?>
                </div>

                <label class="label">Matrícula</label>
                <div class="control">
                    <input class="input" type="text" name="matricula" placeholder="Digite a matrícula do servidor"
                       <?php if(isset($_SESSION['error_campos'])):?>value="<?php $matricula=$_SESSION['campos'];echo $matricula[3];?>" <?php endif; unset($_SESSION['campos']); ?>
                       required>
                    <?php
                        if(isset($_SESSION['matricula_invalido'])):
                    ?>
                    <p class="help is-danger">Matrícula invalido</p>
                    <?php
                        endif;
                        unset($_SESSION['matricula_invalido']);
                    ?>
                </div>

                <div class="seletorAdm">
                    <div class="divLabelAdm">
                        <label class="label">Administrador</label>
                    </div>
                    <div class="control">
                        <div class="select">
                            <select name="adm">
                                <option  id="admSim" value="sim">Sim</option>
                                <option  id="admNao" value="nao" selected>Não</option>
                            </select>
                        </div>
                </div>
                </div>
            </div>


            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Salvar</button>
                </div>
            </div>


        </div>
    </form>

</div>

<!--script type="text/javascript">
    document.querySelector('input[name=nome]').addEventListener('blur', ev => {
        fetch({
            url: '/consulta_nome.php',
            body:
        })
    });
</script-->

</body>

