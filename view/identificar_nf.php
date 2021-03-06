<?php

include_once "sidebar.php";

include_once "../dao/conexao.php";

if (isset($_POST['nf'])) {
    $nf = $_POST['nf'];
    $result_patrimonio = "SELECT * FROM patrimonio P INNER JOIN sala S ON S.idSala = P.idSala 
INNER JOIN entidade E ON E.idEntidade = P.idEntidade where notaFiscal = '$nf' and P.idStatus != 2";
    $resultado_patrimonio = mysqli_query($con, $result_patrimonio);
}
?>

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
<?php if ($linha_usu['relatorioPatrimonioSala'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_relatorios.php'">Voltar ao gerenciamento</button>
        </div>
        <div class="painel-acoes">
            <form action="" method="POST">
                <h3>Identificar n° da Nota Fiscal</h3>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Digite o n° da NF</label>
                        <input type="text" class="form-control" requried name="nf" id="">
                    
                    </div>

              
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Gerar</button>
            </form>
        </div>
        <?php if (isset($_POST['nf'])) { ?>
            <div class="painel-acoes">
                <!--ambiente onde fica as tabelas e formularios-->
                <div class="table-responsive">
                    <table id="basic-datatables" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome da Sala</th>
                                <th>Entidade</th>
                                <th>Patrimônio</th>
                                <th>NF</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows_patrimonio = mysqli_fetch_assoc($resultado_patrimonio)) {
                                $select_entidade_usu = mysqli_query($con, "SELECT * FROM entidade_usuario where idUsuario = $_SESSION[idUsuario] and idEntidade = $rows_patrimonio[idEntidade]");
                                if (mysqli_num_rows($select_entidade_usu) > 0 || $linha_usu['master'] == 1) {
                            ?>
                                    <tr>
                                        <td><?php echo $rows_patrimonio['codigoPatrimonio']; ?></td>
                                        <td><?php echo $rows_patrimonio['nomeSala']; ?></td>
                                        <td><?php echo $rows_patrimonio['nomeFantasia']; ?></td>
                                        <td><?php echo $rows_patrimonio['descricaoPatrimonio']; ?></td>
                                        <td><?php echo $rows_patrimonio['notaFiscal']; ?></td>

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

<?php } ?>



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
