// ============================================
// CURSOR ULTRA MÁGICO COM TRILHA DE ESTRELAS
// ============================================
const cursor = document.createElement('div');
cursor.id = 'custom-cursor';
document.body.appendChild(cursor);

let mouseX = window.innerWidth / 2;
let mouseY = window.innerHeight / 2;

document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    cursor.style.left = mouseX + 'px';
    cursor.style.top = mouseY + 'px';
    
    if (Math.random() > 0.6) {
        createSparkleTrail(mouseX, mouseY);
    }
});

function createSparkleTrail(x, y) {
    const sparkle = document.createElement('div');
    sparkle.className = 'sparkle';
    sparkle.textContent = ['✨', '⭐', '💫', '🌟', '⚡', '💥'][Math.floor(Math.random() * 6)];
    sparkle.style.left = (x + (Math.random() - 0.5) * 30) + 'px';
    sparkle.style.top = (y + (Math.random() - 0.5) * 30) + 'px';
    sparkle.style.fontSize = (18 + Math.random() * 15) + 'px';
    document.body.appendChild(sparkle);
    
    setTimeout(() => sparkle.remove(), 4000);
}

// ============================================
// NUVENS FOFAS INFINITAS
// ============================================
for (let i = 0; i < 8; i++) {
    const cloud = document.createElement('div');
    cloud.className = 'cloud';
    cloud.textContent = '☁️';
    cloud.style.top = (Math.random() * 90) + '%';
    cloud.style.left = '-150px';
    cloud.style.animationDelay = (i * 3) + 's';
    cloud.style.fontSize = (50 + Math.random() * 50) + 'px';
    cloud.style.animationDuration = (20 + Math.random() * 10) + 's';
    document.body.appendChild(cloud);
}

// ============================================
// CÉU ESTRELADO MÁGICO
// ============================================
for (let i = 0; i < 40; i++) {
    const star = document.createElement('div');
    star.className = 'star';
    star.textContent = ['⭐', '✨', '🌟', '💫'][Math.floor(Math.random() * 4)];
    star.style.left = (Math.random() * 100) + '%';
    star.style.top = (Math.random() * 100) + '%';
    star.style.animationDelay = (Math.random() * 3) + 's';
    star.style.fontSize = (15 + Math.random() * 20) + 'px';
    document.body.appendChild(star);
}

// ============================================
// BORBOLETAS MÁGICAS - 15 BORBOLETAS!
// ============================================
const butterflies = [];
const butterflyEmojis = ['🦋', '🦋', '🦋', '🦋', '🦋'];
const maxButterflies = 15;

for (let i = 0; i < maxButterflies; i++) {
    createButterfly();
}

function createButterfly() {
    const butterfly = document.createElement('div');
    butterfly.className = 'butterfly';
    butterfly.textContent = butterflyEmojis[Math.floor(Math.random() * butterflyEmojis.length)];
    butterfly.style.left = Math.random() * window.innerWidth + 'px';
    butterfly.style.top = Math.random() * window.innerHeight + 'px';
    document.body.appendChild(butterfly);
    
    butterflies.push({
        element: butterfly,
        x: parseFloat(butterfly.style.left),
        y: parseFloat(butterfly.style.top),
        speedX: (Math.random() - 0.5) * 4,
        speedY: (Math.random() - 0.5) * 4,
        angle: Math.random() * 360
    });
}

function animateButterflies() {
    butterflies.forEach((butterfly) => {
        const dx = mouseX - butterfly.x;
        const dy = mouseY - butterfly.y;
        const distance = Math.sqrt(dx * dx + dy * dy);
        
        if (distance < 120) {
            butterfly.speedX -= dx / distance * 1.2;
            butterfly.speedY -= dy / distance * 1.2;
        } else if (distance < 500) {
            butterfly.speedX += dx / distance * 0.5;
            butterfly.speedY += dy / distance * 0.5;
        } else {
            butterfly.speedX += (Math.random() - 0.5) * 1.2;
            butterfly.speedY += (Math.random() - 0.5) * 1.2;
        }
        
        const maxSpeed = 5;
        const speed = Math.sqrt(butterfly.speedX ** 2 + butterfly.speedY ** 2);
        if (speed > maxSpeed) {
            butterfly.speedX = (butterfly.speedX / speed) * maxSpeed;
            butterfly.speedY = (butterfly.speedY / speed) * maxSpeed;
        }
        
        butterfly.speedX *= 0.97;
        butterfly.speedY *= 0.97;
        
        butterfly.x += butterfly.speedX;
        butterfly.y += butterfly.speedY;
        
        if (butterfly.x < 0) {
            butterfly.x = 0;
            butterfly.speedX *= -0.7;
        }
        if (butterfly.x > window.innerWidth) {
            butterfly.x = window.innerWidth;
            butterfly.speedX *= -0.7;
        }
        if (butterfly.y < 0) {
            butterfly.y = 0;
            butterfly.speedY *= -0.7;
        }
        if (butterfly.y > window.innerHeight) {
            butterfly.y = window.innerHeight;
            butterfly.speedY *= -0.7;
        }
        
        butterfly.element.style.left = butterfly.x + 'px';
        butterfly.element.style.top = butterfly.y + 'px';
        
        butterfly.angle += 4;
        const wobble = Math.sin(butterfly.angle * Math.PI / 180) * 12;
        butterfly.element.style.transform = `rotate(${wobble}deg) scale(${1 + Math.sin(butterfly.angle * Math.PI / 180) * 0.25})`;
    });
    
    requestAnimationFrame(animateButterflies);
}

animateButterflies();

// ============================================
// MEGA EXPLOSÃO DE FOFURA AO CLICAR
// ============================================
document.addEventListener('click', (e) => {
    for (let i = 0; i < 20; i++) {
        setTimeout(() => {
            createHeartExplosion(e.clientX, e.clientY, i);
        }, i * 25);
    }
    
    for (let i = 0; i < 5; i++) {
        setTimeout(() => {
            createTemporaryButterfly(e.clientX, e.clientY);
        }, i * 80);
    }
    
    for (let i = 0; i < 12; i++) {
        setTimeout(() => {
            createMagicStar(e.clientX, e.clientY);
        }, i * 40);
    }
    
    for (let i = 0; i < 8; i++) {
        setTimeout(() => {
            createFloatingEmoji(e.clientX, e.clientY);
        }, i * 60);
    }
});

function createHeartExplosion(x, y, index) {
    const heart = document.createElement('div');
    heart.className = 'heart-particle';
    const hearts = ['❤️', '💕', '💖', '💗', '💓', '💘', '💝', '💞', '💟', '❣️'];
    heart.textContent = hearts[Math.floor(Math.random() * hearts.length)];
    
    const angle = (index / 20) * Math.PI * 2;
    const distance = 40 + Math.random() * 60;
    const targetX = x + Math.cos(angle) * distance;
    const targetY = y + Math.sin(angle) * distance;
    
    heart.style.left = x + 'px';
    heart.style.top = y + 'px';
    heart.style.fontSize = (22 + Math.random() * 18) + 'px';
    document.body.appendChild(heart);
    
    setTimeout(() => {
        heart.style.transition = 'all 1.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        heart.style.left = targetX + 'px';
        heart.style.top = targetY + 'px';
    }, 10);
    
    setTimeout(() => heart.remove(), 5000);
}

function createTemporaryButterfly(x, y) {
    const butterfly = document.createElement('div');
    butterfly.className = 'butterfly';
    butterfly.textContent = '🦋';
    butterfly.style.left = x + 'px';
    butterfly.style.top = y + 'px';
    butterfly.style.fontSize = '40px';
    document.body.appendChild(butterfly);
    
    let angle = Math.random() * Math.PI * 2;
    let distance = 0;
    
    const interval = setInterval(() => {
        distance += 4;
        angle += 0.12;
        butterfly.style.left = (x + Math.cos(angle) * distance) + 'px';
        butterfly.style.top = (y + Math.sin(angle) * distance) + 'px';
        butterfly.style.opacity = 1 - (distance / 400);
        
        if (distance > 400) {
            clearInterval(interval);
            butterfly.remove();
        }
    }, 20);
}

function createMagicStar(x, y) {
    const star = document.createElement('div');
    star.className = 'sparkle';
    star.textContent = ['✨', '⭐', '💫', '🌟', '⚡', '💥', '🌠'][Math.floor(Math.random() * 7)];
    star.style.left = (x + (Math.random() - 0.5) * 80) + 'px';
    star.style.top = (y + (Math.random() - 0.5) * 80) + 'px';
    star.style.fontSize = (22 + Math.random() * 18) + 'px';
    document.body.appendChild(star);
    
    setTimeout(() => star.remove(), 4000);
}

function createFloatingEmoji(x, y) {
    const emojis = ['🌸', '🌺', '🌻', '🌷', '🌹', '🦄', '🎀', '💐', '🧁', '🍰'];
    const emoji = document.createElement('div');
    emoji.className = 'sparkle';
    emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
    emoji.style.left = (x + (Math.random() - 0.5) * 100) + 'px';
    emoji.style.top = (y + (Math.random() - 0.5) * 100) + 'px';
    emoji.style.fontSize = (25 + Math.random() * 15) + 'px';
    document.body.appendChild(emoji);
    
    setTimeout(() => emoji.remove(), 4000);
}

// ============================================
// ARCO-ÍRIS GIRATÓRIOS MÁGICOS
// ============================================
for (let i = 0; i < 4; i++) {
    const rainbow = document.createElement('div');
    rainbow.className = 'rainbow';
    rainbow.textContent = '🌈';
    rainbow.style.left = (15 + i * 25) + '%';
    rainbow.style.top = (10 + i * 20) + '%';
    rainbow.style.animationDelay = (i * 2.5) + 's';
    rainbow.style.animationDuration = (12 + Math.random() * 8) + 's';
    document.body.appendChild(rainbow);
}

// ============================================
// CHUVA DE EMOJIS FOFOS SUPER INTENSA
// ============================================
function createFallingEmoji() {
    const emojis = ['🌸', '🌺', '🌻', '🌷', '🌹', '🦄', '🎀', '💐', '🧁', '🍰', '🍓', '🍬', '🍭', '🍩', '🎂', '🧸', '🎪'];
    const emoji = document.createElement('div');
    emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
    emoji.style.position = 'fixed';
    emoji.style.left = (Math.random() * 100) + '%';
    emoji.style.top = '-80px';
    emoji.style.fontSize = (30 + Math.random() * 30) + 'px';
    emoji.style.pointerEvents = 'none';
    emoji.style.zIndex = '1';
    emoji.style.opacity = '0.3';
    emoji.style.transform = 'rotate(' + (Math.random() * 360) + 'deg)';
    
    const duration = 10 + Math.random() * 10;
    emoji.style.transition = `all ${duration}s linear`;
    document.body.appendChild(emoji);
    
    setTimeout(() => {
        emoji.style.top = '110vh';
        emoji.style.transform = 'rotate(' + (Math.random() * 720) + 'deg)';
    }, 50);
    
    setTimeout(() => emoji.remove(), duration * 1000 + 1000);
}

setInterval(createFallingEmoji, 600);

// ============================================
// EFEITOS MÁGICOS NOS INPUTS
// ============================================
document.querySelectorAll('input[type="text"]').forEach(input => {
    input.addEventListener('focus', function() {
        for (let i = 0; i < 8; i++) {
            setTimeout(() => {
                const rect = this.getBoundingClientRect();
                createMagicStar(
                    rect.left + Math.random() * rect.width, 
                    rect.top + Math.random() * rect.height
                );
            }, i * 80);
        }
        
        for (let i = 0; i < 5; i++) {
            setTimeout(() => {
                const rect = this.getBoundingClientRect();
                createHeartExplosion(rect.left + rect.width / 2, rect.top, i);
            }, i * 100);
        }
    });
    
    input.addEventListener('input', function() {
        if (Math.random() > 0.5) {
            const rect = this.getBoundingClientRect();
            createSparkleTrail(
                rect.left + Math.random() * rect.width, 
                rect.top + rect.height / 2
            );
        }
    });
});

// ============================================
// BOTÃO COM SUPER PODERES MÁGICOS
// ============================================
const submitBtn = document.querySelector('input[type="submit"]');
if (submitBtn) {
    submitBtn.addEventListener('mouseenter', function() {
        for (let i = 0; i < 15; i++) {
            setTimeout(() => {
                const rect = this.getBoundingClientRect();
                const x = rect.left + Math.random() * rect.width;
                const y = rect.top + Math.random() * rect.height;
                createMagicStar(x, y);
            }, i * 40);
        }
        
        for (let i = 0; i < 8; i++) {
            setTimeout(() => {
                const rect = this.getBoundingClientRect();
                createHeartExplosion(
                    rect.left + Math.random() * rect.width,
                    rect.top + Math.random() * rect.height,
                    i
                );
            }, i * 60);
        }
    });
}

// ============================================
// RESULTADO - EXPLOSÃO MÁXIMA DE FOFURA
// ============================================
if (document.querySelector('.resultado')) {
    setTimeout(() => {
        for (let i = 0; i < 80; i++) {
            setTimeout(() => {
                const x = window.innerWidth / 2 + (Math.random() - 0.5) * 400;
                const y = window.innerHeight / 2 + (Math.random() - 0.5) * 400;
                createHeartExplosion(x, y, i);
            }, i * 40);
        }
        
        for (let i = 0; i < 30; i++) {
            setTimeout(() => {
                const x = Math.random() * window.innerWidth;
                const y = Math.random() * window.innerHeight;
                createMagicStar(x, y);
            }, i * 100);
        }
    }, 500);
    
    setInterval(() => {
        const x = Math.random() * window.innerWidth;
        createFloatingHeart(x, -80);
    }, 300);
    
    for (let i = 0; i < 8; i++) {
        setTimeout(() => createButterfly(), i * 400);
    }
    
    setInterval(() => {
        for (let i = 0; i < 5; i++) {
            setTimeout(() => {
                createMagicStar(
                    Math.random() * window.innerWidth,
                    Math.random() * window.innerHeight
                );
            }, i * 80);
        }
    }, 1200);
    
    for (let i = 0; i < 3; i++) {
        const rainbow = document.createElement('div');
        rainbow.className = 'rainbow';
        rainbow.textContent = '🌈';
        rainbow.style.right = (8 + i * 12) + '%';
        rainbow.style.bottom = (8 + i * 18) + '%';
        rainbow.style.animationDelay = (i * 1.8) + 's';
        document.body.appendChild(rainbow);
    }
    
    setInterval(() => {
        for (let i = 0; i < 3; i++) {
            setTimeout(() => {
                createFloatingEmoji(
                    Math.random() * window.innerWidth,
                    Math.random() * window.innerHeight
                );
            }, i * 150);
        }
    }, 2000);
}

function createFloatingHeart(x, y) {
    const heart = document.createElement('div');
    heart.className = 'heart-particle';
    const hearts = ['❤️', '💕', '💖', '💗', '💓', '💘', '💝', '💞', '💟', '❣️', '💗'];
    heart.textContent = hearts[Math.floor(Math.random() * hearts.length)];
    heart.style.left = x + 'px';
    heart.style.top = y + 'px';
    heart.style.fontSize = (25 + Math.random() * 25) + 'px';
    document.body.appendChild(heart);
    
    setTimeout(() => heart.remove(), 5000);
}

// ============================================
// CURSOR MEGA ESPECIAL EM ELEMENTOS
// ============================================
document.querySelectorAll('input, button, a, td').forEach(element => {
    element.addEventListener('mouseenter', () => {
        cursor.style.transform = 'scale(2)';
        cursor.style.background = 'radial-gradient(circle, #ffd700, #ff69b4, #ff1493)';
        cursor.style.boxShadow = '0 0 40px rgba(255, 215, 0, 1), 0 0 60px rgba(255, 105, 180, 0.9)';
    });
    
    element.addEventListener('mouseleave', () => {
        cursor.style.transform = 'scale(1)';
        cursor.style.background = 'radial-gradient(circle, #ff1493, #ff69b4, #ffb6c1)';
        cursor.style.boxShadow = '0 0 25px rgba(255, 20, 147, 0.9)';
    });
});

// ============================================
// SUPER PARTÍCULAS AO MOVER RÁPIDO
// ============================================
let lastMoveTime = Date.now();
let lastX = mouseX;
let lastY = mouseY;

document.addEventListener('mousemove', (e) => {
    const now = Date.now();
    const dt = now - lastMoveTime;
    const dx = e.clientX - lastX;
    const dy = e.clientY - lastY;
    const speed = Math.sqrt(dx * dx + dy * dy) / dt;
    
    if (speed > 0.8 && Math.random() > 0.7) {
        createHeartExplosion(e.clientX, e.clientY, Math.floor(Math.random() * 10));
        createMagicStar(e.clientX, e.clientY);
    }
    
    lastMoveTime = now;
    lastX = e.clientX;
    lastY = e.clientY;
});

// ============================================
// UNICÓRNIOS MÁGICOS ALEATÓRIOS
// ============================================
setInterval(() => {
    const unicorn = document.createElement('div');
    unicorn.textContent = '🦄';
    unicorn.style.position = 'fixed';
    unicorn.style.fontSize = (40 + Math.random() * 40) + 'px';
    unicorn.style.left = '-100px';
    unicorn.style.top = (Math.random() * 80) + '%';
    unicorn.style.pointerEvents = 'none';
    unicorn.style.zIndex = '1';
    unicorn.style.opacity = '0.4';
    unicorn.style.transition = 'all 8s linear';
    document.body.appendChild(unicorn);
    
    setTimeout(() => {
        unicorn.style.left = '110vw';
    }, 100);
    
    setTimeout(() => unicorn.remove(), 8500);
}, 5000);