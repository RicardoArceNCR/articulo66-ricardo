document.addEventListener('DOMContentLoaded', () => {
    const podcastTriggers = document.querySelectorAll('.podcast-trigger');
    const podcastContainer = document.getElementById('main-podcast-container');
    const podcastTitle = document.getElementById('main-podcast-title');
    const podcastExcerpt = document.getElementById('main-podcast-excerpt');
    const podcastLink = document.getElementById('main-podcast-link');
    const podcastLoader = document.getElementById('podcast-loading');

    function decodeHTMLEntities(html) {
        const txt = document.createElement('textarea');
        txt.innerHTML = html;
        return txt.value;
    }

    podcastTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const iframeHTML = decodeHTMLEntities(trigger.getAttribute('data-iframe'));
            const title = trigger.getAttribute('data-title');
            const excerpt = trigger.getAttribute('data-excerpt');
            const url = trigger.getAttribute('data-url');

            // Mostrar loader
            if (podcastLoader) podcastLoader.classList.remove('hidden');

            // Reemplazar iframe
            podcastContainer.innerHTML = iframeHTML + podcastLoader.outerHTML;

            const newIframe = podcastContainer.querySelector('iframe');
            if (newIframe) {
                newIframe.addEventListener('load', () => {
                    const loader = podcastContainer.querySelector('#podcast-loading');
                    if (loader) loader.classList.add('hidden');
                });
            }

            if (podcastTitle) {
                podcastTitle.textContent = title || '';
            }
            if (podcastExcerpt) {
                podcastExcerpt.textContent = excerpt || '';
            }
            if (podcastLink) {
                podcastLink.href = url || '#';
            }

            podcastTriggers.forEach(t => t.classList.remove('active'));
            trigger.classList.add('active');
        });
    });
});