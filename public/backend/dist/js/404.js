// Crear partículas flotantes
function createParticles() {
    const particlesContainer = document.getElementById("particles");
    const particleCount = 20;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement("div");
        particle.className = "particle";
        particle.style.left = Math.random() * 100 + "%";
        particle.style.animationDelay = Math.random() * 6 + "s";
        particle.style.animationDuration = Math.random() * 4 + 4 + "s";
        particlesContainer.appendChild(particle);
    }
}

// Efecto de pulso al hacer clic
document.addEventListener("DOMContentLoaded", function () {
    createParticles();

    const block = document.querySelector(".block404");

    if (block) {
        block.addEventListener("click", function (e) {
            // Evitar que el clic en el botón active este efecto
            if (e.target.closest(".back-home")) {
                return;
            }

            // Efecto de pulso en el objeto
            const obj = this.querySelector(".obj");
            obj.style.animation = "none";
            setTimeout(() => {
                obj.style.animation = "animation-404 6s infinite ease-in-out";
            }, 10);

            // Crear onda de clic
            const ripple = document.createElement("div");
            ripple.style.position = "absolute";
            ripple.style.borderRadius = "50%";
            ripple.style.background = "rgba(255, 255, 255, 0.5)";
            ripple.style.width = "20px";
            ripple.style.height = "20px";
            ripple.style.left = e.offsetX + "px";
            ripple.style.top = e.offsetY + "px";
            ripple.style.transform = "translate(-50%, -50%)";
            ripple.style.animation = "ripple 0.6s ease-out";
            ripple.style.pointerEvents = "none";
            ripple.style.zIndex = "10";

            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    }
});

// Animación de onda
const style = document.createElement("style");
style.textContent = `
            @keyframes ripple {
                to {
                    width: 200px;
                    height: 200px;
                    opacity: 0;
                }
            }
        `;
document.head.appendChild(style);

// Efecto de movimiento del mouse
document.addEventListener("mousemove", function (e) {
    const obj = document.querySelector(".obj");
    if (obj) {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;
        obj.style.transform = `translate(calc(-50% + ${x}px), calc(-50% + ${y}px))`;
    }
});
