<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarSala'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarSala'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_sala.php'">Cadastrar Sala</button>
            <?php }
            if ($linha_usu['visualizarSala'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_sala.php'">Visualizar Sala</button>
            <?php } ?>
        </div>
        <div class="panel-row">
            <?php if ($linha_usu['inserirTermoSala'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_termo.php'">Inserir Termo</button>
            <?php }
            if ($linha_usu['visualizarRelatorioTermoSala'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'relatorio_termos.php'">Relátorio de termos</button>
            <?php } ?>
        </div>

        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar Sala
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
