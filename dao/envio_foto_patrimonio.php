<?php

include_once "conexao.php";
session_start();
$idPatrimonio = $_POST['idPatrimonio'];

if(!empty($_FILES["fotoPatrimonio"]["name"])){
    $pasta_arquivo = "../foto_patrimonio/";
    
  
    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG","pdf","PDF");
    $extensao = pathinfo($_FILES['fotoPatrimonio']['name'], PATHINFO_EXTENSION);
  
    if(in_array($extensao, $formatos)){
      $pasta = "../foto_patrimonio/";
      $temporario = $_FILES['fotoPatrimonio']['tmp_name'];
      $arquivo = "fotoPatrimonio-".$idPatrimonio.".".$extensao;
  
      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $con->query("UPDATE patrimonio SET fotoPatrimonio = '$arquivo' where idPatrimonio = '$idPatrimonio'"); 
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Foto alterada com sucesso!</div>';
        header("Location: ../view/consultar_patrimonio.php");
        exit();
      }
    }
    
  }