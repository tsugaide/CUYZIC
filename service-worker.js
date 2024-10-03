self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open("my-app-cache").then((cache) => {
      return cache.addAll([
        "/",
        "index.php",
        "output.css",
        "input.css",
        "script.js",
        "upload.php",
        "img/",
        "lagu/",
        "icon.png",
        "manifest.json",
        "conn.php",
        "app.js",
      ]);
    })
  );
});

self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});
