function atualizaOutIdade(){
    document.getElementById('outIdade').value = document.getElementById('txtIdade').value;
}
function atualizaOutSatisfacao(){
    document.getElementById('outSatisfacao').value = document.getElementById('rngSatisfacao').value;
}
function outEqualizador(){
    if (document.getElementById('rngGeral').value == 5){
        document.getElementById('rngGrave').value = 5;
        document.getElementById('rngGraveMedio').value = 0;
        document.getElementById('rngMedio').value = 0;
        document.getElementById('rngAgudoMedio').value = 0;
        document.getElementById('rngAgudo').value = 0;
    }
    if (document.getElementById('rngGeral').value == 4){
        document.getElementById('rngGrave').value = 0;
        document.getElementById('rngGraveMedio').value = 5;
        document.getElementById('rngMedio').value = 0;
        document.getElementById('rngAgudoMedio').value = 0;
        document.getElementById('rngAgudo').value = 0;
    }
    if (document.getElementById('rngGeral').value == 3){
        document.getElementById('rngGrave').value = 0;
        document.getElementById('rngGraveMedio').value = 0;
        document.getElementById('rngMedio').value = 5;
        document.getElementById('rngAgudoMedio').value = 0;
        document.getElementById('rngAgudo').value = 0;
    }
    if (document.getElementById('rngGeral').value == 2){
        document.getElementById('rngGrave').value = 0;
        document.getElementById('rngGraveMedio').value = 0;
        document.getElementById('rngMedio').value = 0;
        document.getElementById('rngAgudoMedio').value = 5;
        document.getElementById('rngAgudo').value = 0;
    }
    if (document.getElementById('rngGeral').value == 1){
        document.getElementById('rngGrave').value = 0;
        document.getElementById('rngGraveMedio').value = 0;
        document.getElementById('rngMedio').value = 0;
        document.getElementById('rngAgudoMedio').value = 0;
        document.getElementById('rngAgudo').value = 5;
    }
}