<?php

include_once "sidebar.php";

include_once "../dao/conexao.php";

$idUsuario = $_GET['idUsuario'];

$select_usuario = mysqli_query($con, "SELECT * FROM usuario U INNER JOIN nivel_acesso N ON N.idUsuario = U.idUsuario where N.idUsuario = '$idUsuario'");
$linha_usuario = mysqli_fetch_array($select_usuario);

?>
<!-- CSS Files -->
<link rel="stylesheet" href="../css/stepCadastros.css">
<script src="../jquery/jquery.min.js"></script>
<?php if ($linha_usu['cadastrarUsuario'] == 1 || $linha_usu['master'] == 1) { ?>
  <div class="main-content">

    <?php if ($linha_usu['cadastrarUsuario'] == 1 || $linha_usu['master'] == 1) { ?>
      <div class="panel-row">
        <button class="btn-panel" type="button" onclick="window.location.href= 'cadastrar_usuario.php'">Cadastrar Usuário</button>
      </div>
    <?php } ?>

    <?php if ($linha_usu['cadastrarUsuario'] == 1 || $linha_usu['master'] == 1) { ?>
      <div class="panel">
        <div class="panel-body wizard-content">
          <form class="tab-wizard wizard-circle wizard clearfix" id="example-form" action="../dao/envio_alterar_usuario.php" enctype="multipart/form-data" method="POST">

            <h6>Informações Pessoais</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>INFORMAÇÕES PESSOAIS</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="">Nome do usuário</label>
                      <input type="text" required="required" class="form-control" value="<?php echo $linha_usuario['nomeUsuario'] ?>" name="nomeUsuario" id="">
                      <input type="text" required="required" hidden class="form-control" value="<?php echo $linha_usuario['idUsuario'] ?>" name="idUsuario" id="">
                    </div>
                    <div class="col form-group">
                      <label for="">Usuário de acesso</label>
                      <input type="text" required="required" class="form-control" value="<?php echo $linha_usuario['userAcesso'] ?>" name="userAcesso" id="">
                      <ul>
                        <li>
                          <p>A senha é o nome do usuário de acesso</p>
                        </li>
                      </ul>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Desejo atribuir todas permissões para o usuário</label>
                      <input type="checkbox" id="btnAllPermission" value="1" id="exampleCheck1">
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                      <thead>
                        <th>
                          Entidade
                        </th>
                        <th>
                          Atribuir
                        </th>
                      </thead>
                      <tbody>
                        <?php $result_entidade = "SELECT * FROM entidade ORDER BY nomeFantasia";
                        $resultado_entidade = mysqli_query($con, $result_entidade);

                        while ($row_entidade = mysqli_fetch_assoc($resultado_entidade)) {
                          $select_entidade_usu = mysqli_query($con, "SELECT * FROM entidade_usuario where idUsuario = $idUsuario and $row_entidade[idEntidade]");
                        ?>

                          <tr>
                            <td><?php echo $row_entidade['nomeFantasia'] ?></td>
                            <td><input type="checkbox" name="idEntidade[]" <?php if (mysqli_num_rows($select_entidade_usu) > 0) echo 'checked' ?> value="<?php echo $row_entidade['idEntidade'] ?>" id=""></td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </section>

            <h6>Entidade</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>ENTIDADE</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastrar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarEntidade'] == 1) echo 'checked' ?> name="cadastrarEntidade" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Visualizar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarEntidade'] == 1) echo 'checked' ?> name="visualizarEntidade" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Editar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarEntidade'] == 1) echo 'checked' ?> name="editarEntidade" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Unidade</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>UNIDADE</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastrar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarUnidade'] == 1) echo 'checked' ?> name="cadastrarUnidade" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Visualizar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarUnidade'] == 1) echo 'checked' ?> name="visualizarUnidade" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Editar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarUnidade'] == 1) echo 'checked' ?> name="editarUnidade" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Tipo e SubTipo</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>TIPO E SUBTIPO</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastrar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarTipoSubTipo'] == 1) echo 'checked' ?> name="cadastrarTipoSubTipo" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Visualizar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarTipoSubTipo'] == 1) echo 'checked' ?> name="visualizarTipoSubTipo" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Editar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarTipoSubTipo'] == 1) echo 'checked' ?> name="editarTipoSubTipo" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Patrimonio</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Cadastrar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Patrimonio</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarPatrimonio'] == 1) echo 'checked' ?> name="cadastrarPatrimonio" value="1" id="exampleCheck1">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Visualizar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Patrimonio</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarPatrimonio'] == 1) echo 'checked' ?> name="visualizarPatrimonio" value="1" id="exampleCheck1">
                    </div>
                    <div class="col form-group">
                      <label>Foto</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarFotoPatrimonio'] == 1) echo 'checked' ?> name="visualizarFotoPatrimonio" value="1" id="exampleCheck2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Nota Fiscal</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarNotaFiscal'] == 1) echo 'checked' ?> name="visualizarNotaFiscal" value="1" id="exampleCheck2">
                    </div>
                    <div class="col form-group">
                      <label>Historico</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarHistoricoPatrimonio'] == 1) echo 'checked' ?> name="visualizarHistoricoPatrimonio" value="1" id="exampleCheck2">
                    </div>
                    <div class="col form-group">
                      <label>Baixados</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarBaixadosPatrimonio'] == 1) echo 'checked' ?> name="visualizarBaixadosPatrimonio" value="1" id="exampleCheck2">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Alterar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Patrimonio</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarPatrimonio'] == 1) echo 'checked' ?> name="editarPatrimonio" value="1" id="exampleCheck2">
                    </div>
                    <div class="col form-group">
                      <label>Foto</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['alterarFotoPatrimonio'] == 1) echo 'checked' ?> name="alterarFotoPatrimonio" value="1" id="exampleCheck2">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Baixas</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Baixas Patrimonio</label>
                      <input class="check" type="checkbox" name="baixaPatrimonio" <?php if ($linha_usuario['baixaPatrimonio'] == 1) echo 'checked' ?> value="1" id="exampleCheck2">
                    </div>
                    <div class="col form-group">
                      <label>Baixado Patrimonio</label>
                      <input class="check" type="checkbox" name="baixadosPatrimonio" <?php if ($linha_usuario['baixadosPatrimonio'] == 1) echo 'checked' ?> value="1" id="exampleCheck2">
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <h6>Sala</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Cadastrar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Sala</label>
                      <input class="check" type="checkbox" name="cadastrarSala" <?php if ($linha_usuario['cadastrarSala'] == 1) echo 'checked' ?> value="1" id="exampleCheck1">
                    </div>
                    <div class="col form-group">
                      <label>Termo de Sala</label>
                      <input class="check" type="checkbox" name="inserirTermoSala" <?php if ($linha_usuario['inserirTermoSala'] == 1) echo 'checked' ?> value="1" id="exampleCheck1">
                    </div>
                    <div class="col form-group">
                      <label>Gerar PDF Responsável</label>
                      <input class="check" type="checkbox" name="gerarPDF_ResponsavelSala" <?php if ($linha_usuario['gerarPDF_ResponsavelSala'] == 1) echo 'checked' ?> value="1" id="exampleCheck1">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Visualizar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Sala</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarSala'] == 1) echo 'checked' ?> name="visualizarSala" value="1" id="exampleCheck1">
                    </div>
                    <div class="col form-group">
                      <label>Relatório Termo Sala</label>
                      <input class="check" type="checkbox" name="visualizarRelatorioTermoSala" <?php if ($linha_usuario['visualizarRelatorioTermoSala'] == 1) echo 'checked' ?> value="1" id="exampleCheck2">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>Alterar</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Sala</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarSala'] == 1) echo 'checked' ?> name="editarSala" value="1" id="exampleCheck2">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Movimentações</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>MOVIMENTAÇÕES</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Unica</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['movimentacaoUnica'] == 1) echo 'checked' ?> name="movimentacaoUnica" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Geral</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['movimentacaoGeral'] == 1) echo 'checked' ?> name="movimentacaoGeral" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Relatório</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>RELATÓRIO</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Patrimonio Sala</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['relatorioPatrimonioSala'] == 1) echo 'checked' ?> name="relatorioPatrimonioSala" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Movimentação</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['relatorioMovimentacao'] == 1) echo 'checked' ?> name="relatorioMovimentacao" value="1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastro</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['relatorioCadastro'] == 1) echo 'checked' ?> name="relatorioCadastro" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Baixas</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['relatorioBaixas'] == 1) echo 'checked' ?> name="relatorioBaixas" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Inventário</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>INVENTÁRIO</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Iniciar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['iniciarInventario'] == 1) echo 'checked' ?> name="iniciarInventario" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Achado</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['patrimonioAchado'] == 1) echo 'checked' ?> name="patrimonioAchado" value="1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Perdido</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['patrimonioPerdido'] == 1) echo 'checked' ?> name="patrimonioPerdido" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Identificar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['patrimonioIdentificar'] == 1) echo 'checked' ?> name="patrimonioIdentificar" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Responsável</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>RESPONSÁVEL</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastrar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarResponsavel'] == 1) echo 'checked' ?> name="cadastrarResponsavel" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Alterar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['editarResponsavel'] == 1) echo 'checked' ?> name="editarResponsavel" value="1">
                    </div>
                    <div class="col form-group">
                      <label>Visualizar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['visualizarResponsavel'] == 1) echo 'checked' ?> name="visualizarResponsavel" value="1">
                    </div>
                  </div>
                </div>
            </section>

            <h6>Usuário</h6>
            <section class="my-2">
              <div class="row w-100">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <H3>USUÁRIO</H3>
                    </center>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label>Cadastrar</label>
                      <input class="check" type="checkbox" <?php if ($linha_usuario['cadastrarUsuario'] == 1) echo 'checked' ?> name="cadastrarUsuario" value="1">
                    </div>
                  </div>
                </div>
            </section>

          </form>
        </div>
      </div>
    <?php } ?>

  </div>
  </div>
  </main>
  </div>

  <script src="../js/mascaras.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/jquery.steps.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/states.js"></script>

  <script>
    var form = $("#example-form");



    form.steps({
      headerTag: "h6",
      bodyTag: "section",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      transitionEffect: "slideLeft",

      onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
      },
      onFinished: function(event, currentIndex) {
        form.submit();
      }

    });
    form.validate({
      errorPlacement: function errorPlacement(error, element) {
        element.before(error);
      },
      rules: {
        confirm: {
          equalTo: "#password"
        }
      }
    });
  </script>

  <script>
    let checkbox = document.querySelectorAll('.check');
    let todasPermissao = document.querySelector('#btnAllPermission');
    btnAllPermission.addEventListener('click', () => {
      if (todasPermissao.checked == true) {
        for (let atual of checkbox) {
          atual.checked = true;
        }
      } else {
        for (let atual of checkbox) {
          atual.checked = false;
        }
      }
    })
  </script>

<?php } else { ?>
  <script>
    window.location = "../index.php";
  </script>
<?php }
