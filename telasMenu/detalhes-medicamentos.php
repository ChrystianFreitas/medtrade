<?php
     session_start();
     include('../verifica_conexao.php');
    
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/detalhes-medicamentos.css">
    <link rel="stylesheet" href="../css/bulma.min.css"

</head>

<body>

<header>
   
<input type="checkbox" id="chk">
    


        <a href="../painel.php"  class="menu-icon" style="text-decoration:none">&larr;</a>
        <div class="estrutura_header">
        
        
        <div class="imagem-logo">
            <h1 id="titulo">Produtos com descontos</h1>
            <!--img src="../imagens/login_celular.png" id="id_img_logo"-->
        </div>
        
        <div class="bg"></div>



        
    </div>  

</header>
    <div class="estrutura-detalhes">
        <div class="imagemMedicamento"> 
        <img id="image"src="../imagens/t06.png">
        <div>
        <div class="descricaoMed">
            <label>Yervoy 50mg 1 ampola com 10 ml</label>
        </div>
        <div class="conteudoMed">
            <label class="labelsConteudo">Deescrição do medicamento</label></br>
            <label class="labelsConteudo">__________________________________</label></br>

            <label class="labelsConteudo">Armazenamento</label></br>
            <label class="labelsConteudo">__________________________________</label></br>

            <label class="labelsConteudo">Modo de usar</label></br>
            <label class="labelsConteudo">__________________________________</label></br>

            <label class="labelsConteudo">Bula</label></br>
            <label class="labelsConteudo">__________________________________</label>
        </div>
        <div class="fimMed">
        <div class="divReais">
                <label id="reais">R$ 22.500,00<label>
            </div>
        <div>
            <a class="button is-success">Comprar</a>
        </div>
            
        </div>
    <div>
    
</body>


</html>