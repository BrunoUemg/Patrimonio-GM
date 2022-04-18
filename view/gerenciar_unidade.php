<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_unidade.php'">Cadastrar Unidade</button>
            <?php }
            if ($linha_usu['visualizarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_unidade.php'">Visualizar Unidade</button>
            <?php } ?>
        </div>
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar Unidade
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
