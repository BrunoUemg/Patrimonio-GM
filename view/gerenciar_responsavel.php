<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarResponsavel'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarResponsavel'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_responsavel.php'">Cadastrar responsável</button>
            <?php }
            if ($linha_usu['visualizarResponsavel'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_responsavel.php'">Visualizar responsável</button>
            <?php } ?>
        </div>
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar responsável
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
