(() => {
    document.documentElement.classList.add('js');
    const nav = document.querySelector('.main-nav');
    const toggle = document.querySelector('.menu-toggle');
    toggle?.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(open));
    });
    nav?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        nav.classList.remove('is-open');
        toggle?.setAttribute('aria-expanded', 'false');
    }));

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    const modal = document.getElementById('galleryModal');
    const title = document.getElementById('galleryTitle');
    const grid = document.getElementById('galleryGrid');
    const galleries = window.STUDIO84_GALLERIES || {};

    function closeGallery() {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
        grid.innerHTML = '';
    }

    function openGallery(slug) {
        const gallery = galleries[slug];
        if (!gallery) return;
        title.textContent = gallery.title;
        grid.innerHTML = '';
        if (!gallery.images.length) {
            const empty = document.createElement('p');
            empty.className = 'gallery-empty';
            empty.textContent = `Noch keine Referenzbilder im Ordner /galleries/${slug}/.`;
            grid.appendChild(empty);
        } else {
            gallery.images.forEach((src, i) => {
                const figure = document.createElement('figure');
                const img = document.createElement('img');
                img.src = src;
                img.alt = `${gallery.title} – Referenz ${i + 1}`;
                img.loading = 'lazy';
                figure.appendChild(img);
                grid.appendChild(figure);
            });
        }
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    }

    document.querySelectorAll('[data-gallery]').forEach(card => {
        card.querySelector('button')?.addEventListener('click', () => openGallery(card.dataset.gallery));
    });
    modal?.querySelectorAll('[data-close]').forEach(el => el.addEventListener('click', closeGallery));
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeGallery(); });
})();
