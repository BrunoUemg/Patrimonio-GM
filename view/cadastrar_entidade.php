<?php

include_once "sidebar.php";

?>
<?php if ($linha_usu['cadastrarEntidade'] == 1  || $linha_usu['master'] == 1) { ?>
  <div class="main-content">
    <div class="panel-row">
      <?php if ($linha_usu['editarEntidade'] == 1  || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_entidade.php'">Voltar ao gerenciamento</button>
      <?php }
      if ($linha_usu['visualizarEntidade'] == 1  || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href= 'consultar_entidade.php'">Visualizar Entidade</button>
      <?php } ?>
    </div>
    <div class="painel-acoes">
      <form action="../dao/envio_cadastro_entidade.php" method="POST">
        <div class="row">
          <div class="col">
            <label for="">Razão Social</label>
            <input type="text" name="razaoSocial" class="form-control" id="">

            </select>
          </div>
          <div class="col">
            <label for="">Nome fantasia/Nome</label>
            <input type="text" class="form-control" name="nomeFantasia" required="required" placeholder="Nome Fantasia">
          </div>

        </div>
        <div class="row">
          <div class="col">
            <label for="">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" onkeyup="mascara('##.###.###/####-##',this,event,true)">
          </div>
          <div class="col ">
            <label for="">Contato</label>
            <input type="text" class="form-control" name="contato" required="required" onkeyup="mascara('(##) #####-####',this,event,true)" id="">
          </div>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </div>
  </div>
  </main>
  </div>
<?php } else { ?>
  <script>
    window.location = "../index.php";
  </script>
<?php }
