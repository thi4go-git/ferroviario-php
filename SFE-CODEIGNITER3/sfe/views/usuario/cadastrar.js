document.addEventListener('DOMContentLoaded', function () {

    let cpfCnpj = document.getElementById('cpf-cnpj-input');
    cpfCnpj.addEventListener('input', function () {
        aplicarMascaraCpfCnpj(cpfCnpj);
    });

    let nomeRaz = document.getElementById('nome-razao-input');
    nomeRaz.addEventListener('input', function () {
        nomeRaz.value = removerNumeros(nomeRaz.value);
    });

    let nomeResp = document.getElementById('nome-resp-input');
    nomeResp.addEventListener('input', function () {
        nomeResp.value = removerNumeros(nomeResp.value);
    });

    VMasker(document.getElementById('celular-input')).maskPattern('(99) 99999-9999')
    VMasker(document.getElementById('tel-comercial-input')).maskPattern('(99) 9999-9999')
    VMasker(document.getElementById('cep-input')).maskPattern('99999-999')

});

function aplicarMascaraCpfCnpj(cpfCnpj) {
    console.log(cpfCnpj.value);
    let cpfCnpjCleaned = deixarApenasNumeros(cpfCnpj.value);
    console.log(cpfCnpjCleaned.length);

    if (cpfCnpjCleaned.length <= 11) {
        VMasker(cpfCnpj).maskPattern('999.999.999-99')
        desabilitarCamposPJ();
    } else {
        VMasker(cpfCnpj).maskPattern('99.999.999/9999-99')
        if (cpfCnpjCleaned.length >= 12) {
            habilitarCamposPJ();
        }
    }
}

function habilitarCamposPJ() {
    //Nome responsável
    let campoNomeResponsavel = document.getElementById('nome-resp-input');
    campoNomeResponsavel.disabled = false;
    campoNomeResponsavel.required = "required";

    //Nome responsável
    let campoTelefoneComercial = document.getElementById('tel-comercial-input');
    campoTelefoneComercial.disabled = false;
    campoTelefoneComercial.required = "required";
}


function desabilitarCamposPJ() {
    let campoNomeResponsavel = document.getElementById('nome-resp-input');
    campoNomeResponsavel.disabled = true;
    campoNomeResponsavel.required = "false";
    campoNomeResponsavel.value = "";

    let campoTelefoneComercial = document.getElementById('tel-comercial-input');
    campoTelefoneComercial.disabled = true;
    campoTelefoneComercial.required = "false";
    campoTelefoneComercial.value = "";
}


function removerNumeros(valorCampo) {
    valorCampo = valorCampo.replace(/[^a-zA-Z\s]/g, '');
    return valorCampo;
}

function deixarApenasNumeros(valorCampo) {
    valorCampo = valorCampo.replace(/[\D\s]/g, '');
    return valorCampo;
}

function limparForm() {
    let confirmacao = confirm("Tem certeza de que deseja limpar o formulário?");
    if (confirmacao) {
        document.getElementById("formulario").reset();
    } else {
        return false;
    }
}
