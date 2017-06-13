<?php
	// echo htmlspecialchars($_SERVER["PHP_SELF"]);
	// foreach($_REQUEST as $key => $value){
		// $$key = $value;
	// }
?>
<DOCTYPE html>
<html>
<head>
	<title>Login - UNI</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="bibliotecas/css/bootstrap-3.3.7.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/css/bootstrap-theme-3.3.7.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/css/font-awesome-4.7.0/css/font-awesome.min.css">

</head>	
<body>
<div id="form_container" >
	<!--<div id="form_header" name="form_header" class="col-gd-3 col-md-3 col-md-offset-3 col-sm-8 col-sm-offset-2" width="100%">
		<div>UNI</div>
		<div>Sistema Multi-componente<br>
		Ferramenta de Gestão pública</div>
	</div>-->
	
   <div class="container">    
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">       
         <div class="panel panel-info" >
				<div class="panel-heading">
					<div class="panel-title">Acessar Sistema UNI</div>
					<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a suas credenciais?</a></div>
				</div>

				<div style="padding-top:30px" class="panel-body" >

					<div id="resposta" ></div>
						 
					<form action="" method="get" id="loginform" >
									
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="login-username" type="text" class="form-control" name="login[user]" value="" placeholder="credencial, cpf ou email" autofocus>                                        
						</div>
						
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="login-password" type="password" class="form-control" name="login[password]" placeholder="senha de acesso ao sistema">
						</div>
						
						<div class="input-group">									
							<div class="checkbox">
								<label>
									<input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar-me
								</label>
							</div>
						</div>


						<div style="margin-top:10px" class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
							 
							  <input type='submit' id="uni" name='uni' href="#" class="btn btn-primary" value='Entrar'></input>

							</div>
						</div>


					  <div class="form-group">
							<div class="col-md-12 control">
								 <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
								 </div>
							</div>
					  </div>    
					</form> 
				</div>                     
			</div>  
      </div>
   </div>
	
</div>
<!--
	ASSUME-SE QUE O USUÁRIO NÃO DESABILITOU O USO DE COOKIES.
	ISSO DEVE SER OBRIGATORIAMENTE TESTADO NO FUTURO.
	PROCURAR FUNÇÕES DE VERIFICAÇÃO NO SERVIDOR PHP E CLIENTE JAVASCRIPT.
-->
</body>

</html>