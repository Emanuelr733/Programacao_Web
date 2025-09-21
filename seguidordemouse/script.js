const charSprite = document.getElementById("charSprite");

let x = window.innerWidth / 2;
let y = window.innerHeight / 2;
let alvoX = x;
let alvoY = y;
const velocidade = 0.1;
const limite = 5;

let atuaAnim = "";

function setalvo(e) {
  alvoX = e.clientX;
  alvoY = e.clientY;
}

window.addEventListener("mousemove", setalvo, { passive: true });

function atualizaAnim(dx, dy, distancia) {
  let novaAnim = "";

  if (distancia < limite) {
    novaAnim = atuaAnim.replace("walk", "idle") || "idle_down.gif";
  } else {
    const angulo = Math.atan2(dy, dx);
    const grau = angulo * 180 / Math.PI;

    if      (grau >= -22.5 && grau < 22.5) novaAnim = "walk_right.gif";
    else if (grau >= 22.5 && grau < 67.5) novaAnim = "walk_down_right.gif";
    else if (grau >= 67.5 && grau < 112.5) novaAnim = "walk_down.gif";
    else if (grau >= 112.5 && grau < 157.5) novaAnim = "walk_down_left.gif";
    else if (grau >= 157.5 || grau < -157.5) novaAnim = "walk_left.gif";
    else if (grau >= -157.5 && grau < -112.5) novaAnim = "walk_up_left.gif";
    else if (grau >= -112.5 && grau < -67.5) novaAnim = "walk_up.gif";
    else if (grau >= -67.5 && grau < -22.5) novaAnim = "walk_up_right.gif";
  }

  if (novaAnim && novaAnim !== atuaAnim) {
    atuaAnim = novaAnim;
    charSprite.src = atuaAnim;
  }
}
function Loop() {
  requestAnimationFrame(Loop);

  x += (alvoX - x) * velocidade;
  y += (alvoY - y) * velocidade;

  charSprite.style.left = x + "px";
  charSprite.style.top = y + "px";

  const dx = alvoX - x;
  const dy = alvoY - y;
  const distancia = Math.sqrt(dx * dx + dy * dy);

  atualizaAnim(dx, dy, distancia);
}
Loop();