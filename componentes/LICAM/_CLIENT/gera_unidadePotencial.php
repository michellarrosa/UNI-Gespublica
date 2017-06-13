<?php	
//########################## GERADOR DA UNIDADE DE MEDIDA + POTENCIAL POLUIDOR##############################

	header('Content-Type: text/html; charset=UTF-8');
	$atividade_codigo = $_POST['dados'];
	
	$sql = "SELECT * FROM com_licam.atividades_tabela WHERE codramo = '".$atividade_codigo."'";
	$result = $this->execQuery($sql)['result'];
	
	$unidade = $result[0]['unidade'];
	$potencial = $result[0]['potencial'];
	$resolucao = $result[0]['resolucao']; 
	echo $unidade.",".$potencial.",".$resolucao;	
?>
