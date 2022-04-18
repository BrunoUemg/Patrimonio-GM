<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['iniciarInventario'] == 1 || $linha_usu['master'] == 1) { ?>
    <div class="main-content">
        <div class="panel-row">
            <?php if ($linha_usu['iniciarInventario'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'iniciar_inventario_patrimonio.php'">Iniciar inventário</button>
            <?php }
            if ($linha_usu['patrimonioAchado'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'patrimonio_achado.php'">Patrimônio achado</button>
            <?php } ?>


        </div>

        <div class="panel-row">
            <?php if ($linha_usu['patrimonioPerdido'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'consultar_patrimonio_perdido.php'">Patrimônios perdidos</button>
            <?php } ?>
            <?php if ($linha_usu['patrimonioIdentificar'] == 1 || $linha_usu['master'] == 1) { ?>
                <button class="btn-panel" type="button" onclick="window.location.href = 'identificar_patrimonio.php'">Identificar patrimonio </button>
            <?php } ?>
        </div>

        <div class="painel-acoes">
            <div class="alert alert-success" role="alert">
                Gerenciar inventários
            </div>
            <ul>
                <li>
                    Inventário é localizar os patrimônios fisicamente e dar baixa no sistema, para saber se estão na respectiva sala.
                </li>
                <li>
                    Fazer pelo menos a cada 3 meses.
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
