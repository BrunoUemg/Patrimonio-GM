
<?php 

include_once "../dao/conexao.php";
session_start();
if (isset($_SESSION['nomeUsuario'])) {
    //login ok!
} else {
    header('location: ../login_gm.php');
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png" type="image/x-icon"/>
    <title>Patrimônio</title>
    <link rel="stylesheet" href="../assets/all.css">
    <!-- css boostrap -->
    <link href="../assets/bootstrap.min.css" rel="stylesheet" >
    <!--<link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap4.min.css"> outro layout para o datatables-->
</head>
<body>
    <div class="flex-dashboard">
        <!--Barra lateral-->
        <sidebar id="sideBar">
          <div class="sidebar-title" onclick="window.location.href = '../index.php'">
              <img src="../img/logo.png" alt="">
              <h2 >Patrimônio</h2>
          </div>
          <!--Menu da barra lateral-->
          <div class="menu">
              <ul>
                <li onclick="window.location.href = 'gerenciar_patrimonio.php'">
                    <i class="fas fa-university">
                    <a href="gerenciar_patrimonio.php"></i>Patrimônio</a>
                  </li>
                  <li id="">
                    <i class="far fa-building"></i>
                    <a href="#">Unidade</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="#">Sala</a>
                </li>
                <li>
                    <i class="fas fa-money-check"></i>
                    <a href="#">Tipo e subtipo</a>
                </li>

                <li>
                    <i class="fas fa-money-check"></i>
                    <a href="#">Entidade</a>
                </li>
                <li>
                    <i class="fas fa-money-check"></i>
                    <a href="#">Status</a>
                </li>
              </ul>
          </div>
        </sidebar>
        <!--Todo conteudo da pagina-->
        <main id="mainContent">
            <!--Topo da pagina-->
            <header>
                <i id="iconMenu" onclick="responsiveSideBar()"  class="fas fa-bars"></i>
               <a  data-bs-toggle="modal" data-bs-target="#saida"><i class="fas fa-sign-out-alt"></i>Sair</a>
              
            </header>
                <!--Conteudo central da pagina-->
      

    <!--Modal de saida-->

    <div class="modal" tabindex="-1" id="saida">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Logout</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Deseja sair do sistema ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="location.href='../logout.php'" class="btn btn-danger">Sair</button>
            </div>
          </div>
        </div>
      </div>
 

<!--Jquery datatables-->
<script src="../js/jquery-3.4.1.min.js"></script>  

<!-- script boostrap 5.0.1 -->
<script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/5b060b80da.js" crossorigin="anonymous"></script>

<!--Script datatables-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script src="../js/datatables.min.js"></script>
<!--Menu bars-->
<script src="../js/menu.js"></script>
</body>
</html>