

<?php

include_once "../dao/conexao.php";

$idSala = $_POST["idSala"];
$idResponsavel_patrimonio = $_POST["idResponsavel_patrimonio"];


$sql4 = "SELECT * FROM patrimonio P INNER JOIN sala S ON S.idSala = P.idSala INNER JOIN entidade E ON E.idEntidade = P.idEntidade where P.idSala = $idSala and P.idStatus !=2 ";
$res = $con-> query($sql4);
$linha = $res->fetch_assoc();
$resultado_patrimonio = mysqli_query($con, $sql4);


$select_resp = mysqli_query($con,"SELECT nomeResponsavel, cpf, rg FROM responsavel_patrimonio where idResponsavel_patrimonio = '$idResponsavel_patrimonio' ");
$resp = mysqli_fetch_array($select_resp); 
  

 $cont = 1;
  
  while ($rows_patrimonio = mysqli_fetch_assoc($resultado_patrimonio)) { 
        
         if($cont == 17 || $cont == 38 || $cont == 55){
        $html .= '<div style="page-break-after: always;"></div>';
        $html .= '<img style="position:fixed; top:-50px; left:-48px; width: 95.00%;" src="../img/header.png">';  
        $html .= '<div></div><br><br><br><br><br>';
       
         }
         
         $html .= '&nbsp; &nbsp; &nbsp;' .$cont.':&nbsp;'. $rows_patrimonio['codigoPatrimonio'] .'-'.$rows_patrimonio['descricaoPatrimonio']. '<br>';
        
        
         $cont += 1;   
  }
  
  
 
 /////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////
  
  
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  session_start();
  $data_hoje = date("d/m/Y");
  $hora_gerada = date("H:i:s");
  $sql_usuario = "SELECT * FROM usuario where idUsuario = $_SESSION[idUsuario]";
  $res = $con->query($sql_usuario);
  $linha_usuario = $res->fetch_assoc();
  use Dompdf\Dompdf;
  
  // include autoloader
  require_once 'dompdf/autoload.inc.php';
  
  $dompdf = new Dompdf();
  $dompdf->loadHtml(' 
  <div  style="position:absolute; bottom: 0px; right:5px;"> </div>
<br>
<br>
<br>
<br>
  <center><h2><u><b> TERMO DE RESPONSABILIDADE DOS EQUIPAMENTOS DO(A) '.$linha['nomeFantasia'].' </b></u></h2></center> 
  
  <br>
  

  <p>Eu '.$resp['nomeResponsavel'].', inscrito (a) no CPF sob o n?? '.$resp['cpf'].', RG '.$resp['rg'].', declaro ao <b>ASSOCIA????O PROFISSIONALIZANTE JOVEM CIDAD??O</b>, associa????o privada sem fins lucrativos, inscrita no CNPJ sob n?? 03.284.717/0001-09, com sede na Rua Pra??a Doutor Alcides de Paula Gomes, n??39, centro, munic??pio de Frutal/MG, CEP: 38200-090 que concordo com todos os termos do uso dos equipamentos da Institui????o e declaro ainda ser respons??vel pelos objetos pertencentes ao meu setor.</p>
   
       
      <h3><b>Concordo que:<b></h3>
      <ol>
      <li>&nbsp;Fica sob minha responsabilidade os seguintes bens da Institui????o:</li>
  
      '. $html . '
    
    <br>

    <li><u><b>&nbsp;Declaro que estou recebendo todos os itens acima em perfeito estado de conserva????o e uso, declarando ainda que est??o em funcionamento;</u></b></li>
    <li><u><b>&nbsp;Estou ciente que em caso de demiss??o ou rescis??o contratual, n??o terei acesso aos equipamentos da Institui????o;</u></b></li>
    <li><u><b>&nbsp;Garanto ainda, que irei entreg??-los da forma como encontrei;</u></b></li>
    <li><u><b>&nbsp;Qualquer equipamento que for retirado do meu setor dever?? constar em um documento com a assinatura de ambas as partes cientes;</u></b></li>
    <li><u><b>&nbsp;Como respons??vel pelo setor, assumo as responsabilidades pelos danos, sumi??o ou quaisquer outros contratempos nos equipamentos.</u></b></li>
    </ol>
 
  
    <p>O n??o cumprimento do presente Termo acarretar?? em responsabilidade civil, criminal, trabalhista e administrativa.</p>
    <p>Por fim, nos termos da legisla????o vigente e por estarem de pleno acordo com todas as cl??usulas e condi????es ora pactuadas, assinam o presente instrumento em 2 (duas) vias que ser??o disponibilizadas uma ao empregado e outra ao empregador.</p>
  
 
      
 

  <img style="position:fixed; top:-50px; left:-48px; width: 95.00%;" src="../img/header.png">

  
<div style="page-break-after: always;"></div>

   
  
    
    
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <table style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 45.0000%;">______________________________________ </td>
      <td style="width: 10.0000%;"> </td>
      <td style="width: 45.0000%;"><center>______________________________________</center> </td>
    </tr>
    <tr>
      <td style="width: 45.0000%;"><center><strong>ASSOCIA????O PROFISSIONALIZANTE JOVEM CIDAD??O</strong><br>CNPJ: 03.284.717/0001-09</center></td>
      <td style="width: 10.0000%;"> </td>
      <td style="width: 45.0000%;"> <center><strong>'.$resp['nomeResponsavel'].'</strong><br>CPF: '.$resp['cpf'].'</center> </td>
    </tr>

    </tbody>
    </table>
  <br>
  <br>
  <br>
  <br>
  <table style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 45.0000%;">______________________________________ </td>
      <td style="width: 10.0000%;"> </td>
      <td style="width: 45.0000%;">______________________________________ </td>
     
    </tr>
    <tr>
      <td style="width: 45.0000%;"><center><strong>Testemunha 1</strong></center></td>
      <td style="width: 10.0000%;"> </td>
      <td style="width: 45.0000%;"><center><strong>Testemunha 2</strong><br></center></td>
    </tr>

    </tbody>
    </table>
 
    <img style="position:fixed; top:-50px; left:-48px; width: 95.00%;" src="../img/header.png">
  
  ');
  
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');
  ob_clean();
  // Render the HTML as PDF
  $dompdf->render();
  
  // Output the generated PDF to Browser
  $dompdf->stream('Termo de responsabilidade dos bens de '.$resp['nomeResponsavel'].'.pdf',
  array ("Attachment" =>true //para realizar o download somente alterar para true
  )
  );


  ?>