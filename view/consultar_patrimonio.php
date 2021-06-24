<?php 

include_once "sidebar.php";

?>

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
                        <tr>
                            <td>Teste</td>
                            <td>Teste</td>
                            <td>
                            <a class='btn btn-primary' title='Vizualizar Tudo' href='#'><i class="fa fa-search"></i></a>
                            <a class='btn btn-danger' title='Vizualizar Tudo' href='#'><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
            

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