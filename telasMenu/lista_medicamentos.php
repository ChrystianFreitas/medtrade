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
    <link rel="stylesheet" href="../css/lista_medicamento.css">

</head>

<body>

<header>
   
<input type="checkbox" id="chk">
    


        <a href="../painel.php"  class="menu-icon" style="text-decoration:none">&larr;</a>
        <div class="estrutura_header">
        
        
        <div class="imagem-logo">
            <img src="../imagens/login_celular.png" id="id_img_logo">
        </div>
        
        <div class="bg"></div>



        
    </div>
    




</header>
<h3 style="padding-top: 20% !important; text-align: center;"><b>PRODUTOS COM DESCONTO</b></h3>
    
    <ul>
        <li>
            <table>
                <tbody>
                    <tr onclick="locantio.href='detalhes-medicamentos.php'">
                        <td>
                            <img style="width: 80%;" src="../imagens/301.png">
                        </td>
                            <td>
                            <h3><a style="color:black; text-decoration:none" href="detalhes-medicamentos.php">Afinador 10mg com 30 comprimidos</a></h3>
                            <h5 style="color: grey;">Vence em: 40 dias</h5>
                            <h3 style="color: #56A7AF; margin-top: 10%;">R$ 10.500,00</h3>
                            <h5 style="color: grey;">12x R$1.041,00 sem juros</h5>
                        </td>
                    </tr>
                <tbody>
            </table>
        </li>
    </ul>

    <ul>
        <li>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img style="width: 80%;" src="../imagens/302.png">
                        </td>
                            <td>
                            <h3>Afinador 10mg com 30 comprimidos</h3>
                            <h5 style="color: grey;">Vence em: 40 dias</h5>
                            <h3 style="color: #56A7AF; margin-top: 10%;">R$ 10.500,00</h3>
                            <h5 style="color: grey;">12x R$1.041,00 sem juros</h5>
                        </td>
                    </tr>
                <tbody>
            </table>
        </li>
    </ul>

    <ul>
        <li>
            <table>
                <tbody>

                    <tr>
                        <td>
                            <img style="width: 80%;" src="../imagens/303.png">
                        </td>
                            <td>
                            <h3>Sustent 50mg, com 28 capsulas</h3>
                            <h5 style="color: grey;">Vence em: 70 dias</h5>
                            <h3 style="color: #56A7AF; margin-top: 10%;">R$ 17.350,00</h3>
                            <h5 style="color: grey;">12x R$1.445,00 sem juros</h5>
                        </td>
                    </tr>
                <tbody>
            </table>
        </li>
    </ul>

    <ul>
        <li>
            <table>
                <tbody>

                    <tr>
                        <td>
                            <img style="width: 80%;" src="../imagens/304.png">
                        </td>
                            <td>
                            <h3>Alimta 50mg, frasco com 50ml</h3>
                            <h5 style="color: grey;">Vence em: 75 dias</h5>
                            <h3 style="color: #56A7AF; margin-top: 10%;">R$ 9.380,00</h3>
                            <h5 style="color: grey;">12x R$1.041,00 sem juros</h5>
                        </td>
                    </tr>
                <tbody>
            </table>
        </li>
    </ul>

    <ul>
        <li>
            <table>
                <tbody>

                    <tr>
                        <td>
                            <img style="width: 80%;" src="../imagens/305.png">
                        </td>
                            <td>
                            <h3>Zytiga 250mg com CT FR Plas</h3>
                            <h5 style="color: grey;">Vence em: 45 dias</h5>
                            <h3 style="color: #56A7AF; margin-top: 10%;">R$ 11.500,00</h3>
                            <h5 style="color: grey;">12x R$958,00 sem juros</h5>
                        </td>
                    </tr>
                    <tbody>
            </table>
        </li>
    </ul>
</body>


</html>