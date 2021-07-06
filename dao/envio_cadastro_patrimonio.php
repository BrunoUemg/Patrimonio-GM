<?php 

include_once "conexao.php";
session_start();
$codigoPatrimonio = $con->escape_string($_POST['codigoPatrimonio']);
$descricaoPatrimonio = $con->escape_string($_POST['descricaoPatrimonio']);
$idSala = $con->escape_string($_POST['idSala']);
$conservacao = $con->escape_string($_POST['conservacao']);
$idStatus = $con->escape_string($_POST['idStatus']);
$idEntidade = $con->escape_string($_POST['idEntidade']);
$idSubtipo = $con->escape_string($_POST['idSubtipo']);
$notaFiscal = $con->escape_string($_POST['notaFiscal']);

if($idSala == null || $idSubtipo == null || $idStatus == null || $conservacao == null || $descricaoPatrimonio == null){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Não foi possível fazer o cadastro, campos em branco</div>';
		header("Location: ../view/cadastrar_patrimonio.php");
      exit; 
}

$SELECT_PATRIMONIO = $con->query("SELECT * FROM patrimonio WHERE codigoPatrimonio='$codigoPatrimonio'");

if(mysqli_num_rows($SELECT_PATRIMONIO) > 0){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Patrimônio já cadastrado!</div>';
    header("Location: ../view/cadastrar_patrimonio.php");
exit();
}else{
      $con->query("INSERT INTO patrimonio (descricaoPatrimonio,codigoPatrimonio, idSala, conservacao, idStatus, idEntidade, notaFiscal, idSubtipo, inventario)
      VALUES('$descricaoPatrimonio','$codigoPatrimonio', '$idSala', '$conservacao','$idStatus', '$idEntidade', '$notaFiscal', '$idSubtipo', 1)"); 
      echo "<script>alert('Patrimônio cadastrado com sucesso!');window.location='../view/cadastrar_patrimonio.php'</script>";  
}

?>