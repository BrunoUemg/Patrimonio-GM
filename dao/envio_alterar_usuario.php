<?php

include_once "../dao/conexao.php";



$nomeUsuario = $con->escape_string($_POST['nomeUsuario']);
$userAcesso = $con->escape_string($_POST['userAcesso']);
$idUsuario = $con->escape_string($_POST['idUsuario']);
$cadastrarEntidade = $con->escape_string($_POST['cadastrarEntidade']);
$visualizarEntidade = $con->escape_string($_POST['visualizarEntidade']);
$editarEntidade = $con->escape_string($_POST['editarEntidade']);
$cadastrarUnidade = $con->escape_string($_POST['cadastrarUnidade']);
$visualizarUnidade = $con->escape_string($_POST['visualizarUnidade']);
$editarUnidade = $con->escape_string($_POST['editarUnidade']);
$cadastrarTipoSubTipo = $con->escape_string($_POST['cadastrarTipoSubTipo']);
$visualizarTipoSubTipo = $con->escape_string($_POST['visualizarTipoSubTipo']);
$editarTipoSubTipo = $con->escape_string($_POST['editarTipoSubTipo']);
$cadastrarPatrimonio = $con->escape_string($_POST['cadastrarPatrimonio']);
$visualizarPatrimonio = $con->escape_string($_POST['visualizarPatrimonio']);
$editarPatrimonio = $con->escape_string($_POST['editarPatrimonio']);
$alterarFotoPatrimonio = $con->escape_string($_POST['alterarFotoPatrimonio']);
$visualizarFotoPatrimonio = $con->escape_string($_POST['visualizarFotoPatrimonio']);
$visualizarNotaFiscal = $con->escape_string($_POST['visualizarNotaFiscal']);
$baixaPatrimonio = $con->escape_string($_POST['baixaPatrimonio']);
$visualizarHistoricoPatrimonio = $con->escape_string($_POST['visualizarHistoricoPatrimonio']);
$baixadosPatrimonio = $con->escape_string($_POST['baixadosPatrimonio']);
$visualizarBaixadosPatrimonio = $con->escape_string($_POST['visualizarBaixadosPatrimonio']);
$cadastrarSala = $con->escape_string($_POST['cadastrarSala']);
$visualizarSala = $con->escape_string($_POST['visualizarSala']);
$editarSala = $con->escape_string($_POST['editarSala']);
$gerarPDF_ResponsavelSala = $con->escape_string($_POST['gerarPDF_ResponsavelSala']);
$inserirTermoSala = $con->escape_string($_POST['inserirTermoSala']);
$visualizarRelatorioTermoSala = $con->escape_string($_POST['visualizarRelatorioTermoSala']);
$movimentacaoUnica = $con->escape_string($_POST['movimentacaoUnica']);
$movimentacaoGeral = $con->escape_string($_POST['movimentacaoGeral']);
$relatorioPatrimonioSala = $con->escape_string($_POST['relatorioPatrimonioSala']);
$relatorioMovimentacao = $con->escape_string($_POST['relatorioMovimentacao']);
$relatorioCadastro = $con->escape_string($_POST['relatorioCadastro']);
$relatorioBaixas = $con->escape_string($_POST['relatorioBaixas']);
$iniciarInventario = $con->escape_string($_POST['iniciarInventario']);
$patrimonioAchado = $con->escape_string($_POST['patrimonioAchado']);
$patrimonioPerdido = $con->escape_string($_POST['patrimonioPerdido']);
$patrimonioIdentificar = $con->escape_string($_POST['patrimonioIdentificar']);
$cadastrarResponsavel = $con->escape_string($_POST['cadastrarResponsavel']);
$visualizarResponsavel = $con->escape_string($_POST['visualizarResponsavel']);
$editarResponsavel = $con->escape_string($_POST['editarResponsavel']);
$cadastrarUsuario = $con->escape_string($_POST['cadastrarUsuario']);


$con->query("UPDATE usuario SET nomeUsuario = '$nomeUsuario', userAcesso = '$userAcesso' where idUsuario = '$idUsuario'");


$update = $con->query("UPDATE `nivel_acesso` SET 
`cadastrarEntidade`='$cadastrarEntidade',`visualizarEntidade`='$visualizarEntidade',`editarEntidade`='$editarEntidade',
`cadastrarUnidade`='$cadastrarUnidade',`visualizarUnidade`='$visualizarUnidade',`editarUnidade`='$editarUnidade',
`cadastrarTipoSubTipo`='$cadastrarTipoSubTipo',`visualizarTipoSubTipo`='$visualizarTipoSubTipo',`editarTipoSubTipo`='$editarTipoSubTipo',
`cadastrarPatrimonio`='$cadastrarPatrimonio',`visualizarPatrimonio`='$visualizarPatrimonio',`editarPatrimonio`='$editarPatrimonio',
`alterarFotoPatrimonio`='$alterarFotoPatrimonio',`visualizarFotoPatrimonio`='$visualizarFotoPatrimonio',`visualizarNotaFiscal`='$visualizarNotaFiscal',
`baixaPatrimonio`='$baixaPatrimonio',`visualizarHistoricoPatrimonio`='$visualizarHistoricoPatrimonio',`baixadosPatrimonio`='$baixadosPatrimonio',
`visualizarBaixadosPatrimonio`='$visualizarBaixadosPatrimonio',`cadastrarSala`='$cadastrarSala',`visualizarSala`='$visualizarSala',
`editarSala`='$editarSala',`gerarPDF_ResponsavelSala`='$gerarPDF_ResponsavelSala',`inserirTermoSala`='$inserirTermoSala',
`visualizarRelatorioTermoSala`='$visualizarRelatorioTermoSala',`movimentacaoUnica`='$movimentacaoUnica',`movimentacaoGeral`='$movimentacaoGeral',
`relatorioPatrimonioSala`='$relatorioPatrimonioSala',`relatorioMovimentacao`='$relatorioMovimentacao',`relatorioCadastro`='$relatorioCadastro',
`relatorioBaixas`='$relatorioBaixas',`iniciarInventario`='$iniciarInventario',`patrimonioAchado`='$patrimonioAchado',
`patrimonioPerdido`='$patrimonioPerdido',`patrimonioIdentificar`='$patrimonioIdentificar',`cadastrarResponsavel`='$cadastrarResponsavel',
`visualizarResponsavel`='$visualizarResponsavel',`editarResponsavel`='$editarResponsavel',`cadastrarUsuario`='$cadastrarUsuario' WHERE idUsuario = '$idUsuario'");

if ($update === true) {

    $id['idEntidade'] = $_POST['idEntidade'];
    $con->query("DELETE FROM entidade_usuario where idUsuario = '$idUsuario'");
    foreach ($id['idEntidade'] as $idEntidade) {
        $con->query("INSERT INTO entidade_usuario (idUsuario, idEntidade) VALUES ('$idUsuario', '$idEntidade')");
    }



    echo "<script>alert('Alterado com sucesso!');window.location='../view/visualizar_usuario.php?idUsuario=$idUsuario'</script>";
    exit();
} else {
    echo "Erro para inserir: " . $con->error;
    /*echo "<script>alert('erro!');window.location='../view/cadastrar_usuario.php'</script>";
exit();*/
}
