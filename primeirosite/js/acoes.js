function mensagem() {
    alert("Olá mundo!.");
}

const botao = document.getElementById("botao");

let mouseX = 0;
let mouseY = 0;
let botaoX = window.innerWidth / 2;
let botaoY = window.innerHeight / 2;

botao.addEventListener("click", function(e) {
    e.preventDefault();
});

document.addEventListener("mousemove", function(event) {
    mouseX = event.clientX;
    mouseY = event.clientY;
});

function animar() {
    const velocidade = 0.1;

    botaoX += (mouseX - botaoX) * velocidade;
    botaoY += (mouseY - botaoY) * velocidade;

    botao.style.position = "absolute";
    botao.style.left = `${botaoX}px`;
    botao.style.top = `${botaoY}px`;

    requestAnimationFrame(animar);
}

animar();
