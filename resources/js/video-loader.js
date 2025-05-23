document.addEventListener('DOMContentLoaded', () => {
    const triggers = document.querySelectorAll('.video-trigger');
    const videoContainer = document.getElementById('main-video-container');
    const videoTitle = document.getElementById('main-video-title');
    const videoLink = document.getElementById('main-video-link');
    const loadingOverlay = document.getElementById('video-loading');

    function decodeHTMLEntities(html) {
        const txt = document.createElement('textarea');
        txt.innerHTML = html;
        return txt.value;
    }

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const iframeHTML = decodeHTMLEntities(trigger.getAttribute('data-iframe'));
            const title = trigger.getAttribute('data-video-title');
            const url = trigger.getAttribute('data-video-url');

            if (!iframeHTML) return;

            // ✅ Mostrar loader
            if (loadingOverlay) {
                loadingOverlay.classList.remove('hidden');
            }

            // ✅ Reemplazar contenido del iframe
            videoContainer.innerHTML = iframeHTML + loadingOverlay.outerHTML;

            // ✅ Ocultar loader cuando el iframe termine de cargar
            const newIframe = videoContainer.querySelector('iframe');
            newIframe.addEventListener('load', () => {
                const overlay = videoContainer.querySelector('#video-loading');
                if (overlay) overlay.classList.add('hidden');
            });

            // Actualizar título y enlace
            if (videoTitle) {
                videoTitle.textContent = title || '';
            }
            if (videoLink) {
                videoLink.setAttribute('href', url || '#');
            }

            // Actualizar clase activa
            triggers.forEach(t => t.classList.remove('active'));
            trigger.classList.add('active');
        });
    });
});