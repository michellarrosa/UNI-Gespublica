<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();	
	$licform['responsavel_cpf'] = $_SESSION['uni_ext_cpf'];
	$licform['status'] ="editável";
	$licform['empreendedor_nome']=explode("=", $_POST['dados'])[1];
	unset( $_POST['dados'], $_POST['componente'], $_POST['modulo'] );
	// array_shift($_POST);	array_shift($_POST);	array_shift($_POST);
	$licform = array_merge($licform, $_POST);
	if(isset($licform['atividade_dataini'])){
		$dtz = new DateTimeZone("America/Sao_Paulo");
		$atividade_dataini = new Datetime( str_replace("/", "-", $licform['atividade_dataini']), $dtz );
		$licform['atividade_dataini'] = $atividade_dataini->format("Y/m/d");
	}
	// echo "<pre>";
	// print_r($licform);
	// echo "</pre>";
######################################################################1o QUADRANTE OBRIGATÓRIO
$quadrante01 = array("empreendedor_nome"=>"Nome do empreendedor","empreendedor_cnpjcpf"=>"CNPJ ou CPF do empreendedor","empreendedor_end_rua"=>"Rua do empreendedor","empreendedor_end_numero"=>"Numero do Empreendedor","empreendedor_end_bairro"=>"Bairro do Empreendedor","empreendedor_end_cep"=>"CEP do Empreendedor","empreendedor_end_cidade"=>"Cidade do Empreendedor","empreendedor_end_estado"=>"Estado do empreendedor","empreendedor_email"=>"Email do empreendedor", "empreendedor_telefone"=>"Telefone do empreendedor");
######################################################################2o QUADRANTE OBRIGATÓRIO
$quadrante02 = array("emp_razaosocial"=>"Razão Social","emp_fantasia"=>"Nome Fantasia","emp_cnpjcpf"=>"CNPJ/CPF do Empreendimento","emp_end_rua"=>"Rua do empreendimento","emp_end_numero"=>"Numero do empreendimento","emp_end_bairro"=>"Bairro do empreendimento","emp_end_cep"=>"CEP do empreendimento","emp_end_cidade"=>"Cidade do empreendimento","emp_end_estado"=>"Estado do empreendimento");
######################################################################3o QUADRANTE OBRIGATÓRIO
$quadrante03 = array("emp_coord" => "Coordenada do empreendimento","emp_status_coord" => "Status da coordenada do empreendimento");
######################################################################4o QUADRANTE OBRIGATÓRIO
$quadrante04 = array("atividade_cod"=>"Código da Atividade", "atividade_tamanho"=>"Tamanho da atividade", "atividade_auto_unid_medida"=>"Unidade de medida", "atividade_auto_potencialpoluidor"=>"Potencial poluidor", "atividade_auto_porte"=>"Porte da atividade", "tipoLicenca"=>"Tipo de licença", "resolucao"=>"Resolução");
$arraySafe = array_merge($quadrante01, $quadrante02, $quadrante03, $quadrante04);
foreach($arraySafe as $key=>$value){
	if(isset($licform[$key])){
		if(is_string($licform[$key])){
			if(!empty($licform[$key])){
			
			}else{echo "$value não foi devidamente preenchido";return 0;}
		}else{echo "$value não foi devidamente preenchido";return 0;}
	}else{echo "$value não foi devidamente preenchido";return 0;}
}
######################################################################FIM QUADRANTES OBRIGATÓRIOS

########################################## QUADRANTE NÃO OBRIGATÓRIO O PREENCHIMENTO NO EXATO MOMENTO DO ENVIO ####################################
$quadrantenao_obrigatorio = array(
"atm_geracao"=>array( 
	"atm_geracao_esp"=>"Descrição das fontes geradoras e dos mecanismos de controle",
	"item"=>"<strong><br>11. Emissões sonoras e atmosféricas: </strong>"	
),
"solidos_geracao"=>array(
	"solidos_geracao_esp"=>"Descrição(tipo, acondicionamento, destinação final, entre outros)",
	"item"=>"<strong><br>12. Resíduos sólidos: </strong>"	
),

"sanitarios_geracao"=>array(
	"sanitarios_reaproveita"=>"Reaproveitamento dos efluentes sanitários",
	"sanitarios_disposicao_final"=>"Disposição final dos efluentes sanitários",
	"sanitarios_tipo_sistema_proprio"=>array(
		"sanitarios_sistema_proprio_esp"=>"Sistema de tratamento próprio",
		"item"=>"Descrição"),
	"item"=>"<strong><BR>9. Efluentes líquidos sanitários: </strong>"
),

"liquidos_geracao"=>array(
	"liquidos_reaproveita"=>array(
		"liquidos_reaproveita_esp"=>" Especificar Reaproveitamento dos Efluentes Indústriais: ",
		"item"=>"Reaproveitamento dos efluentes industriais"
	),
	"liquidos_disposicao"=>"Disposição final dos efluentes líquidos industriais",
	"liquidos_geracao_outros"=>array(
		"liquidos_geracao_outros_esp"=>" Especificação das etapas de geração dos efluentes líquidos industriais ",
		"item"=> "<strong><br>Outros...</strong>"
	),
	"liquidos_gerecao_esp"=>"Especificação do tipo de tratamento dos efluentes líquidos industriais",
	"item"=>"<strong><BR>10. Efluentes líquidos industriais: </strong>"
),

"agua_consumo"=>array(
	"agua_outro"=>array("agua_outro_especificar"=>"Descrição do tipo de abastecimento"),
	"item"=>"<strong><BR>8. Informações sobre o consumo de água </strong>"
),


"prestacao_servico"=>array(
	"prestacao_descricao"=>"Descrição das etapas do processo produtivo industrial",
	"prestAcondicionamento"=>"Forma de prestação",
	"prestQuantidade"=>"Quantidade prestação/mês",
	"servico"=>"Serviço prestado",
	"item"=>"<strong><br>7. Relação de serviços do empreendimento:</strong>"
),

"producao_processo"=>array(
	"producao_descricao"=>"Descrição das etapas do processo produtivo industrial",
	"prodAcondicionamento"=>"Forma de acondicionamento",
	"prodQuantidade"=>"Quantidade produzida/mês",
	"prodNome"=>"Produto final",
	"item"=>"<strong><br>7. Relação de produção do empreendimento: </strong>"
),

"equipamentos_utilizacao"=>array(
	"equipNome"=>"Equipamentos",
	"equipDescricao"=>"Descrição",
	"equipQuantidade"=>"Quantidade",
	"item"=>"<strong><br>6. Relação dos equipamentos utilizados no empreendimento: </strong>"
),

"atividade_iniciada"=>array(
	"atividade_horaencerramento"=>"Horário de fim do expediênte",
	"atividade_horaintervalofim"=>"Fim do intervalo do expediênte",
	"atividade_horaintervalo"=>"Início do intervalo do expediênte",
	"atividade_horainicio"=>"Horário de início do expediênte",
	"atividade_dataini"=>"Data de início da atividade",
	"item"=>"<strong><br>5. Informações sobre o funcionamento: </strong>"
));


$itens = array();
$flag=0;
########################################## QUADRANTE NÃO OBRIGATÓRIO ESPECIFICO ####################################
foreach($quadrantenao_obrigatorio as $key=>$value){
	if(isset($licform[$key]) && $licform[$key] == "TRUE"){
		foreach($value as $id => $conteudo){
			
			if(is_array($conteudo)){ //caso seja um vetor de itens
				foreach ($conteudo as $indice => $val) {
					if($indice == "item"){
						if($flag == 1){
							array_push($itens,$val);
							$flag=0;
						}
					}elseif(!isset($licform[$indice]) || !is_string($licform[$indice]) || empty($licform[$indice]) || is_null($licform[$indice])){
						$flag=1;
						array_push($itens,$val);								
					}
				}
			}else{//se for somente uma tag
				if($id == "item"){
					if($flag == 1){
						array_push($itens,$conteudo);
						$flag=0;
					}
				}elseif(!isset($licform[$id]) || !is_string($licform[$id]) || empty($licform[$id]) || is_null($licform[$id])){
					$flag=1;
					array_push($itens,$conteudo);
				}
			}
		}
	}
}


// $concatena_quadrante="";
// $flag=0;	
// $storeKey="";
// 	foreach($quadrantenao_obrigatorio as $key=>$value){
// 		if(isset($licform[$key])){
// 			if(is_string($licform[$key])){
// 				if(!empty($licform[$key])){
// 					if($licform[$key] == "TRUE"){
// 						foreach($value as $id => $cont){
// 							if(is_array($cont)){ //se minha variavel for um contador | Em especial para casos com CHECKBOX|
// 								foreach ($cont as $chave => $val) {
// 									if(isset($licform[$chave])){ 
// 										if(!isset($licform[$chave]) || !is_string($licform[$chave]) || empty($licform[$chave]) || is_null($licform[$chave])){
// 												$concatena_quadrante.=$val.",";$flag=1;}								
// 										}
// 									}
							
// 							}else{
// 								if(!isset($licform[$id]) || !is_string($licform[$id]) || empty($licform[$id]) || is_null($licform[$id])){
// 									$concatena_quadrante.=$cont.",";$flag=1;}								
// 								}
							
							
// 						}
// 					}
// 				}
// 			}
// 		}
		
// 	}
// $concatena_quadrante = substr($concatena_quadrante,0, strlen($concatena_quadrante)-1);

	// explodi a coordenada em duas para poder tratar
	// retirei o caracter "e" por segurança
	if($licform['emp_coord']){
		$coord[0]= 0 + str_replace("e", "", explode(",", $licform['emp_coord'])[0]);
		$coord[1]= 0 + str_replace("e", "", explode(",", $licform['emp_coord'])[1]);
		$licform['emp_coord'] = implode(",", $coord);
		if(is_float( $coord[0] ) && is_float( $coord[1] )){// para debugar
			// echo "Coordenadas válidas!<br>";
			// echo $coord[0]."<br>";
			// echo $coord[1]."<br>";
			// echo $licform['emp_coord'];
			// return 0;
		}else{
			echo "ERRO, coordenadas inválidas!<br>";
			// echo $coord[0]."<br>";
			// echo $coord[1]."<br>";
			echo $licform['emp_coord'];
			return 0;
		}
	}else{
		echo "ERRO! Coordenadas fornecidas são invalidas.<br>";
		return 0;
	}
######################################################################
	
	// $form_checkboxes = array("emp_resp_tecnico", "atividade_iniciada", "agua_consumo", "atm_geracao", "solidos_geracao", "vegetacao_areautil", "vegetacao_intervencao", "sanitarios_geracao", "emp_resp_tecnico", "liquidos_geracao");
	// foreach($form_checkboxes as $checkbox_id){
		// if(isset($licform[$checkbox_id])){
			// if($licform[$checkbox_id]=="TRUE"){
				// //a pensar, talvez nada
			// }else{$licform[$checkbox_id] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
		// }else{$licform[$checkbox_id] = "FALSE";}
	// }
	if(isset($licform['atm_geracao'])){
		if($licform['atm_geracao']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['atm_geracao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['atm_geracao'] = "FALSE";}
	if(isset($licform['solidos_geracao'])){ 
		if($licform['solidos_geracao']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['solidos_geracao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['solidos_geracao'] = "FALSE";}
	if(isset($licform['vegetacao_areautil'])){ 
		if($licform['vegetacao_areautil']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['vegetacao_areautil'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['vegetacao_areautil'] = "FALSE";}
	if(isset($licform['vegetacao_intervencao'])){ 
		if($licform['vegetacao_intervencao']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['vegetacao_intervencao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['vegetacao_intervencao'] = "FALSE";}	
	if(isset($licform['sanitarios_geracao'])){
		if($licform['sanitarios_geracao']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['sanitarios_geracao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['sanitarios_geracao'] = "FALSE";}
	if(isset($licform['emp_resp_tecnico'])){
		if($licform['emp_resp_tecnico']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['emp_resp_tecnico'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['emp_resp_tecnico'] = "FALSE";}
	if(isset($licform['atividade_iniciada'])){
		if($licform['atividade_iniciada']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['atividade_iniciada'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['atividade_iniciada'] = "FALSE";}
	if(isset($licform['agua_consumo'])){
		if($licform['agua_consumo']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['agua_consumo'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['agua_consumo'] = "FALSE";}
	if(isset($licform['liquidos_geracao'])){ 
		if($licform['liquidos_geracao']=="TRUE"){
			//a pensar, talvez nada
		}else{$licform['liquidos_geracao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['liquidos_geracao'] = "FALSE";}

	######################################################################
	
	if(isset($licform['equipamentos_utilizacao'])){
		if($licform['equipamentos_utilizacao']=="TRUE"){
			$licform['equipamentos_tabela']="";
			foreach($licform['equipNome'] AS $key=>$value){
				if($value != ""){// se o checkbox for true e os text estiverem vazios equipamentos_tabela continuará NULL=""
					$licform['equipamentos_tabela'] .= $value.'\t'.$licform['equipDescricao'][$key].'\t'.$licform['equipQuantidade'][$key].'\n';	
				}
			}
			unset($licform['equipNome']);
			unset($licform['equipDescricao']);
			unset($licform['equipQuantidade']);
		}else{$licform['equipamentos_utilizacao'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['equipamentos_utilizacao'] = "FALSE";}

	
	if(isset($licform['producao_processo'])){ //  Há processo produtivo no empreendimento? 
		if($licform['producao_processo']=="TRUE"){
			$licform['producao_tabela']="";
			foreach($licform['prodNome'] AS $key=>$value){
				if($value != ""){// se o checkbox for true e os text estiverem vazios producao_tabela continuará NULL=""
					$licform['producao_tabela'] .= $value.'\t'.$licform['prodQuantidade'][$key].'\t'.$licform['prodAcondicionamento'][$key].'\n';		
				}
			}
			unset($licform['prodNome']);
			unset($licform['prodQuantidade']);
			unset($licform['prodAcondicionamento']);
		}else{$licform['producao_processo'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['producao_processo'] = "FALSE";}
	
	if(isset($licform['prestacao_servico'])){ //  Há processo produtivo no empreendimento? 
		if($licform['prestacao_servico']=="TRUE"){
			$licform['prestacao_tabela']="";
			foreach($licform['servico'] AS $key=>$value){
				if($value != ""){// se o checkbox for true e os text estiverem vazios prestacao_tabela continuará NULL=""
					$licform['prestacao_tabela'] .= $value.'\t'.$licform['prestQuantidade'][$key].'\t'.$licform['prestAcondicionamento'][$key].'\n';		
				}
			}
			unset($licform['servico']);
			unset($licform['prestQuantidade']);
			unset($licform['prestAcondicionamento']);
		}else{$licform['prestacao_servico'] = "FALSE";} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['prestacao_servico'] = "FALSE";}


	if(isset($licform['sanitarios_reaproveita'])){					//######## NOVO
		if($licform['sanitarios_reaproveita'] == "Total"){
			$licform['sanitarios_reaproveita'] = "Total";
		}
		if($licform['sanitarios_reaproveita'] == "Parcial"){
			$licform['sanitarios_reaproveita'] = "Parcial";
		}	
		if($licform['sanitarios_reaproveita'] == "Não há reaproveitamento"){
			$licform['sanitarios_reaproveita'] = "Não há reaproveitamento";
		} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['sanitarios_reaproveita'] = "FALSE";}
	
	if(isset($licform['liquidos_reaproveita'])){					//######## NOVO
		if($licform['liquidos_reaproveita'] == "Total"){
			$licform['liquidos_reaproveita'] = "Total";
		}
		if($licform['liquidos_reaproveita'] == "Parcial"){
			$licform['liquidos_reaproveita'] = "Parcial";
		}	
		if($licform['liquidos_reaproveita'] == "Não há reaproveitamento"){
			$licform['liquidos_reaproveita'] = "Não há reaproveitamento";
		} //mesmo se houver conteúdo //depois é só não mostrar o conteúdo, somente o NÂO
	}else{$licform['liquidos_reaproveita'] = "FALSE";}

	// echo "<pre>";
	// print_r($licform); //para debugar
	// echo "<pre>";
	
	 // return 0;
	 
###################################################################### INSERÇÕES
	
	$campos=$valores=array();
	foreach($licform as $campo=>$valor){
		$campos[]=$campo;
		if(is_string($valor)){
			$valor = str_replace("'", "`", $valor);
			$valores[] = "'".$valor."'";
		}else{
			$valores[] = $valor;
		}
	}
	
	

###################################################################### INSERÇÕES MANUAIS
	$campos[] = "time_criacao";
	$valores[] = 'now()';

	$campos[] = "atividade_descr";
	$valor = implode('', $this->execQuery("SELECT descricao FROM com_licam.atividades_tabela WHERE codramo ='".$licform['atividade_cod']."'")['result'][0]);
	$valor = "'".$valor."'";
	$valores[] = $valor;
	if($_SESSION['uni_ext_form_op'] == "envio"){ // NO CASO DE INSERT
		$query = "INSERT INTO com_licam.empreendimentodata (" . implode(',', $campos) . ") VALUES (" . implode(',', $valores) . ")";
	}else{ // NO CASO DE UPDATE
		$update="";
		foreach($campos as $key=>$value){
			$update.=$value.'='.$valores[$key].",";
		}
		$size = strlen($update);
		$update = substr($update,0, $size-1);
		
		$query = "UPDATE com_licam.empreendimentodata SET ".$update.",time_criacao=now() WHERE id = ".$_SESSION['uni_ext_id_form'];		
	}
	
###################################################################### Verifica os nao obrigatorios

	$concat="";
	if(!empty($itens)){
		$result = $this->execQuery($query);
			$status = "";
			if($result['status'] == 1){
				$status = "ok";//somente quando estiver pronto
			}else{
				foreach ($itens as $key => $value) {
					$concat.=$value.",";
				}
				$status = $concat;//somente quando estiver pronto
			}
			echo $status; //endEnvia
	}else{
		foreach ($itens as $key => $value) {
			$concat.=$value.",";
		}
		echo "<strong>Os seguintes itens não foram devidamente preenchidos: <br></strong>".$concat;
	}

?>