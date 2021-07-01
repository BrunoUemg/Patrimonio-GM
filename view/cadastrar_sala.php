<?php 


include_once "sidebar.php";
include_once "../dao/conexao.php";

$resultado_unidade = "SELECT * FROM unidade";
$resultada_final_unidade = mysqli_query($con, $resultado_unidade);

?>

<div class="main-content">
              <div class="panel-row">
                  <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_sala.php'">Voltar ao gerenciamento</button>
                  <button class="btn-panel" type="button" onclick="window.location.href= 'consultar_sala.php'" >Visualizar Sala</button>
              </div>
              <div class="painel-acoes" >
                <form action="../dao/envio_cadastro_sala.php" method="POST">
                    <div class="row">
                      <div class="col">
                          <label for="">Nome da Sala</label>
                      
                          <input type="text" required="required" class="form-control" name="nomeSala" id="">
                            
                        
                      </div>
                      <div class="col">
                          <label for="">Unidade dessa sala</label>
                      
                        <select name="idUnidade" class="form-control" id="">
                        <option value="">Selecione</option>
                        <?php while( $rows_unidade = mysqli_fetch_assoc($resultada_final_unidade)){ ?>                            
                        <option value="<?php echo $rows_unidade['idUnidade'] ?>"><?php echo $rows_unidade['nomeUnidade']; ?></option>
                        <?php } ?>
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