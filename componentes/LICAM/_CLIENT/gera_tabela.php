<?php
header('Content-type: application/json; charset=utf-8');
session_start();

$section = $_POST['dados'];
$section = explode("/", $_POST['dados']);

	if($section[0] == "equipamentos_utilizacao"){
		$table_name="equipamentos_tabela";
	}
	if($section[0] == "producao_processo"){
		$table_name="producao_tabela";
	}
	if($section[0] == "prestacao_servico"){
		$table_name="prestacao_tabela";
	}

	$query = "SELECT ".$table_name." FROM com_licam.empreendimentodata WHERE id = '". $section[1]."'";

	$result = $this->execQuery($query)['result'][0];
	function multiploexplode ($delimiters,$string) {

	    $var = str_replace($delimiters, $delimiters[0], $string);
	    $var = explode($delimiters[0], $var);
	    return  $var;
	}
	
	$var = implode( ", ", $result );
	$var = multiploexplode(array('\t','\n','"'),$var);
	$var = implode( "$", $var );
	// array_pop($var);
	// print_r($var);

echo $var;
?>
