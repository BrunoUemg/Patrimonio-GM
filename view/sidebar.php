<?php

include_once "../dao/conexao.php";
session_start();
if (isset($_SESSION['patrimonio'])) {
  //login ok!
} else {
  header('location: ../login_gm.php');
}


$select_nivel = mysqli_query($con, "SELECT * FROM usuario U INNER JOIN nivel_acesso N ON N.idUsuario = U.idUsuario where N.idUsuario = '$_SESSION[idUsuario]'");
$linha_usu = mysqli_fetch_array($select_nivel);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.png" type="image/x-icon" />
  <title>Patrimônio</title>
  <link rel="stylesheet" href="../assets/all.css">
  <!-- css boostrap -->
  <link href="../assets/bootstrap.min.css" rel="stylesheet">
  <!--<link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap4.min.css"> outro layout para o datatables-->
</head>

<body>
  <div class="flex-dashboard">
    <!--Barra lateral-->
    <sidebar id="sideBar">
      <div class="sidebar-title" onclick="window.location.href = '../index.php'">
        <img src="../img/logo.png" alt="">
        <h2>Patrimônio</h2>
      </div>
      <!--Menu da barra lateral-->

      
        <div class="menu">
          <ul>
            <?php if (
              $linha_usu['cadastrarPatrimonio'] == 1 || $linha_usu['visualizarPatrimonio'] == 1 ||
              $linha_usu['alterarFotoPatrimonio'] == 1 || $linha_usu['visualizarFotoPatrimonio'] == 1 ||
              $linha_usu['visualizarNotaFiscal'] == 1 ||  $linha_usu['baixaPatrimonio'] == 1 ||
              $linha_usu['visualizarHistoricoPatrimonio'] == 1 ||  $linha_usu['baixadosPatrimonio'] == 1 ||
              $linha_usu['visualizarBaixadosPatrimonio'] == 1 || $linha_usu['master'] == 1
            ) { ?>
              <li onclick="window.location.href = 'gerenciar_patrimonio.php'">
                <i class="fas fa-chair"></i>
                <a href="gerenciar_patrimonio.php"></i>Patrimônio</a>
              </li>
            <?php } ?>


            <?php if (
              $linha_usu['cadastrarSala'] == 1 || $linha_usu['visualizarSala'] == 1 ||
              $linha_usu['editarSala'] == 1 || $linha_usu['gerarPDF_ResponsavelSala'] == 1 ||
              $linha_usu['inserirTermoSala'] == 1 || $linha_usu['visualizarRelatorioTermoSala'] == 1 ||
              $linha_usu['master'] == 1
            ) { ?>
              <li onclick="window.location.href = 'gerenciar_sala.php'">
                <i class="fas fa-house-user"></i>
                <a href="gerenciar_sala.php">Sala</a>
              </li>
            <?php } ?>

            <?php if ($linha_usu['movimentacaoUnica'] == 1 || $linha_usu['movimentacaoGeral'] == 1 || $linha_usu['master'] == 1) { ?>
              <li onclick="window.location.href = 'movimentacao_patrimonio.php'">
                <i class="fas fa-exchange-alt"></i>
                <a href="movimentacao_patrimonio.php">Movimentar patrimônio</a>
              </li>
            <?php } ?>

            <?php if (
              $linha_usu['relatorioPatrimonioSala'] == 1 || $linha_usu['relatorioMovimentacao'] == 1 ||
              $linha_usu['relatorioCadastro'] == 1 || $linha_usu['relatorioBaixas'] == 1 || $linha_usu['master'] == 1
            ) { ?>
              <li onclick="window.location.href = 'gerenciar_relatorios.php'">
                <i class="fas fa-file-pdf"></i>
                <a href="gerenciar_relatorios.php">Relatórios</a>
              </li>
            <?php } ?>

            <?php if (
              $linha_usu['iniciarInventario'] == 1 || $linha_usu['patrimonioAchado'] == 1 ||
              $linha_usu['patrimonioPerdido'] == 1 || $linha_usu['patrimonioIdentificar'] == 1 ||
              $linha_usu['master'] == 1
            ) { ?>
              <li onclick="window.location.href = 'gerenciar_inventario.php'">
                <i class="fas fa-map-marked-alt"></i>
                <a href="gerenciar_inventario.php">Iventários</a>
              </li>
            <?php } ?>

            <?php if (
              $linha_usu['cadastrarResponsavel'] == 1 || $linha_usu['visualizarResponsavel'] == 1 ||
              $linha_usu['editarResponsavel'] == 1 || $linha_usu['master'] == 1
            ) { ?>
              <li onclick="window.location.href = 'gerenciar_responsavel.php'">
                <i class="fas fa-user-tag"></i>
                <a href="gerenciar_responsavel.php">Responsável</a>
              </li>
            <?php } ?>

            <?php if ($linha_usu['cadastrarUsuario'] == 1 || $linha_usu['master'] == 1) { ?>
              <li onclick="window.location.href = 'consultar_usuario.php'">
                <i class="fas fa-user"></i>
                <a href="consultar_usuario.php">Usuário</a>
              </li>
            <?php } ?>

          </ul>
        </div>
     

    </sidebar>
    <!--Todo conteudo da pagina-->
    <main id="mainContent">
      <!--Topo da pagina-->
      <header>
        <i id="iconMenu" onclick="responsiveSideBar()" class="fas fa-bars"></i>

        <p>Olá, <?php echo $_SESSION['nomeUsuario']; ?> <a data-bs-toggle="modal" data-bs-target="#alterar" title="Alterar senha"><i class="fa-solid fa-gear"></i></a> </p>

        <a data-bs-toggle="modal" data-bs-target="#saida"><i class="fas fa-sign-out-alt"></i>Sair</a>

      </header>
      <!--Conteudo central da pagina-->


      <!--Modal de saida-->

      <div class="modal" tabindex="-1" id="saida">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Logout</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Deseja sair do sistema ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="location.href='../logout.php'" class="btn btn-danger">Sair</button>
            </div>
          </div>
        </div>
      </div>

      <!--Modal senha -->

      <div class="modal fade" id="alterar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Alterar Senha</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../dao/alterar_senha.php" method="POST">


                <p>Digite sua senha atual</p>
                <input type="password" name="senha_atual" autocomplete="off" class="form-control placeholder-no-fix" required>
            </div>

            <div class="modal-body">
              <p>Digite sua nova senha</p>
              <input type="password" name="nova_senha" id="nova_senha" autocomplete="off" class="form-control placeholder-no-fix" required>
            </div>

            <div class="modal-body">
              <p>Confirme sua nova senha</p>
              <input type="password" name="confirma_senha" id="confirma_senha" autocomplete="off" class="form-control placeholder-no-fix" required>



            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" value="Salvar">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Fechar</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <style type="text/css">
        .carregando {

          display: none;
        }

        .carregando2 {

          display: none;
        }

        .carregando3 {

          display: none;
        }
      </style>

      <script type="text/javascript" src="../js/loader.js"></script>
      <script src="../js/jquery.min.js"></script>
      <!-- onde faz o reload dos selects -->
      <script type="text/javascript" src="../js/reload_jquery.js">

      </script>

      <!--Mascara-->
      <script src="../js/mascaras.js"></script>

      <!--Jquery datatables-->
      <script src="../js/jquery-3.4.1.min.js"></script>

      <!-- script boostrap 5.0.1 -->
      <script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
      <!-- Fontawesome -->
      <script src="https://kit.fontawesome.com/2477a48321.js" crossorigin="anonymous"></script>

      <!--Script datatables-->
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
      <script src="../js/datatables.min.js"></script>
      <!--Menu bars-->
      <script src="../js/menu.js"></script>
</body>

</html>