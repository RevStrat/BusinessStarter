importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

if (workbox) {
  console.log(`Yay! Workbox is loaded 🎉`);

  /*workbox.setConfig({
    debug: true
  });*/

  // Keep gathering analytics from offline users
  workbox.googleAnalytics.initialize();

  workbox.routing.registerRoute(
    // Cache font files
    /\.(?:woff|woff2)$/,
    // Use cache but update in the background.
    new workbox.strategies.CacheFirst({
      // Use a custom cache name.
      cacheName: 'font-cache',
    })
  );

  workbox.routing.registerRoute(
    // Cache CSS files.
    /\.(?:css|css\\?.*)$/,
    // Use cache but update in the background.
    new workbox.strategies.CacheFirst({
      // Use a custom cache name.
      cacheName: 'css-cache',
    })
  );

  workbox.routing.registerRoute(
    // Cache Javascript files and manifest.json
    /\.(?:js|js\\?.*)$/,
    // Use cache but update in the background.
    new workbox.strategies.CacheFirst({
      // Use a custom cache name.
      cacheName: 'js-cache',
    })
  );

  workbox.routing.registerRoute(
    // Cache image files.
    /\.(?:png|jpg|jpeg|svg|gif)$/,
    // Use the cache if it's available.
    new workbox.strategies.CacheFirst({
      // Use a custom cache name.
      cacheName: 'image-cache',
      plugins: [
        new workbox.expiration.Plugin({
          // Cache only 20 images.
          maxEntries: 20,
          // Cache for a maximum of a week.
          maxAgeSeconds: 7 * 24 * 60 * 60,
        })
      ],
    })
  );
  console.log('SW updated 2');
  // Policy for handling inside pages. Exclude admin and dev
  const matchFrontend = ({url, event}) => {
    return !(url.pathname.includes('/admin')) &&
           !(url.pathname.includes('/dev')) &&
             url.pathname.endsWith('/') /*&&
             (url.hostname.includes('PRODUCTIONURL1') || url.hostname.startsWith('PRODUCTIONURL2'))*/
  };
  workbox.routing.registerRoute(
    matchFrontend,
    new workbox.strategies.StaleWhileRevalidate({
      // Use a custom cache name.
      cacheName: 'page-cache',
    })
  );
} else {
  console.log(`Boo! Workbox didn't load 😬`);
}