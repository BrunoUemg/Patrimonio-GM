<?php

include_once "sidebar.php";

$resultado_entidade = "SELECT * FROM entidade";
$resultada_final_entidade = mysqli_query($con, $resultado_entidade);

?>
<?php if ($linha_usu['cadastrarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
  <div class="main-content">
    <div class="panel-row">
      <?php if ($linha_usu['editarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_unidade.php'">Voltar ao gerenciamento</button>
      <?php }
      if ($linha_usu['visualizarUnidade'] == 1 || $linha_usu['master'] == 1) { ?>
        <button class="btn-panel" type="button" onclick="window.location.href= 'consultar_unidade.php'">Visualizar Unidade</button>
      <?php } ?>
    </div>
    <div class="painel-acoes">
      <form action="../dao/envio_cadastro_unidade.php" method="POST">
        <div class="row">
          <div class="col">
            <label for="">Nome da unidade</label>

            <input type="text" required="required" class="form-control" name="nomeUnidade" id="">


          </div>
          <div class="col">
            <label for="">Entidade dessa unidade</label>

            <select name="idEntidade" class="form-control" id="">
              <option value="">Selecione</option>
              <?php while ($rows_entidade = mysqli_fetch_assoc($resultada_final_entidade)) { 
                 $select_entidade_usu = mysqli_query($con, "SELECT * FROM entidade_usuario where idUsuario = $_SESSION[idUsuario] and $rows_entidade[idEntidade]");
                 if (mysqli_num_rows($select_entidade_usu) > 0 || $linha_usu['master'] == 1) {
                ?>
                <option value="<?php echo $rows_entidade['idEntidade'] ?>"><?php echo $rows_entidade['nomeFantasia']; ?></option>
              <?php } } ?>
            </select>


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
