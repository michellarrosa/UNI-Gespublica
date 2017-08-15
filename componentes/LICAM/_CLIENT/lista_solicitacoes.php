<?php
header('Content-Type: text/html; charset=UTF-8');
ini_set('default_charset','UTF-8');

session_start();
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION['uni_ext_login']) ) {
	header("Location:login.php");
}

$listadeprocessos = $this->execQuery("SELECT * FROM uni__licam_empreendimentodata WHERE responsavel_cpf = '". $_SESSION['uni_ext_cpf']."'ORDER BY id")['result'];
$conteudoBody="";
foreach($listadeprocessos as $key=>$value){
	
	if(is_null($value['time_edicao'])){
		$value['time_edicao'] = $value['time_criacao'];
	}
	
	$conteudoBody.="<tr>
						
						<td><center>".$value['emp_razaosocial']."</center></td>
						<td><center>".$value['empreendedor_nome']."</center></td>
						<td><center>".$value['responsavel_cpf']."</center></td>
						<td><center>".(strftime('%d de %B de %Y ', strtotime(date('d-m-Y', strtotime($value['time_edicao'])))))."</center></td>
						<td><center>Aguardando Pagamento</center></td>
						<td><center>Ainda não gerado</center></td>
						<td class='text-center'><button type='button' id='".$value['emp_razaosocial']."'class='btn btn-default' onclick=imprime_formulario('imprimir.php?cod=".$value['id']."');>Imprimir <i class='fa fa-print'</i></button></td>
						<td class='text-center'><button type='button' id='".$value['emp_razaosocial']."'class='btn btn-default' onclick=location.href='editavel.php?cod=".$value['id']."';>Editar <i class='fa fa-pencil-square-o'</i></button></td>
						
						
					</tr>";
}

$modReturn ="
	<table class='table-full'>
			<thead>
				<tr>

					<th class='text-center'>Razão Social</th>
					<th class='text-center'>Nome do Empreendedor</th>
					<th class='text-center'>CPF/CNPJ Responsável</th>
					<th class='text-center'>Última Modificação</th>
					<th class='text-center'>Status</th>
					<th class='text-center'>N° do Processo</th>
					<th class='text-center'>Impressão</th>	
					<th class='text-center'>Editar Formulário</th>
				
				</tr>
			</thead>
			<tbody>
			$conteudoBody
			</tbody>
		</table>

";
echo $modReturn;

?>
	
    