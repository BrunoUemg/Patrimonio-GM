<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarTipoSubTipo'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarTipoSubTipo'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_tipo_sub.php'">Cadastrar Tipo e subtipo</button>
            <?php }
            if ($linha_usu['visualizarTipoSubTipo'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_tipo_sub.php'">Visualizar Tipo e subtipo</button>
            <?php } ?>
        </div>
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar Tipo e subtipo
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
