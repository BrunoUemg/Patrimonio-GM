<?php
include_once "conexao.php";

$userAcesso = $_POST['userAcesso'];
$senha = $_POST['senha'];

if($userAcesso == null || $senha == null){
    $_SESSION['invalido'] = msg_erro('Login invalido');
    echo "<script>alert('Usuário ou senha incorreta !');window.location='../login_gm.php'</script>";
    exit;
}

$result_usuario = "SELECT * FROM usuario where userAcesso = '$userAcesso'";
$res = $con->query($result_usuario);
$linha = $res->fetch_assoc();

$idUsuario = $linha['idUsuario'];
$nomeUsuario = $linha['nomeUsuario'];
$userAcesso_db = $linha['userAcesso'];
$senha_db = $linha['senha'];
$acesso = $linha['acesso'];
$idEntidade = $linha['idEntidade'];

if($userAcesso_db = $userAcesso && password_verify($senha,$senha_db) ){
    session_start();

    $_SESSION['nomeUsuario'] = $nomeUsuario;
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['acesso'] = $acesso;
    $_SESSION['idEntidade'] = $idEntidade;
    $_SESSION['patrimonio'] = true;
    header('location: ../index.php');

}else{
    echo "<script>alert('Usuário ou senha incorreta !');window.location='../login_gm.php'</script>";
}








