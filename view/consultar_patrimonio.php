<?php

include_once "sidebar.php";


$result_patrimonio = "SELECT * FROM patrimonio P INNER JOIN sala S ON S.idSala = P.idSala 
INNER JOIN entidade E ON E.idEntidade = P.idEntidade INNER JOIN status T ON T.id = P.idStatus
INNER JOIN subtipo U ON U.idSubtipo = P.idSubtipo INNER JOIN unidade I ON I.idUnidade = S.idUnidade where T.nome != 'Desuso'";
$resultado_patrimonio = mysqli_query($con, $result_patrimonio);
?>
<style type="text/css">
  .carregando {

    display: none;
  }

  .carregando2 {

    display: none;
  }
</style>

<?php if ($linha_usu['visualizarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>

  <div class="main-content">
    <div class="panel-row">
      <?php if ($linha_usu['cadastrarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_patrimonio.php'">Cadastrar Patrimônio</button>
      <?php }
      if ($linha_usu['editarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_patrimonio.php'">Voltar ao gerenciamento</button>
      <?php } ?>

    </div>
    <div class="painel-acoes">
      <?php include_once("../dao/conexao.php");
      if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <!--ambiente onde fica as tabelas e formularios-->
      <div class="table-responsive">
        <table id="basic-datatables" class="table table-bordered">
          <thead>
            <tr>
              <th>Descrição</th>
              <th>Código Patrimonio</th>
              <th>Entidade</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($rows_patrimonio = mysqli_fetch_assoc($resultado_patrimonio)) {

              $select_entidade_usu = mysqli_query($con, "SELECT * FROM entidade_usuario where idUsuario = $_SESSION[idUsuario] and $rows_patrimonio[idEntidade]");
              if (mysqli_num_rows($select_entidade_usu) > 0 || $linha_usu['master'] == 1) {
            ?>
                <tr>
                  <td><?php echo $rows_patrimonio['descricaoPatrimonio']; ?></td>
                  <td><?php echo $rows_patrimonio['codigoPatrimonio']; ?></td>
                  <td><?php echo $rows_patrimonio['nomeFantasia']; ?></td>

                  <td>
                    <?php if ($_SESSION['acesso'] == 1) { ?>
                      <?php if ($linha_usu['editarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#alterar<?php echo $rows_patrimonio['idPatrimonio']; ?>" role="button"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php }
                    if ($linha_usu['alterarFotoPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                      <a class="btn btn-primary" data-bs-toggle="modal" href="#foto<?php echo $rows_patrimonio['idPatrimonio']; ?>" role="button">Alterar foto</a><?php  ?>
                    <?php }
                    if ($linha_usu['visualizarFotoPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                      <a class="btn btn-primary" data-bs-toggle="modal" target="_blank" href="<?php echo '../foto_patrimonio/' . $rows_patrimonio['fotoPatrimonio']; ?>" role="button">Foto</a>
                    <?php }
                    if ($linha_usu['visualizarNotaFiscal'] == 1 || $linha_usu['master'] == 1) { ?>
                      <a class="btn btn-primary" data-bs-toggle="modal" target="_blank" href="<?php echo '../nota_fiscal/' . $rows_patrimonio['comprovanteFiscal']; ?>" role="button">Nota fiscal</a>
                    <?php } ?>
                    <?php if ($linha_usu['baixaPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                      <a class="btn btn-primary" data-bs-toggle="modal" href="#baixa<?php echo $rows_patrimonio['idPatrimonio']; ?>" role="button"><i class="fa fa-arrow-down"></i></a> <?php } ?>

                    <?php if ($linha_usu['master'] == 1) {
                      echo "<a  class='btn btn-danger' title='Excluir' href='../funcoes/imprimir_historico_movimentacoes.php?idPatrimonio=" . $rows_patrimonio['idPatrimonio'] . "'>" ?> Histórico<?php echo "</a>";
                                                                                                                                                                                                } ?>
                      <?php if ($linha_usu['master'] == 1) { ?>
                        <a class="btn btn-primary" data-bs-toggle="modal" title="Editar NF" href="#alterarNF<?php echo $rows_patrimonio['idPatrimonio']; ?>" role="button"><i class="fa fa-edit"></i>NF</a><?php } ?>



                      <div class="modal fade" id="alterarNF<?php echo $rows_patrimonio['idPatrimonio']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalToggleLabel">Alterar NF</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../dao/envio_alterar_nf.php" enctype="multipart/form-data" method="POST">

                                <input type="text" hidden name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                                <label for="">Alterar</label>
                                <input type="file" class="form-control" required="required" name="arquivoNF" id="">


                            </div>
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-success" value="Salvar">
                              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="baixa<?php echo $rows_patrimonio['idPatrimonio']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalToggleLabel">Dar baixa</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../dao/envio_baixa_patrimonio.php" enctype="multipart/form-data" method="POST">

                                <input type="text" hidden name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                                <div class="alert alert-warning" role="alert">Deseja dar baixa <?php echo $rows_patrimonio['descricaoPatrimonio'] ?>?</div>
                                <label for="">Foto do patrimônio</label>
                                <input type="file" accept="image/*" name="fotoPatrimonio" class="form-control" required id="">

                            </div>
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-success" value="Salvar">
                              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="alterar<?php echo $rows_patrimonio['idPatrimonio']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalToggleLabel">Alterar Patrimônio</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../dao/envio_alterar_patrimonio.php" method="POST">

                                <center>
                                  <h4>Alterar dados do patrimônio</h4>
                                </center>
                                <?php
                                $select_sala = "SELECT * FROM sala S INNER JOIN unidade U ON U.idUnidade = S.idUnidade where idSala = '$rows_patrimonio[idSala]'";
                                $res = $con->query($select_sala);
                                $linha_sala = $res->fetch_assoc();

                                ?>


                                <div class="row">
                                  <div class="col">
                                    <input type="text" hidden readOnly name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                                    <label for="">Descrição</label>
                                    <input type="text" class="form-control" required="required" name="descricaoPatrimonio" value="<?php echo $rows_patrimonio['descricaoPatrimonio'] ?>" id="">
                                  </div>

                                  <div class="col">
                                    <label for="">Código do patrimonio</label>
                                    <input type="text" class="form-control" required="required" name="codigoPatrimonio" value="<?php echo $rows_patrimonio['codigoPatrimonio'] ?>" id="">
                                  </div>

                                  <div class="col">
                                    <label for="">Status</label>
                                    <select name="idStatus" class="form-control" id="">
                                      <?php
                                      $result_status = "SELECT * FROM status";
                                      $resultado_status = mysqli_query($con, $result_status);
                                      while ($rows_status = mysqli_fetch_assoc($resultado_status)) {     ?>

                                        <option value="<?php echo $rows_status['id']; ?>" <?php if ($rows_status['id'] == $rows_patrimonio['id']) echo 'selected' ?>><?php echo $rows_status['nome']; ?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>


                                </div>
                                <div class="row">


                                  <div class="col">
                                    <label for="">Subtipo</label>
                                    <select name="idSubtipo" class="form-control" id="">
                                      <?php
                                      $result_subtipo = "SELECT * FROM subtipo";
                                      $resultado_subtipo = mysqli_query($con, $result_subtipo);
                                      while ($rows_subtipo = mysqli_fetch_assoc($resultado_subtipo)) {     ?>

                                        <option value="<?php echo $rows_subtipo['idSubtipo']; ?>" <?php if ($rows_subtipo['idSubtipo'] == $rows_patrimonio['idSubtipo']) echo 'selected' ?>><?php echo $rows_subtipo['descricaoSubtipo']; ?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="col">
                                    <label for="">Nota fiscal</label>
                                    <input type="text" class="form-control" required="required" name="notaFiscal" value="<?php echo $rows_patrimonio['notaFiscal'] ?>" id="">
                                  </div>
                                  <div class="col">
                                    <label for="">Conservação</label>
                                    <select name="conservacao" required="required" class="form-control" id="">
                                      <option value="">Selecione</option>
                                      <option value="Bom" <?php if ($rows_patrimonio['conservacao'] == 'Bom') echo 'selected'; ?>>Bom</option>
                                      <option value="Regular" <?php if ($rows_patrimonio['conservacao'] == 'Regular') echo 'selected'; ?>>Regular</option>
                                      <option value="Ruim" <?php if ($rows_patrimonio['conservacao'] == 'Ruim') echo 'selected'; ?>>Ruim</option>
                                      <option value="Sucata" <?php if ($rows_patrimonio['conservacao'] == 'Sucata') echo 'selected'; ?>>Sucata</option>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-success" value="Alterar">
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
      </div>
      <div class="modal fade" id="foto<?php echo $rows_patrimonio['idPatrimonio']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Inserir foto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../dao/envio_foto_patrimonio.php" enctype="multipart/form-data" method="POST">
                <input type="text" hidden name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                <label for="">Inserir</label>
                <input type="file" class="form-control" name="fotoPatrimonio" id="">
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" value="Salvar">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Fechar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </tr>
  <?php }
            } ?>
  </tbody>
  </table>
    </div>
  </div>
  </div>
  </main>
  </div>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <!--   Core JS Files   -->
  <script src="js/core/jquery.3.2.1.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap.min.js"></script>
  <!-- jQuery UI -->
  <script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="jquery/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="jquery/jquery.ui.touch-punch.min.js"></script>
  <script src="js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="jquery/jquery.dcjqaccordion.2.7.js"></script>
  <script src="jquery/jquery.scrollTo.min.js"></script>
  <script src="jquery/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jQuery Scrollbar -->
  <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Datatables -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'pdf', {
            extend: 'print',
            text: 'Imprimir',
            key: {
              key: 'p',
              altkey: true
            }


          },

          'excel'

        ],
        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
    });
  </script>

<?php } else { ?>
  <script>
    window.location = "../index.php";
  </script>
<?php }
