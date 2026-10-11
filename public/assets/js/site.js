/* Theme toggle, service worker and "Install the app". Deferred, so it never blocks the first paint. */
(() => {
  'use strict';
  const root = document.documentElement;

  const isDark = () => (root.dataset.theme ? root.dataset.theme === 'dark' : matchMedia('(prefers-color-scheme: dark)').matches);
  const toggle = document.getElementById('themeToggle');
  const label = () => toggle?.setAttribute('aria-pressed', String(isDark()));
  label();
  toggle?.addEventListener('click', () => {
    root.dataset.theme = isDark() ? 'light' : 'dark';
    try { localStorage.setItem('theme', root.dataset.theme); } catch (e) { /* private mode */ }
    label();
  });

  if ('serviceWorker' in navigator && location.protocol === 'https:') {
    addEventListener('load', () => navigator.serviceWorker.register('/sw.js').catch(() => {}));
  }

  let prompt = null;
  const install = document.getElementById('installApp');
  addEventListener('beforeinstallprompt', (e) => { e.preventDefault(); prompt = e; if (install) install.hidden = false; });
  install?.addEventListener('click', async () => { if (!prompt) return; prompt.prompt(); await prompt.userChoice; prompt = null; install.hidden = true; });
})();
