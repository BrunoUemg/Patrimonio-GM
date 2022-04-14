<?php

include_once "conexao.php";



$nomeUsuario = $con->escape_string($_POST['nomeUsuario']);
$userAcesso = $con->escape_string($_POST['userAcesso']);

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

$senha_segura = password_hash($userAcesso, PASSWORD_DEFAULT);

if ($userAcesso == null) {
    echo "<script>alert('Erro!');window.location='../view/cadastrar_usuario.php'</script>";
    exit;
}

$SELECT_USUARIO = $con->query("SELECT * FROM usuario WHERE userAcesso='$userAcesso'");

if (mysqli_num_rows($SELECT_USUARIO) > 0) {
    echo "<script>alert('Usuário já cadastrado!');window.location='../view/cadastrar_usuario.php'</script>";
    exit();
} else {


    $setQueryUsuario = $con->query("INSERT INTO usuario (nomeUsuario, userAcesso, senha, acesso)VALUES('$nomeUsuario', '$userAcesso', '$senha_segura', 2)");

    if ($setQueryUsuario === true) {
    } else {
        echo "Erro para inserir: " . $con->error;
        /*echo "<script>alert('erro!');window.location='../view/cadastrar_usuario.php'</script>";
    exit();*/
    }

    $idUsuario = mysqli_insert_id($con);

    $setNivelAcessoquery = $con->query("INSERT INTO `nivel_acesso`(
       `idUsuario`, `cadastrarEntidade`, `visualizarEntidade`, `editarEntidade`,
        `cadastrarUnidade`, `visualizarUnidade`, `editarUnidade`, `cadastrarTipoSubTipo`,
        `visualizarTipoSubTipo`, `editarTipoSubTipo`, `cadastrarPatrimonio`, `visualizarPatrimonio`,
         `editarPatrimonio`, `alterarFotoPatrimonio`, `visualizarFotoPatrimonio`, `visualizarNotaFiscal`,
          `baixaPatrimonio`, `visualizarHistoricoPatrimonio`, `baixadosPatrimonio`, `visualizarBaixadosPatrimonio`,
           `cadastrarSala`, `visualizarSala`, `editarSala`, `gerarPDF_ResponsavelSala`, `inserirTermoSala`,
            `visualizarRelatorioTermoSala`, `movimentacaoUnica`, `movimentacaoGeral`, `relatorioPatrimonioSala`,
             `relatorioMovimentacao`, `relatorioCadastro`, `relatorioBaixas`, `iniciarInventario`,
              `patrimonioAchado`, `patrimonioPerdido`, `patrimonioIdentificar`, `cadastrarResponsavel`,
               `visualizarResponsavel`, `editarResponsavel`, `cadastrarUsuario`)
                VALUES ('$idUsuario','$cadastrarEntidade','$visualizarEntidade','$editarEntidade','$cadastrarUnidade',
                '$visualizarUnidade','$editarUnidade','$cadastrarTipoSubTipo',
                '$visualizarTipoSubTipo','$editarTipoSubTipo','$cadastrarPatrimonio','$visualizarPatrimonio','$editarPatrimonio',
                '$alterarFotoPatrimonio','$visualizarFotoPatrimonio','$visualizarNotaFiscal',
                '$baixaPatrimonio','$visualizarHistoricoPatrimonio','$baixadosPatrimonio','$visualizarBaixadosPatrimonio',
                '$cadastrarSala','$visualizarSala','$editarSala','$gerarPDF_ResponsavelSala',
                '$inserirTermoSala','$visualizarRelatorioTermoSala','$movimentacaoUnica','$movimentacaoGeral',
                '$relatorioPatrimonioSala','$relatorioMovimentacao','$relatorioCadastro','$relatorioBaixas',
                '$iniciarInventario','$patrimonioAchado','$patrimonioPerdido','$patrimonioIdentificar','$cadastrarResponsavel',
                '$visualizarResponsavel','$editarResponsavel','$cadastrarResponsavel')");

    if ($setNivelAcessoquery === true) {

        $id['idEntidade'] = $_POST['idEntidade'];

        foreach ($id['idEntidade'] as $idEntidade) {
            $con->query("INSERT INTO entidade_usuario (idUsuario, idEntidade) VALUES ('$idUsuario', '$idEntidade')");
        }


        echo "<script>alert('Usuário cadastrada com sucesso!');window.location='../view/cadastrar_usuario.php'</script>";
        exit();
    } else {
        echo "Erro para inserir: " . $con->error;
        /*echo "<script>alert('erro!');window.location='../view/cadastrar_usuario.php'</script>";
    exit();*/
    }
}
