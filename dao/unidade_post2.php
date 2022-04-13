<?php include_once("conexao.php");

	if(isset($_REQUEST['idEntidade2'])){
		$idEntidade = $_REQUEST['idEntidade2'];
	}else{
		$idEntidade = $_REQUEST['idEntidade3'];
	}
	
	
	$result_unidade = "SELECT * FROM unidade WHERE idEntidade=$idEntidade ORDER BY nomeUnidade";
	$resultado_unidade = mysqli_query($con, $result_unidade);
	
	while ($row_unidade = mysqli_fetch_assoc($resultado_unidade) ) {
		$resultao2[] = array(
			'id'	=> $row_unidade['idUnidade'],
			'nome' => ($row_unidade['nomeUnidade']),
		);
	}
	
	echo(json_encode($resultao2));
