<?php
    if(!$_SESSION['adm']){
    header('Location: ../painel.php');
    exit();
}