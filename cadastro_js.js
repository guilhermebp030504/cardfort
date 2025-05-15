function validar_login() {

if (usuario.value === "" && senha.value === ""){
		mensagem.innerHTML = "Preencha os campos faltantes.";
		$('#alerta').modal('show');
}	

	if (usuario.value === ""){
		mensagem.innerHTML = "Preencha o campo usuario.";
		$('#alerta').modal('show');
}

if (senha.value === ""){
		mensagem.innerHTML = "Preencha o campo senha.";
		$('#alerta').modal('show');
}

function validar_cadastro() {
