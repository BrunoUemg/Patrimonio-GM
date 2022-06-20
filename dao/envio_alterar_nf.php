<?php 

include_once "conexao.php";

$idPatrimonio = $_POST['idPatrimonio'];
session_start();
if(!empty($_FILES["arquivoNF"]["name"])){
    $pasta_arquivo = "../nota_fiscal/";
    
  
    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG","PDF");
    $extensao = pathinfo($_FILES['arquivoNF']['name'], PATHINFO_EXTENSION);
  
    if(in_array($extensao, $formatos)){
      $pasta = "../nota_fiscal/";
      $temporario = $_FILES['arquivoNF']['tmp_name'];
      $arquivoAntigo = "comprovanteFiscal-".$idPatrimonio.".pdf";
      unlink("../nota_fiscal/$arquivoAntigo");
      $arquivo = "comprovanteFiscal-".$idPatrimonio.".".$extensao;
  
      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE patrimonio set comprovanteFiscal = '$arquivo' where idPatrimonio = '$idPatrimonio'";
        if($con->query($sql)=== true){ 
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">NF alterado com sucesso!</div>';
            header("Location: ../view/consultar_patrimonio.php");
            exit();
        }else {
             echo "Erro para inserir: " . $con->error; }
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Não foi possível enviar o arquivo!</div>';
            header("Location: ../view/consultar_patrimonio.php");
            exit();
        } 
      }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Extensão não reconhecida pelo sistema!</div>';
        header("Location: ../view/consultar_patrimonio.php");
        exit();
      }
    }