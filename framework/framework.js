function modMaze(idModulo, dados, idLocal) {
	var xhttp;
	if (window.XMLHttpRequest) {xhttp = new XMLHttpRequest();} 
	else {	xhttp = new ActiveXObject("Microsoft.XMLHTTP");	}
	// xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  //ação caso receba o obj
		  document.getElementById(idLocal).innerHTML = this.responseText;			
		}
	};
	xhttp.open("POST", "ajax_modMaze.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("modulo="+idModulo+"&dados="+dados);
}

function testeAlert(){
	alert('funciona!');
}

displayConteudo(posicao, conteudo){  // necessidade improvavel
	getElementById(posicao).innerHTML = conteudo;
}
function testeDeResposta(){
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '/server', true);

	// If specified, responseType must be empty string or "text"
	xhr.responseType = 'text';

	xhr.onload = function () {
		if (xhr.readyState === xhr.DONE) {
			if (xhr.status === 200) {
				console.log(xhr.response);
				console.log(xhr.responseText);
			}
		}
	};

	xhr.send(null);
}