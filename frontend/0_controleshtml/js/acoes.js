function alertaGenerico() {
    alert("Botao clicado com sucesso!");
}

function mostrarValor() {
    alert("Valor do botao: " + document.getElementById("btnMostrar").value);
}

function mudaCor() {
    document.getElementById("btnMostrar").style.backgroundColor = "#008CBA";
}

function voltaCor() {
    document.getElementById("btnMostrar").style.backgroundColor = "#4CAF50";
}

function atualizaOutputRange() {
    document.getElementById('outputRange').value = document.getElementById('rngVolume').value;
}

function atualizaOutputNumber() {
    document.getElementById('outputNumber').value = document.getElementById('numIdade').value;
}