<?php 

include_once "conexao.php";


$idPatrimonio = $con->escape_string($_POST['idPatrimonio']);
if(!empty($_POST['idSala'])){
    $idSala = $con->escape_string($_POST['idSala']);
    $con->query("UPDATE patrimonio set idSala = '$idSala' where idPatrimonio = '$idPatrimonio'");
    echo "<script>alert('Movimentação feita com sucesso!');window.location='../view/consultar_patrimonio.php'</script>";
    exit;
}else{


$codigoPatrimonio = $con->escape_string($_POST['codigoPatrimonio']);
$descricaoPatrimonio = $con->escape_string($_POST['descricaoPatrimonio']);
$conservacao = $con->escape_string($_POST['conservacao']);
$idStatus = $con->escape_string($_POST['idStatus']);
$idEntidade = $con->escape_string($_POST['idEntidade']);
$idSubtipo = $con->escape_string($_POST['idSubtipo']);
$notaFiscal = $con->escape_string($_POST['notaFiscal']);

$SELECT_PATRIMONIO = "SELECT * FROM patrimonio where codigoPatrimonio = '$codigoPatrimonio'";
$res = $con->query($SELECT_PATRIMONIO);
$linha = $res->fetch_assoc();

if(isset($linha['codigoPatrimonio']) && $linha['idPatrimonio'] != $idPatrimonio){
    echo "<script>alert('Patrimônio com esse nome ja cadastrado!');window.location='../view/consultar_patrimonio.php'</script>";
    exit;
}else{

    $con->query("UPDATE patrimonio set descricaoPatrimonio = '$descricaoPatrimonio', codigoPatrimonio = '$codigoPatrimonio', conservacao = '$conservacao',
    idStatus = '$idStatus', idEntidade = '$idEntidade', idSubtipo = '$idSubtipo', notaFiscal = '$notaFiscal' where idPatrimonio = '$idPatrimonio'");
    echo "<script>alert('Alterado com sucesso!');window.location='../view/consultar_patrimonio.php'</script>";
    exit;
}

}

?>