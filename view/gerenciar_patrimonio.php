<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['editarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['cadastrarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_patrimonio.php'">Cadastrar Patrimônio</button>
            <?php }
            if ($linha_usu['visualizarPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" onclick="window.location.href = 'consultar_patrimonio.php'">Visualizar Patrimonio</button>
            <?php } ?>
        </div>
        <div class="panel-row">
            <?php if ($linha_usu['visualizarBaixadosPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'patrimonio_baixado_pendente.php'">Baixados pendentes</button>
            <?php }
            if ($linha_usu['visualizarBaixadosPatrimonio'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'consultar_patrimonio_baixado.php'">Visualizar Patrimônio baixado</button>
            <?php } ?>
        </div>
        <div class="painel-acoes">
            <div class="alert alert-success" role="alert"></div>
                Gerenciar Patrimônio
            </div>
            <h4>Informações sobre o gerenciamento.</h4>
            <ul>
                <li>
                    <p>Patrimônio baixado são todos que estão em desuso.</p>
                </li>
            </ul>

        </div>
    </div>
    </main>
    </div>
<?php } else { ?>
    <script>
        window.location = "../index.php";
    </script>
<?php }
