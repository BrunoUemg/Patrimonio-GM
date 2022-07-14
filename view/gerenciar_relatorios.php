<?php

include_once "sidebar.php";

?>

<?php if ($linha_usu['relatorioPatrimonioSala'] == 1 || $linha_usu['relatorioMovimentacao'] == 1 || $linha_usu['relatorioCadastro'] == 1 || $linha_usu['relatorioBaixas'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['relatorioPatrimonioSala'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'relatorio_patrimonio_sala.php'">Patrimônio em sala</button>
            <?php } ?>
            <?php if ($linha_usu['relatorioMovimentacao'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'movimentacao_patrimonio.php'">Movimentações</button>
            <?php } ?>
        </div>
        <div class="panel-row">
            <?php if ($linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'relatorio_geral_patrimonio.php'">Patrimônio geral</button>
            <?php } ?>
            <button class="btn-panel" type="button" onclick="window.location.href = 'identificar_nf.php'">Identificar NF</button>
        </div>
       
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar Relatórios
            </div>

        </div>
    </div>
    </main>
    </div>

<?php } else { ?>
    <script>
        window.location = "../index.php";
    </script>
<?php }
