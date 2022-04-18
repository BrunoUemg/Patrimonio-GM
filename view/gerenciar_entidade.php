<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarEntidade'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarEntidade'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_entidade.php'">Cadastrar Entidade</button>
            <?php }
            if ($linha_usu['visualizarEntidade'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_entidade.php'">Visualizar Entidade</button>
            <?php } ?>
        </div>
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar Entidade
            </div>
            <p>Entidades são os cadastros de todas as empresas ou instituições que foram comprados ou doados os patrimônios.</p>
        </div>
    </div>
    </main>
    </div>
<?php } else { ?>
    <script>
        window.location = "../index.php";
    </script>
<?php }
