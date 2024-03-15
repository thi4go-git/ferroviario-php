document.addEventListener('DOMContentLoaded', function () {

    VMasker(document.getElementById('celular-input')).maskPattern('(99) 99999-9999');
    VMasker(document.getElementById('tel-comercial-input')).maskPattern('(99) 9999-9999');
    VMasker(document.getElementById('cep-input')).maskPattern('99999-999');

    let siglaEstado = document.getElementById('estado-input');
    siglaEstado.addEventListener('input', function () {
        siglaEstado.value = formatarSiglaEstado(siglaEstado.value).toUpperCase();
    });

});

function formatarSiglaEstado(valorCampo) {
    valorCampo = valorCampo.replace(/[^a-zA-Z]/g, '');
    valorCampo = valorCampo.substring(0, 2);
    return valorCampo;
}

function teste() {
    let cep = document.getElementById('cep-input').value.replace("-", "");
    console.log(cep);
}

function consultarEnderecoViaCEP() {
    let cep = document.getElementById('cep-input').value.replace("-", "");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/', true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById('logradouro-input').value = response.logradouro;
            document.getElementById('complemento-input').value = response.complemento;
            document.getElementById('setor-input').value = response.bairro;
            document.getElementById('cidade-input').value = response.localidade;
            document.getElementById('cidade-input').value = response.localidade;
            document.getElementById('estado-input').value = response.uf;
        } else {
            alert('Não foi possível realizar a consulta VIA CEP!');
        }
    };
    xhr.send();
}

document.getElementById("formulario-solicitante").addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();//Impede que o submit do formulário ao pressionar ENTER
    }
});

document.getElementById("botao-atualizar").addEventListener("click", function () {
    document.getElementById("formulario-solicitante").submit();
});