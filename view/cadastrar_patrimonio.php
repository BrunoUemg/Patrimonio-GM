<?php 

include_once "sidebar.php";

?>

<div class="main-content">
              <div class="panel-row">
                  <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_patrimonio.php'">Voltar ao gerenciamento</button>
                  <button class="btn-panel" type="button" onclick="window.location.href= 'consultar_patrimonio.php'" >Visualizar Patrimônio</button>
              </div>
              <div class="painel-acoes" >
                <form>
                    <div class="row">
                      <div class="col">
                          <label for="">Unidade</label>
                        <select name="nomeBanco" class="form-control" id="">
                            <option value="">Selecione</option>
                            
                        </select>
                      </div>
                      <div class="col">
                          <label for="">Código</label>
                        <input type="text" class="form-control" placeholder="Codigo">
                      </div>
                      <div class="col">
                          <label for="">Nota fiscal</label>
                        <input type="text" class="form-control" placeholder="Agência">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Descrição</label>
                            <input type="text" class="form-control" name="numeroConta" id="">
                        </div>
                        <div class="col">
                            <label for="">Conservação</label>
                           <select name="tipoConta" class="form-control" id="">
                               <option value="">Selecione</option>
                               <option value="">Corrente</option>
                               <option value="">Salário</option>
                               <option value="">Poupança</option>
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