<?php 

include_once "sidebar.php";


$result_patrimonio = "SELECT * FROM patrimonio P INNER JOIN sala S ON S.idSala = P.idSala 
INNER JOIN entidade E ON E.idEntidade = P.idEntidade INNER JOIN status T ON T.id = P.idStatus
INNER JOIN subtipo U ON U.idSubtipo = P.idSubtipo where T.nome != 'Desuso'";
$resultado_patrimonio = mysqli_query($con, $result_patrimonio);
?>
<style type="text/css">
			.carregando{
			
				display:none;
			}
      .carregando2{
			
      display:none;
    }
		</style>

<div class="main-content">
              <div class="panel-row">
                  <button class="btn-panel" type="button" onclick="window.location.href = 'cadastrar_patrimonio.php'">Cadastrar Patrimônio</button>
                  <button class="btn-panel" type="button" onclick="window.location.href = 'gerenciar_patrimonio.php'">Voltar ao gerenciamento</button>
                  
              </div>
              <div class="painel-acoes">
                    <!--ambiente onde fica as tabelas e formularios-->
                <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Código Patrimonio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($rows_patrimonio = mysqli_fetch_assoc($resultado_patrimonio)){ ?>
                        <tr>
                        <td><?php echo $rows_patrimonio['descricaoPatrimonio']; ?></td>
                            <td><?php echo $rows_patrimonio['codigoPatrimonio']; ?></td>
                           
                            <td>
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#alterar<?php echo $rows_patrimonio['idPatrimonio']; ?>" role="button"><i class="fa fa-edit"></i></a>
                            
                            
                            
                            
                            <div class="modal fade" id="alterar<?php echo $rows_patrimonio['idPatrimonio']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Alterar Patrimônio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="../dao/envio_alterar_patrimonio.php" method="POST">

                              <center><h4>Alterar dados do patrimônio</h4></center>
                              <?php 
                               $select_sala = "SELECT * FROM sala S INNER JOIN unidade U ON U.idUnidade = S.idUnidade where idSala = '$rows_patrimonio[idSala]'";
                               $res = $con->query($select_sala);
                               $linha_sala = $res->fetch_assoc();
                              
                              ?>

                               
                                <div class="row">
                                <div class="col">
                                <input type="text" hidden readOnly name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                                <label for="">Descrição</label>
                                <input type="text" class="form-control"  required="required" name="descricaoPatrimonio" value="<?php echo $rows_patrimonio['descricaoPatrimonio'] ?>" id="">
                                </div>
                               
                                <div class="col">
                                <label for="">Código do patrimonio</label>
                                <input type="text" class="form-control" required="required"  name="codigoPatrimonio" value="<?php echo $rows_patrimonio['codigoPatrimonio'] ?>" id="">
                                </div>

                                <div class="col">
                                <label for="">Status</label>
                                <select name="idStatus" class="form-control" id="">
                                <?php 
                                $result_status = "SELECT * FROM status";
                                $resultado_status = mysqli_query($con, $result_status); 
                                   while($rows_status = mysqli_fetch_assoc($resultado_status)){     ?>
                               
                                    <option value="<?php echo $rows_status['id']; ?>"<?php if($rows_status['id'] == $rows_patrimonio['id']) echo 'selected' ?>><?php echo $rows_status['nome']; ?> </option>
                                <?php } ?>
                                 </select>
                                </div>

                                <div class="col">
                                <label for="">Entidade</label>
                                <select name="idEntidade" class="form-control" id="">
                                <?php 
                                $result_entidade = "SELECT * FROM entidade";
                                $resultado_entidade = mysqli_query($con, $result_entidade); 
                                   while($rows_entidade = mysqli_fetch_assoc($resultado_entidade)){     ?>
                               
                                    <option value="<?php echo $rows_entidade['idEntidade']; ?>"<?php if($rows_entidade['idEntidade'] == $rows_patrimonio['idEntidade']) echo 'selected' ?>><?php echo $rows_entidade['nomeFantasia']; ?> </option>
                                <?php } ?>
                                 </select>
                                </div>
                                </div>
                                <div class="row">
                                
                                
                                <div class="col">
                                <label for="">Subtipo</label>
                                <select name="idSubtipo" class="form-control" id="">
                                <?php 
                                $result_subtipo = "SELECT * FROM subtipo";
                                $resultado_subtipo = mysqli_query($con, $result_subtipo); 
                                   while($rows_subtipo = mysqli_fetch_assoc($resultado_subtipo)){     ?>
                               
                                    <option value="<?php echo $rows_subtipo['idSubtipo']; ?>"<?php if($rows_subtipo['idSubtipo'] == $rows_patrimonio['idSubtipo']) echo 'selected' ?>><?php echo $rows_subtipo['descricaoSubtipo']; ?> </option>
                                <?php } ?>
                                 </select>
                                </div>
                                <div class="col">
                                <label for="">Nota fiscal</label>
                                <input type="text" class="form-control" required="required"  name="notaFiscal" value="<?php echo $rows_patrimonio['notaFiscal'] ?>" id="">
                                </div>
                                <div class="col">
                                <label for="">Conservação</label>
                                <select name="conservacao" required="required" class="form-control" id="">
                               <option value="">Selecione</option>
                               <option value="Bom"<?php if($rows_patrimonio['conservacao'] == 'Bom') echo 'selected'; ?>>Bom</option>
                               <option value="Regular"<?php if($rows_patrimonio['conservacao'] == 'Regular') echo 'selected'; ?>>Regular</option>
                               <option value="Ruim"<?php if($rows_patrimonio['conservacao'] == 'Ruim') echo 'selected'; ?>>Ruim</option>
                               <option value="Sucata"<?php if($rows_patrimonio['conservacao'] == 'Sucata') echo 'selected'; ?>>Sucata</option>
                           </select>
                                </div>
                                </div>
                                
                                <br>

                                <input type="submit" class="btn btn-success" value="Alterar">
                                </div> 
                                </form>



                                <!-- movimentação -->
                                <hr>
                                <div class="modal-body">
                                <form action="../dao/envio_alterar_patrimonio.php" method="POST">
                                <center><h4>Movimentar patrimônio</h4></center>
                                <?php 
                                 $select_sala = "SELECT * FROM sala INNER JOIN unidade ON unidade.idUnidade = sala.idUnidade where idSala = '$rows_patrimonio[idSala]'";
                                 $res = $con->query($select_sala);
                                 $linha_sala = $res->fetch_assoc();
                                
                                ?>
                                <input type="text" hidden readOnly name="idPatrimonio" value="<?php echo $rows_patrimonio['idPatrimonio']; ?>">
                                
                                <div class="row">
                                <div class="col">
                                <label for="">Unidade atual</label>
                                <input type="text" name="" readOnly id="" class="form-control" value="<?php echo $linha_sala['nomeUnidade']; ?>">
                                </div>
                                <div class="col">
                                <label for="">Sala atual</label>
                                <input type="text" name="" readOnly id="" class="form-control" value="<?php echo $linha_sala['nomeSala']; ?>">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                <label for="">Alterar unidade do patrimônio</label>   
                                <select name="idUnidade" required="required" class="form-control" id="idUnidade">
                                <option value="">Selecione</option>


                                <?php 
                               
                               

                                $result_unidade = "SELECT * FROM unidade";
                                $resultado_unidade = mysqli_query($con, $result_unidade); 
                                   while($rows_unidade = mysqli_fetch_assoc($resultado_unidade)){     
                               
                                 echo '<option value="'.$rows_unidade['idUnidade'].'">'.$rows_unidade['nomeUnidade'].'</option>';
                                 } ?>
                                </select>
                                </div>
                              
                                <div class="col">
                                <label>Alterar sala</label>
                                <span class="carregando">
                                Ops, sem sala nessa unidade, campo obrigatório!
                                </span>
                                <span id="span"></span>
                               <select name="idSala" required="required"  class="form-control" id="idSala">
                              <option value="">Escolha a sala</option>
                               </select>
                               </div>
                               </div>
                               <br>
                               <input type="submit" class="btn btn-success" value="Movimentar">
                                </div>
                                <div class="modal-footer">
                                
                                <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Fechar</button>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>


                            
                            </td>
                        </tr>
            
                      <?php } ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
        </main>
    </div>


   
  

<script>
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
    });
  </script>