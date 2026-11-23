(function() {
    const canvas = document.getElementById('portal-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let particles = [];

    const resize = () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    };

    window.addEventListener('resize', resize);
    resize();

    class Particle {
        constructor() {
            this.reset();
        }

        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height + canvas.height;
            this.size = Math.random() * 2 + 0.5;
            this.speedY = Math.random() * -1.5 - 0.5;
            this.opacity = Math.random() * 0.5 + 0.2;
        }

        update() {
            this.y += this.speedY;
            if (this.y < -10) this.reset();
        }

        draw() {
            ctx.fillStyle = `rgba(255, 215, 0, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    const init = () => {
        particles = Array.from({ length: 100 }, () => new Particle());
    };

    const animate = () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            p.update();
            p.draw();
        });
        requestAnimationFrame(animate);
    };

    init();
    animate();
})();