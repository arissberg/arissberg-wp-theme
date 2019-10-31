/**
 * Lazy load videos to increase performance
 * Inspiration taken from https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 *
 *
 * @param {string} cssSelector
 * @param {*} opts
 */

function lazyVideos(querySelector, opts = {}) {
  const domEls = [].slice.call(querySelector);
  let lazyVideoObserver;

  if ('IntersectionObserver' in window) {
    lazyVideoObserver = new IntersectionObserver(entries => {
      entries.forEach(video => {
        if (video.isIntersecting) {
          for (const source in video.target.children) {
            const videoSource = video.target.children[source];
            if (
              typeof videoSource.tagName === 'string' &&
              videoSource.tagName === 'SOURCE'
            ) {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove('lazy');
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    domEls.forEach(lazyVideo => {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
}

export default lazyVideos;
