<?php

include_once "sidebar.php";

include_once "../dao/conexao.php";

if (isset($_POST['codigoPatrimonio'])) {
    $codigoPatrimonio = $_POST['codigoPatrimonio'];

    $select_patrimonio = mysqli_query($con, "SELECT * FROM patrimonio P INNER JOIN sala S ON S.idSala = P.idSala
    INNER JOIN entidade E on E.idEntidade = P.idEntidade INNER JOIN unidade U ON U.idEntidade = E.idEntidade where P.codigoPatrimonio = '$codigoPatrimonio'");
    $resultPatrimonio = mysqli_fetch_array($select_patrimonio);
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
<?php if ($linha_usu['patrimonioIdentificar'] == 1 || $linha_usu['master'] == 1) { ?>

    <div class="main-content">
        <?php include_once("../dao/conexao.php");
        if (!empty($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div class="painel-acoes">
            <form action="" method="POST">
                <h3>Identificar Patrimônio</h3>

                <br>

                <br>

                <div class="row g-3">


                    <div class="col-md-3">
                        <label for="">Digite o código do patrimônio achado</label>
                        <input type="text" required value="<?php if (isset($codigoPatrimonio)) echo $codigoPatrimonio;
                                                            else ?>" name="codigoPatrimonio" class="form-control" id="">
                    </div>


                </div>
                <br>
                <?php if (isset($_POST['codigoPatrimonio'])) { ?>
                    <h3>Dados do patrimônio:</h3>
                    <hr>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="">Entidade</label>
                            <input type="text" name="entidade" readonly value="<?php echo $resultPatrimonio['nomeFantasia'] ?>" class="form-control" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="">Unidade</label>
                            <input type="text" name="unidade" readonly value="<?php echo $resultPatrimonio['nomeUnidade'] ?>" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="">Nome patrimonio</label>
                            <input type="text" name="desc" readonly value="<?php echo $resultPatrimonio['descricaoPatrimonio'] ?>" class="form-control" id="">
                        </div>
                        <div class="col-md-6">
                            <label for="">Sala</label>
                            <input type="text" name="sala" readonly value="<?php echo $resultPatrimonio['nomeSala'] ?>" class="form-control" id="">
                        </div>
                    </div>
                <?php } ?>
                <br>

                <br>
                <button type="submit" class="btn btn-primary">Identificar</button>
                <button type="button" onclick="location.href='identificar_patrimonio.php';" class="btn btn-danger">Cancelar</button>

            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#basic-datatables').DataTable({
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
