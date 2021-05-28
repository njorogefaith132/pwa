self.addEventListener("install", e =>{
    //console.log("install jim!");
    e.waitUntil(
        caches.open("static").then(cache =>{
            return cache.addAll(["./", "./styles.css", "yetu1922.png", "./PHP/component.php","./PHP/createDb.php","./PHP/header.php","./cart.php","./image1.jpg","./image2.jpg","./image3.jpg","./image4.jpg"]);
        })
    );
});

self.addEventListener("fetch", e =>{
    //console.log(`intercepting fetch request for: ${e.request.url}`);
    e.respondWith(
        caches.match(e.request).then(response =>{
            return response || fetch(e.request); 
        })
    );
})